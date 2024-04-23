<!-- sell.php -->
<h1>Sell Products</h1>
<form action="sell_product.php" method="post">
  <label for="product_name">Product Name:</label><br>
  <input type="text" id="product_name" name="product_name"><br>
  <label for="quantity">Quantity:</label><br>
  <input type="number" id="quantity" name="quantity" min="1"><br>
  <input type="submit" value="Sell">
</form>