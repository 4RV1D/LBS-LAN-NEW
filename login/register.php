<?php

if (isset($_POST['register'])) {

  $Name       = $_POST['name'];
  $Email      = $_POST['email'];
  $Username   = $_POST['username'];
  $Password   = $_POST['password'];
  $PasswordC  = $_POST['password-confirm'];

  $Register = new Register();

  $Register->formInputConfirmation($Name, $Email, $Username, $Password, $PasswordC);
  $Register->passwordconfirmation($Password, $PasswordC);

  $encryptedPassword = $Register->hash($Password);

  if($Register->createUser($Name, $Username, $encryptedPassword, $Email)) {
    $Register->loginUser($Password, $Username);
  }

}

?>

<form id="register-form" class="form" action="?page=register" method="POST" autocomplete="off">
  <h3><a href="?page=login"><i class="fa fa-arrow-left"></i> Go Back</a></h3>
  <div class="error">
    <?php
      if(isset($_SESSION['register-fail'])) {
        echo $_SESSION['register-fail'];
        unset($_SESSION['register-fail']);
      }
    ?>
  </div>
  <div class="field">
    <i class="fa fa-user"></i>
    <input type="text" name="name" placeholder="Förnamn & Efternamn">
  </div>
  <div class="field">
    <i class="fa fa-envelope-o"></i>
    <input type="email" name="email" placeholder="Email Adress">
  </div>
  <div class="field">
    <i class="fa fa-user"></i>
    <input type="text" name="username" placeholder="Användarnamn">
  </div>
  <div class="field">
    <i class="fa fa-key"></i>
    <input type="password" name="password" placeholder="Lösenord">
  </div>
  <div class="field">
    <i class="fa fa-key"></i>
    <input type="password" name="password-confirm" placeholder="Lösenords Bekräftelse">
  </div>
  <br>
  <input class="button" type="submit" name="register" value="Registrera Dig"></button>
</form>
