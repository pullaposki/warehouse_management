<h3>Add a New Product</h3>
<form action="index.php?route=addProduct" method="post">
  <label for="product_type">Product Type:</label><br>
  <input type="text" id="product_type" name="product_type" required><br>

  <label for="price">Price:</label><br>
  <input type="number" id="price" name="price" step="0.01" min="0" required><br>

  <label for="starting_stock">Starting Stock:</label><br>
  <input type="number" id="starting_stock" name="starting_stock" min="0" required><br>

  <input type="submit" value="Add">
</form>
