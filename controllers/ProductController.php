<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController
{
  private $model;

  public function __construct()
  {
    $this->model = new Product();
  }

  // default action
  public function index()
  {
    include 'views/products.php';
  }



  public function showInventory()
  {
    $result = $this->getAll(); // used by the view to display products
    include 'views/inventory.php';
  }

  public function showManageStock()
  {
    $result = $this->getTypes(); // used by the view to display product types
    include 'views/manage_stock.php';
  }

  public function showBuyForm()
  {
    $result = $this->getTypes(); // used by the view to display product types
    include 'views/buy.php';
  }

  public function showSellForm()
  {
    $result = $this->getTypes(); // used by the view to display product types
    include 'views/sell.php';
  }

  public function getAll()
  {
    return $this->model->getAll();
  }

  public function getTypes()
  {
    return $this->model->getDistinctTypes();
  }

  public function addProductType()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $type = $_POST['product_type'];
      $this->model->addProductType($type);
      $this->showInventory();
    }
  }

  public function addToQuantity()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $type = $_POST['product_type'];
      $quantity = $_POST['quantity'];
      $this->model->addQuantity($type, $quantity);
      $this->showInventory();
    }
  }

  public function removeFromQuantity()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $type = $_POST['product_type'];
      $quantity = $_POST['quantity'];
      $this->model->removeQuantity($type, $quantity);
      $this->showInventory();
    }
  }
}