<h3>Add to Stock</h3>
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
  <input type="submit" value="Add">
</form>

<h3>Remove from Stock</h3>
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
  <input type="submit" value="Remove">
</form>