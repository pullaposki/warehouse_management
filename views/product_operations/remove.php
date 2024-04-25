<h3>Remove a Product</h3>
<form action="index.php?route=removeProduct" method="post">
  <?php
  if (count($result) > 0) {
    // Output each row
    foreach ($result as $row) {
      echo "<input type='checkbox' id='remove_product_type' name='product_type[]' value='" . $row['type'] . "'>";
      echo "<label for='remove_product_type'>" . $row['type'] . "</label><br>";
    }
  }
  ?>
  <input type="submit" value="Remove">
</form>