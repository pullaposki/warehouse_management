<?php
require_once 'config.php';
require_once PROJECT_ROOT . 'models/Warehouse.php';

class WarehouseController
{
  private $model;

  public function __construct()
  {
    $this->model = new Warehouse();
  }

  public function index()
  {
    $productCount = $this->model->getProductCount();
    include 'views/inventory.php';
  }

  public function getProductCount()
  {
    return $this->model->getProductCount();
  }
}