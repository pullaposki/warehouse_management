<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warehouse</title>
</head>

<body>
  <h1>Warehouse</h1>

  <?php

  require_once __DIR__ . '/db/DbConnector.php';
  $dbConnector = new DbConnector();
  $connection = $dbConnector->connect();
  
  if ($connection === null) {
      echo "Failed to connect to the database.";
  } else {
      echo "Connected to the database successfully.";
  }
  ?>
</body>

</html>