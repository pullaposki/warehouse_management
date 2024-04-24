<?php
require_once __DIR__ .  '/../db/DbConnector.php';

class Warehouse
{
  private $db;

  public function __construct()
  {
    $this->db = (new DbConnector())->connect();
  }

  public function getProductCount()
  {
    $statement = $this->db->prepare("SELECT COUNT(*) FROM products");
    $statement->execute();
    return $statement->fetchColumn();
  }
  public function getTotalQuantity()
  {
    $sql = "SELECT SUM(quantity) as total_quantity FROM products";
    $statement = $this->db->prepare($sql);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['total_quantity'];
  }
}