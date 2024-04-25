<h2>Manage Stock</h2>

<h3>Add Product</h3>
<form action="index.php?route=addProduct" method="post">
  <label for="product_type">Product Type:</label><br>
  <input type="text" id="product_type" name="product_type" required><br>

  <label for="price">Price:</label><br>
  <input type="number" id="price" name="price" step="0.01" min="0" required><br>

  <label for="starting_stock">Starting Stock:</label><br>
  <input type="number" id="starting_stock" name="starting_stock" min="0" required><br>

  <input type="submit" value="Add">
</form>

<h3>Remove Product</h3>
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

<!-- Update Product Price -->
<h3>Update Product Price</h3>
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

<!-- Update Product Type -->
<h3>Update Product Type</h3>
<form action="index.php?route=updateProductType" method="post">
  <label for="old_product_type">Product Type:</label><br>
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

<!-- Sell Products -->
<h3>Sell Products</h3>
<form action="index.php?route=removeFromQuantity" method="post">
  <label for="sell_product_type">Product:</label><br>
  <select id="sell_product_type" name="product_type" required>
    <?php
    if (count($result) > 0) {
      // Output each row
      foreach ($result as $row) {
        echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
      }
    }
    ?>
  </select><br>
  <label for="sell_quantity">Quantity:</label><br>
  <input type="number" id="sell_quantity" name="quantity" min="1" required><br>
  <input type="submit" value="Sell">
</form>