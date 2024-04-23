<?php
require_once 'models/Product.php';

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
    include 'views/products.php';
  }
}