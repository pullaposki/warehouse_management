<h2>Sell Products</h2>
<form action="index.php?route=remove" method="post">
  <label for="product_type">Product:</label><br>
  <select id="product_type" name="product_type" required>
    <?php
    if (count($result) > 0) {
      // Output each row
      foreach ($result as $row) {
        echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
      }
    }
    ?>
  </select><br>
  <label for="quantity">Quantity:</label><br>
  <input type="number" id="quantity" name="quantity" min="1" required><br>
  <input type="submit" value="Sell">
</form>