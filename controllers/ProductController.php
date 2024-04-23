<?php
require_once 'config.php';
require_once PROJECT_ROOT . 'models/Product.php';

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

  public function post()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $type = $_POST['product_type'];
      $quantity = $_POST['quantity'];
      $this->model->addQuantity($type, $quantity);
    }
  }

  public function remove()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $type = $_POST['product_type'];
      $quantity = $_POST['quantity'];
      $this->model->removeQuantity($type, $quantity);
    }
  }

}