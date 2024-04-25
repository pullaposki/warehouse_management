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
    $result = $this->model->getAllWithQuantities();
    include 'views/inventory.php';
  }

  public function showProductManagement()
  {
    $result = $this->getTypes(); // used by the view to display product types
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

  public function addProductType()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $type = $_POST['product_type'];
      $price = $_POST['price'];
      $starting_stock = $_POST['starting_stock'];

      // check if a product type with the same name already exists
      $types = $this->model->getDistinctTypes();
      foreach ($types as $t) {
        if ($t['type'] === $type) {
          echo "Product already exists!";
          $this->showInventory();
          return;
        }
      }

      $this->model->addProduct($type, $price, $starting_stock);
      $this->showInventory();
    }
  }

  public function removeProductTypes()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $types = $_POST['product_type'];
      foreach ($types as $type) {
        $this->model->removeProduct($type);
      }
      $this->showInventory();
    }
  }

  public function updateProductPrice()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $type = $_POST['product_type'];
      $price = $_POST['price'];
      $this->model->updateProductPrice($type, $price);
      $this->showInventory();
    }

  }

  public function updateProductType()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $old_type = $_POST['old_product_type'];
      $new_type = $_POST['new_product_type'];
      $this->model->updateProductType($old_type, $new_type);
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