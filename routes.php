<?php
function route($path)
{
  switch ($path) {
    case '/products':
      $controller = new ProductController();
      $controller->index();
      break;
    // Add more routes here...
    default:
      echo "404 Not Found";
  }
}