<?php
require_once __DIR__ . '/../db/DbConnector.php';
require_once __DIR__ . '/../utils/OperationResult.php';

class Product
{
  private $db;


  public function __construct()
  {
    $this->db = (new DbConnector())->connect();
  }

  public function add($type, $price, $starting_stock)
  {
    try {
      $sql = "INSERT INTO products (type, price, quantity) VALUES (:type, :price, :quantity)";
      $statement = $this->db->prepare($sql);
      $statement->execute([':type' => $type, ':price' => $price, ':quantity' => $starting_stock]);

      return new OperationResult(true, 'Product ' . $type . ' added successfully');
    } catch (PDOException $e) {
      return new OperationResult(false, $e->getMessage());
    }
  }

  public function remove($type)
  {
    try {
      $sql = "DELETE FROM products WHERE type = :type";
      $statement = $this->db->prepare($sql);
      $statement->execute([':type' => $type]);

      return new OperationResult(true, 'Product ' . $type . ' removed successfully');
    } catch (PDOException $e) {
      return new OperationResult(false, $e->getMessage());
    }

  }

  public function updatePrice($type, $price)
  {
    try {
      $sql = "UPDATE products SET price = :price WHERE type = :type";
      $statement = $this->db->prepare($sql);
      $statement->execute([':type' => $type, ':price' => $price]);
      return new OperationResult(true, 'Price updated successfully');
    } catch (PDOException $e) {
      return new OperationResult(false, $e->getMessage());
    }
  }

  public function updateType($old_type, $new_type)
  {
    try{
      $sql = "UPDATE products SET type = :new_type WHERE type = :old_type";
      $statement = $this->db->prepare($sql);
      $statement->execute([':old_type' => $old_type, ':new_type' => $new_type]);
      return new OperationResult(true, 'Type updated successfully');
    }
    catch (PDOException $e) {
      return new OperationResult(false, $e->getMessage());
    }
  }

  public function getAllWithQuantities()
  {
    $statement = $this->db->prepare("SELECT * FROM products");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAll()
  {
    $statement = $this->db->prepare("SELECT * FROM products");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getDistinctTypes()
  {
    $sql = "SELECT DISTINCT type FROM products";
    $statement = $this->db->query($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addToStock($type, $quantity)
  {
    try{
      $sql = "UPDATE products SET quantity = quantity + :quantity WHERE type = :type";
      $statement = $this->db->prepare($sql);
      $statement->execute([
        ':type' => $type,
        ':quantity' => $quantity
      ]);
      return new OperationResult(true, 'Stock updated successfully');
    }
    catch (PDOException $e) {
      return new OperationResult(false, $e->getMessage());
    }
    
  }

  public function removeFromStock($type, $quantity)
  {
    try{
      $sql = "UPDATE products SET quantity = quantity - :quantity WHERE type = :type";
      $statement = $this->db->prepare($sql);
      $statement->execute([
        ':type' => $type,
        ':quantity' => $quantity
      ]);
      return new OperationResult(true, 'Stock updated successfully');
    }
    catch (PDOException $e) {
      return new OperationResult(false, $e->getMessage());
    }
    
  }
}