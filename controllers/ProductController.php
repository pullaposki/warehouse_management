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
    include 'views/buy.php';
  }

  public function showSellForm()
  {
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
      $name = $_POST['product_name'];
      $quantity = $_POST['quantity'];
      $price = 100; // TODO: replace with given price
      $this->model->add($name, $type, $price, $quantity);
    }
  }

  public function remove()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $type = $_POST['product_type'];
      $name = $_POST['product_name'];
      $quantity = $_POST['quantity'];
      $this->model->removeProducts($type, $name, $quantity);
    }
  }

}