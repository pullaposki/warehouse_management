<div>
  <a href="index.php?route=inventory">Inventory</a> |
  <a href="index.php?route=buy">Buy</a> |
  <a href="index.php?route=sell">Sell</a>
</div>

<?php
require_once 'controllers/ProductController.php';

$route = $_GET['route'] ?? 'inventory';
$productController = new ProductController();

switch ($route) {
  case 'buy':
    $productController->showBuyForm();
    break;
  case 'sell':
    $productController->showSellForm();
    break;
  case 'add':
    $productController->post();
    break;
  case 'remove':
    $productController->remove();
    break;
  default:
    include 'views/inventory.php';
    break;
}
?>