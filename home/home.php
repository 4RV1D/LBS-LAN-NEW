<div id="home">
  <nav>
    <a href="?page=home"><img src="../assets/img/logo.png" alt="LBS LAN Logo" /></a>
    <ul>
      <li><a class="nav-link" href="?page=home">Home</a></li>
      <li><a class="nav-link" href="?page=boka">Boka</a></li>
      <li><a class="nav-link" href="?page=turnering">Tunering</a></li>
      <li><a class="nav-link" href="?page=info">Info</a></li>
    </ul>
  </nav>

  <div class="container">
    <div class="inner">

      <?php

        @session_start();

        if(isset($_SESSION['register-success'])) {
          echo "<strong>" . $_SESSION['register-success'] . "</strong><hr><br>";
          unset($_SESSION['register-success']);
        }
      ?>

      <h2><i>Välkommen till</i></h2>
      <!--<img src="../assets/img/logo.png" alt="lbs lan logo" />-->
      <h1>LBS LAN</h1>
      <h3><i>Det bästa Lanet i Linköping<i></h3>
    </div>
  </div>

</div>
