<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" media="screen">
    <meta charset="utf-8">
    <title>LBS LAN</title>
  </head>

  <body>
    <?php

      @session_start();
      include "../app/autoload.php";
      include "nav.php";

      if (isset($_GET['page'])) {
        $page = $_GET['page'];

        if($page == "boka") {
          include "boka.php";
          die();
        }

        if($page == "turnering") {
          include "turnering.php";
          die();
        }

        if($page == "info") {
          include "info.php";
          die();
        }

        if($page == "home") {
          include "home.php";
          die();
        }

      } else {
        include "home.php";
        die();
      }

    ?>
  </body>
</html>
