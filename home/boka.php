<?php

  $Placing = new Placing("0");
  $booked = $Placing->reservation();
  $USERid = $_SESSION['logged-in'];

?>

<div id="boka">
  <div class="container">
    <div class="inner">
      <?php
        if (isset($_GET['plats'])):
          $seat = $_GET['plats'];

          if (isset($_POST['boka'])) {$Placing->reserve($USERid, $seat);}
          if (isset($_POST['avboka'])) {$Placing->cancel($USERid, $seat);}
      ?>

        <?php if ($Placing->is_reserved_bool($booked, $seat)): ?>

          <?php
            if(isset($_SESSION['reserve-success'])) {
              echo "<center><strong>" . $_SESSION['reserve-success'] . "</strong></center>";
              unset($_SESSION['reserve-success']);
            }
          ?>

          <div class="seat-info">
            <p><?php echo "Den här platsen är bokad av<strong>" . $Placing->get_seatinfo($seat) . "</strong>"; ?></p>

            <?php if ($Placing->is_yourseat($USERid, $seat)): ?>
              <form class="" action="?page=boka&plats=<?php echo $seat ?>" method="post">
                <input class="button" type="submit" name="avboka" value="Avboka">
              </form>
            <?php endif; ?>

            <br/><hr><br/>
          </div>

        <?php else: ?>
          <form class="" action="?page=boka&plats=<?php echo $seat ?>" method="post">
            <p><?php echo "Plats: " . $seat ?></p>
            <input class="button" type="submit" name="boka" value="Boka">
            <br/><br/><hr><br/>
          </form>

        <?php endif; ?>
      <?php endif; ?>
      <h1>Platskarta</h1>
      <div class="sal-A">
        <?php
          $i = 0; while ($i < 10) {
            echo "<ul class='platskarta'>";

            $a = 1; while ($a <= 4) {
              $seat = "A" . ($a + (4 * $i)) . "";
              echo "<li>" . $Placing->is_reserved($booked, $seat) . "</li>";
              $a++;
            }

            echo "</ul>";
            $i++;
          }
        ?>
      </div>
      <div class="sal-B">
        <?php

          $i = 0; while ($i < 7) {
            echo "<ul class='platskarta'>";

            $a = 1; while ($a <= 4) {
              $seat = "B" . ($a + (4 * $i)) . "";
              echo "<li>" . $Placing->is_reserved($booked, $seat) . "</li>";
              $a++;
            }

            echo "</ul>";
            $i++;
          }
        ?>
      </div>
      <div class="turnerings-rum">
        <h1>Turnering <br> & Chill Rum</h1>
      </div>

      <br><br><br><br><br><br><br><br><br><br><br><br><hr/>
      <div class="sal-info">
        <p>Sal A är utanför 201 och 202, Sal B är i 201. Turnerings rummet är i 202.</p>
      </div>
    </div>
  </div>
</div>
