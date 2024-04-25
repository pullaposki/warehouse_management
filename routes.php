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
    $productController->addToStock();
    break;
  case 'removeFromQuantity':
    $productController->removeFromStock();
    break;
  case 'addProduct':
    $productController->add();
    break;
  case 'removeProduct':
    $productController->remove();
    break;
  case 'updateProductPrice':
    $productController->updatePrice();
    break;
  case 'updateProductType':
    $productController->updateType();
    break;
  default:
    $productController->showInventory();
    break;
}