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

  public function index()
  {
    $products = $this->model->getAll();
    $distinctTypes = $this->model->getDistinctTypes();
    include 'views/products.php';
  }

  public function getAll()
  {
    return $this->model->getAll();
  }

  public function getTypes()
  {
    return $this->model->getDistinctTypes();
  }
}