<h2>Buy Products</h2>
<form action="buy_product.php" method="post">
  <label for="product_type">Product Type:</label><br>
  <input type="text" id="product_type" name="product_type" required><br>
  <label for="product_name">Product Name:</label><br>
  <input type="text" id="product_name" name="product_name" required><br>
  <label for="quantity">Quantity:</label><br>
  <input type="number" id="quantity" name="quantity" min="1" required><br>
  <input type="submit" value="Buy">
</form>