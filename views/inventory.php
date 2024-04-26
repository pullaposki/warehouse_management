<h2>Inventory</h2>
<?php 
if ($message !== null) {
  include 'views/info.php';
}
?>

<table>
  <tr>
    <th>Type</th>
    <th>Stock</th>
    <th>Price</th>
  </tr>
  <?php foreach ($result as $product): ?>
    <tr>
      <td><?= $product['type'] ?></td>
      <td><?= $product['quantity'] ?></td>
      <td><?= $product['price'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>