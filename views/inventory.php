<h2>Inventory</h2>
<?php
require_once __DIR__ . '/../controllers/WarehouseController.php';
$controller = new WarehouseController();
$productCount = $controller->getQuantity();
echo "Total quantity of products in the warehouse: $productCount";
?>