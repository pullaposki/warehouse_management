<h3>Update Type</h3>
<form action="index.php?route=updateProductType" method="post">
  <label for="old_product_type">Product:</label><br>
  <select id="old_product_type" name="old_product_type" required>
    <?php
    if (count($result) > 0) {
      // Output each row
      foreach ($result as $row) {
        echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
      }
    }
    ?>
  </select><br>
  <label for="new_product_type">New Product Type:</label><br>
  <input type="text" id="new_product_type" name="new_product_type" required><br>
  <input type="submit" value="Update">
</form>

<h3>Update Price</h3>
<form action="index.php?route=updateProductPrice" method="post">
  <label for="update_product_type">Product Type:</label><br>
  <select id="update_product_type" name="product_type" required>
    <?php
    if (count($result) > 0) {
      // Output each row
      foreach ($result as $row) {
        echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
      }
    }
    ?>
  </select><br>
  <label for="update_price">Price:</label><br>
  <input type="number" id="update_price" name="price" step="0.01" min="0" required><br>
  <input type="submit" value="Update">

</form>