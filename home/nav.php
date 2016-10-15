<nav>
  <a href="?page=home"><img src="../assets/img/logo.png" alt="LBS LAN Logo" /></a>
  <ul>
    <li><a class="nav-link" href="?page=home">Home</a></li>
    <li><a class="nav-link" href="?page=boka">Boka</a></li>
    <li><a class="nav-link" href="?page=turnering">Tunering</a></li>
    <li><a class="nav-link" href="?page=info">Info</a></li>
    <br>
    <li>
      <?php
        $Admin = new Admin();
        if($Admin->is_userAdmin($_SESSION['logged-in'])) {
          echo "<a class='nav-link' href='admin/'>Admin</a></li>";
        }
      ?>
    </li>
  </ul>
</nav>
