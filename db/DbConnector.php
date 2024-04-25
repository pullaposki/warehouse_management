<?php
class DbConnector
{
  private $host;
  private $user;
  private $pass;
  private $name;

  public function __construct()
  {
    $config = include __DIR__ . '/../config.php';

    // add a check to ensure that the 'db' key exists in the config array
    if (!isset($config['db'])) {
      throw new Exception("Database configuration not found");
    }

    $this->host = $config['db']['host'];
    $this->user = $config['db']['user'];
    $this->pass = $config['db']['pass'];
    $this->name = $config['db']['dbname'];
  }

  public function connect()
  {
    try {
      // Create connection using PDO constructor            
      $connection = new PDO(
        "sqlsrv:server=$this->host;Database=$this->name",
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