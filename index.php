<?php
require_once 'db/DbConnector.php';
require_once 'models/Product.php';
require_once 'models/Warehouse.php';
require_once 'models/Inventory.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/WarehouseController.php';
require_once 'controllers/InventoryController.php';
require_once 'routes.php';

// // Get the path from the URL and route the request
// $path = $_SERVER['PATH_INFO'] ?? '/';
// route($path);

// connect to db
$db = new DbConnector();
$connection = $db->connect();

// get data from products table
// $product = new Product();
// $products = $product->getAll();

// // print data from products table
// foreach ($products as $product) {
//   echo $product['name'] . '<br>';
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warehouse</title>
</head>

<body>
  <h1>Warehouse Management System</h1>
</body>

</html>