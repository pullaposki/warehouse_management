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
}