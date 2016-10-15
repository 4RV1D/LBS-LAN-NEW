<?php

@session_start();
include "../app/autoload.php";

if (isset($_POST['login'])) {

  $Username   = $_POST['username'];
  $Password   = $_POST['password'];

  $Login = new Login();

  $Login->form_check($Username, $Password);
  $encryptedPassword = $Login->hash($Password);

  $Login->run_login($Username, $Password);
}

?>

<form id="login-form" class="form" action="?page=login" method="POST" autocomplete="off">
  <h2><a href="?page=register">Registrera dig</a></h2>
  <h1>Logga In</h1>
  <br>
  <div class="error">
    <?php
      if(isset($_SESSION['login-fail'])) {
        echo $_SESSION['login-fail'];
        unset($_SESSION['login-fail']);
      }
    ?>
  </div>
  <div class="field">
    <i class="fa fa-user"></i>
    <input type="text" name="username" placeholder="Användarnamn">
  </div>
  <div class="field">
    <i class="fa fa-key"></i>
    <input type="password" name="password" placeholder="Lösenord">
  </div>
  <br>
  <input class="button" type="submit" name="login" value="Logga In"></button>
</form>
