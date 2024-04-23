<h2>Inventory</h2>

<?php
require_once 'config.php';
require_once PROJECT_ROOT . 'models/Warehouse.php';

$warehouse = new Warehouse();
$productCount = $warehouse->getProductCount();

echo "Number of products in the warehouse: $productCount";
?>