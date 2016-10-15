<?php

  @session_start();
  include "../../app/autoload.php";
  $Admin = new Admin();

  if($Admin->is_userAdmin($_SESSION['logged-in'])) {

    include "admin.php";
    die();

  } else {
    header("Location: ../");
  }
