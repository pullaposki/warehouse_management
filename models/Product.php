<?php
require_once 'db/DbConnector.php';

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
}