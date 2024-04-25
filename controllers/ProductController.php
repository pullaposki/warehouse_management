<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../services/ProductValidator.php';

class ProductController
{
  private $model;
  private $validator;

  public function __construct()
  {
    $this->model = new Product();
    $this->validator = new ProductValidator();
  }

  // default action
  public function index()
  {
    include 'views/products.php';
  }

  public function showError($message)
  {
    include 'views/error.php';
  }

  public function showInventory()
  {
    $result = $this->model->getAllWithQuantities();
    include 'views/inventory.php';
  }

  public function showProductManagement()
  {
    $result = $this->getDistinct();
    include 'views/products.php';
  }

  public function getAll()
  {
    return $this->model->getAll();
  }

  public function getDistinct()
  {
    return $this->model->getDistinctTypes();
  }

  public function add()
  {
    if (!$this->isPostRequest()) {
      return;
    }

    $type = $_POST['product_type'];
    $result = $this->validator->isTypeValid($type);
    if (!$result->isSuccess()) {
      $this->showError($result->getMessage());
      return;
    }
    $price = $_POST['price'];
    if (!$this->validator->isPriceValid($price)) {
      $this->showError('Invalid price');
      return;
    }
    $starting_stock = $_POST['starting_stock'];
    if (!$this->validator->isQuantityValid($starting_stock)) {
      $this->showError('Invalid quantity');
      return;
    }

    // check if a product type with the same name already exists
    $types = $this->model->getDistinctTypes();
    foreach ($types as $t) {
      if ($t['type'] === $type) {
        $this->showError('Product type already exists');
        return;
      }
    }

    $result = $this->model->add($type, $price, $starting_stock);
    if (!$result->isSuccess()) {
      $this->showError($result->getMessage());
      return;
    }

    $this->showInventory();
  }

  public function remove()
  {
    if (!$this->isPostRequest()) {
      return;
    }

    $types = $_POST['product_type'];
    foreach ($types as $type) {
      $result = $this->model->remove($type);
      if (!$result->isSuccess()) {
        $this->showError($result->getMessage());
        break;
      }
    }
    $this->showInventory();
  }

  public function updatePrice()
  {
    if (!$this->isPostRequest()) {
      return;
    }

    $type = $_POST['product_type'];
    $price = $_POST['price'];
    $result = $this->model->updatePrice($type, $price);
    if (!$result->isSuccess()) {
      $this->showError($result->getMessage());
      return;
    }
    $this->showInventory();
  }

  public function updateType()
  {
    if (!$this->isPostRequest()) {
      return;
    }
    $old_type = $_POST['old_product_type'];
    $new_type = $_POST['new_product_type'];
    $result = $this->model->updateType($old_type, $new_type);
    if (!$result->isSuccess()) {
      $this->showError($result->getMessage());
      return;
    }
    $this->showInventory();
  }

  public function addToStock()
  {
    if (!$this->isPostRequest()) {
      return;
    }

    $type = $_POST['product_type'];
    $quantity = $_POST['quantity'];
    $result = $this->model->addToStock($type, $quantity);
    if (!$result->isSuccess()) {
      $this->showError($result->getMessage());
      return;
    }
    $this->showInventory();
  }

  public function removeFromStock()
  {
    if (!$this->isPostRequest()) {
      return;
    }

    $type = $_POST['product_type'];
    $quantity = $_POST['quantity'];
    $result = $this->model->removeFromStock($type, $quantity);
    if (!$result->isSuccess()) {
      $this->showError($result->getMessage());
      return;
    }
    $this->showInventory();
  }

  private function isPostRequest()
  {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
  }


}

