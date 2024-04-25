<h2>Inventory</h2>
<table>
  <tr>
    <th>Product Type</th>
    <th>Quantity</th>
  </tr>
  <?php foreach ($result as $product): ?>
    <tr>
      <td><?= $product['type'] ?></td>
      <td><?= $product['quantity'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>