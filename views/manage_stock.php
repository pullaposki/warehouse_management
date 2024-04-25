<h2>Manage Stock</h2>

<h3>Add Product</h3>
<form action="index.php?route=addProductType" method="post">
  <label for="product_type">Product Type:</label><br>
  <input type="text" id="product_type" name="product_type" required><br>
  <input type="submit" value="Add">
</form>

<h3>Remove Product</h3>
<form action="index.php?route=removeProductType" method="post">
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

<h3>Buy Products</h3>
<form action="index.php?route=addToQuantity" method="post">
  <label for="buy_product_type">Product:</label><br>
  <select id="buy_product_type" name="product_type" required>
    <?php
    if (count($result) > 0) {
      // Output each row
      foreach ($result as $row) {
        echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
      }
    }
    ?>
  </select><br>
  <label for="buy_quantity">Quantity:</label><br>
  <input type="number" id="buy_quantity" name="quantity" min="1" required><br>
  <input type="submit" value="Buy">
</form>

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