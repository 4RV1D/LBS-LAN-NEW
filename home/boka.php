<div id="boka">
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
      <?php if (isset($_GET['plats'])): ?>
        <form class="" action="index.html" method="post">
          <p><?php echo "Plats: " . $_GET['plats'] ?></p>
          <input class="button" type="submit" name="submit" value="Boka">
          <br><br><hr><br>
        </form>
      <?php endif; ?>
      <h1>Plats Karta</h1>
      <div class="sal-B">
        <?php
          $i = 0; while ($i < 10) {

            echo "<ul class='platskarta'>";
            $a = 1; while ($a <= 4) {
              echo "<li><a href='?page=boka&plats=B" . ($a + (4 * $i)) . "'>B" . ($a + (4 * $i)) . "</a></li>";
              $a++;
            }

            echo "</ul>";
            $i++;
          }
        ?>
      </div>
      <div class="sal-A">
        <?php
          $i = 0; while ($i < 10) {

            echo "<ul class='platskarta'>";
            $a = 1; while ($a <= 4) {
              echo "<li><a href='?page=boka&plats=A" . ($a + (4 * $i)) . "'>A" . ($a + (4 * $i)) . "</a></li>";
              $a++;
            }

            echo "</ul>";
            $i++;
          }
        ?>
      </div>
      <!--<div class="turnerings-rum">
        <h1>Turnering <br> & Chill Rum</h1>
      </div>-->
    </div>
  </div>

</div>
