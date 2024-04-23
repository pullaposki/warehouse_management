<?php
$route = $_GET['route'] ?? 'inventory';

switch ($route) {
  case 'buy':
    include 'views/buy.php';
    break;
  case 'sell':
    include 'views/sell.php';
    break;
  default:
    include 'views/inventory.php';
    break;
}
?>

<div>
  <a href="index.php?route=inventory">Inventory</a> |
  <a href="index.php?route=buy">Buy</a> |
  <a href="index.php?route=sell">Sell</a>
</div>