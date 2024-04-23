<?php
class DbConnector
{
  private $host;
  private $user;
  private $pass;
  private $name;
  public function __construct()
  {
    $this->host = 'localhost'; // replace with your host
    $this->user = 'root'; // replace with your username
    $this->pass = ''; // replace with your password
    $this->name = 'warehouse'; // replace with your database name
  }
  public function connect()
  {
    try {
      // Create connection using PDO constructor            
      $connection = new PDO(
        "mysql:host=$this->host;dbname=$this->name",
        $this->user,
        $this->pass
      );
      // Set the PDO error mode to exception
      $connection->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
      );
      return $connection;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}