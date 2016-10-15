<div id="home">
  <div class="container">
    <div class="inner">

      <?php

        @session_start();

        if(isset($_SESSION['register-success'])) {
          echo "" . $_SESSION['register-success'] . "<hr><br>";
          unset($_SESSION['register-success']);
        }

        if(isset($_SESSION['login-success'])) {
          echo "" . $_SESSION['login-success'] . "<hr><br>";
          unset($_SESSION['login-success']);
        }
      ?>

      <h2><i>Välkommen till</i></h2>
      <h1>LBS LAN</h1>
      <h3><i>Det bästa Lanet i Linköping<i></h3>
    </div>
  </div>

</div>
