<?php
require_once 'config.php';
require_once PROJECT_ROOT . 'db/DbConnector.php';

class Product
{
  private $db;


  public function __construct()
  {
    $this->db = (new DbConnector())->connect();
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

  public function add($name, $type, $price, $quantity)
  {
    $sql = "INSERT INTO products (name, type, price, quantity) VALUES (:name, :type, :price, :quantity)";

    $statement = $this->db->prepare($sql);
    $statement->execute([
      ':name' => $name,
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

  public function removeProducts($type, $name, $quantity)
  {
    // Get the IDs of the newest products of the given type and name
    $sql = "SELECT id FROM products WHERE type = ? AND name = ? ORDER BY id DESC LIMIT ?";
    $statement = $this->db->prepare($sql);
    $statement->bindValue(1, $type, PDO::PARAM_STR);
    $statement->bindValue(2, $name, PDO::PARAM_STR);
    $statement->bindValue(3, (int) $quantity, PDO::PARAM_INT);
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