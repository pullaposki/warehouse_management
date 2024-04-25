<?php
require_once __DIR__ . '/controllers/ProductController.php';

$route = $_GET['route'] ?? 'inventory';
$productController = new ProductController();

switch ($route) {
  case 'inventory':
    $productController->showInventory();
    break;
  case 'products':
    $productController->showProductManagement();
    break;
  case 'addToQuantity':
    $productController->addToQuantity();
    break;
  case 'removeFromQuantity':
    $productController->removeFromQuantity();
    break;
  case 'addProduct':
    $productController->addProductType();
    break;
  case 'removeProduct':
    $productController->removeProductTypes();
    break;
  case 'updateProductPrice':
    $productController->updateProductPrice();
    break;
  case 'updateProductType':
    $productController->updateProductType();
    break;
  default:
    $productController->showInventory();
    break;
}