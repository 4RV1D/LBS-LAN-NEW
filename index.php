<?php @session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ERROR</title>
    <link rel="stylesheet" href="assets/css/style.css" media="screen">
  </head>
  <body>

    <?php
      include "app/autoload.php";

      // Check MySQL connection
      if ($conn->connect_error) {
          die("<h1>Database Error!</h1>");
      }

      // Check if use is logged in
      if (isset($_SESSION['logged-in'])) {
        header("Location: home/");
      } else {
        header("Location: login/");
      }
    ?>

  </body>
</html>
