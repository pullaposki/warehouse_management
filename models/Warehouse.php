<?php
require_once 'config.php';
require_once PROJECT_ROOT . 'db/DbConnector.php';

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
}