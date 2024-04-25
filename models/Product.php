<?php
require_once __DIR__ . '/../db/DbConnector.php';

class Product
{
  private $db;


  public function __construct()
  {
    $this->db = (new DbConnector())->connect();
  }

  public function addProduct($type, $price, $starting_stock)
  {
    $sql = "INSERT INTO products (type, price, quantity) VALUES (:type, :price, :quantity)";
    $statement = $this->db->prepare($sql);
    $statement->execute([':type' => $type, ':price' => $price, ':quantity' => $starting_stock]);
  }

  public function removeProduct($type)
  {
    $sql = "DELETE FROM products WHERE type = :type";
    $statement = $this->db->prepare($sql);
    $statement->execute([':type' => $type]);
  }

  public function updateProductPrice($type, $price)
  {
    $sql = "UPDATE products SET price = :price WHERE type = :type";
    $statement = $this->db->prepare($sql);
    $statement->execute([':type' => $type, ':price' => $price]);
  }

  public function updateProductType($old_type, $new_type)
  {
    $sql = "UPDATE products SET type = :new_type WHERE type = :old_type";
    $statement = $this->db->prepare($sql);
    $statement->execute([':old_type' => $old_type, ':new_type' => $new_type]);
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

  public function addQuantity($type, $quantity)
  {
    $sql = "UPDATE products SET quantity = quantity + :quantity WHERE type = :type";
    $statement = $this->db->prepare($sql);
    $statement->execute([
      ':type' => $type,
      ':quantity' => $quantity
    ]);
  }

  public function removeQuantity($type, $quantity)
  {
    $sql = "UPDATE products SET quantity = quantity - :quantity WHERE type = :type";
    $statement = $this->db->prepare($sql);
    $statement->execute([
      ':type' => $type,
      ':quantity' => $quantity
    ]);
  }

  public function add($type, $price, $quantity)
  {
    $sql = "INSERT INTO products (type, price, quantity) VALUES (:type, :price, :quantity)";

    $statement = $this->db->prepare($sql);
    $statement->execute([
      ':type' => $type,
      ':price' => $price,
      ':quantity' => $quantity
    ]);
  }



  public function remove($id)
  {
    $sql = "DELETE FROM products WHERE id = :id";

    $statement = $this->db->prepare($sql);
    $statement->execute([':id' => $id]);
  }


  public function removeProducts($type, $quantity)
  {
    // Get the IDs of the newest products of the given type and name
    $sql = "SELECT id FROM products WHERE type = ? ORDER BY id DESC LIMIT ?";
    $statement = $this->db->prepare($sql);
    $statement->bindValue(1, $type, PDO::PARAM_STR);
    $statement->bindValue(2, (int) $quantity, PDO::PARAM_INT);
    $statement->execute();
    $ids = $statement->fetchAll(PDO::FETCH_COLUMN);

    // Remove the products
    $this->removeMultiple($ids);
  }

  function removeMultiple($ids)
  {
    $sql = "DELETE FROM products WHERE id IN (" . implode(',', array_fill(0, count($ids), '?')) . ")";

    $statement = $this->db->prepare($sql);
    $statement->execute($ids);
  }

}