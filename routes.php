<?php
require_once __DIR__ . '/controllers/ProductController.php';

$route = $_GET['route'] ?? 'inventory';
$productController = new ProductController();

switch ($route) {
  case 'inventory':
    include 'views/inventory.php';
    break;
  case 'manage_stock':
    $productController->showManageStock();
    break;
  case 'addToQuantity':
    $productController->addToQuantity();
    break;
  case 'removeFromQuantity':
    $productController->removeFromQuantity();
    break;
  case 'addProductType':
    $productController->addProductType();
    break;
  default:
    include 'views/inventory.php';
    break;
}
?>