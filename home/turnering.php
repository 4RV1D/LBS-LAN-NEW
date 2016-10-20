<?php
  @session_start();
  $Tournament = new Tournament();
?>

<div id="turnering">
  <div class="container">
    <div class="inner">

      <?php
        echo "<div class='center'>";
          if(isset($_SESSION['tournament-success'])){
            echo $_SESSION['tournament-success'];
            unset($_SESSION['tournament-success']);
          }
        echo "</div>";

        if(isset($_GET['gameid']) && !isset($_GET['cancel'])) {
          $Tournament->tournament_signup($_GET['gameid'], $_SESSION['logged-in']);
        }

        if(isset($_GET['gameid']) && isset($_GET['cancel'])) {
          $Tournament->tournament_cancel($_GET['gameid'], $_SESSION['logged-in']);
        }

      ?>

      <div class="tournament_div">
        <div class="tour_img">
          <img src="../assets/img/LOL-tournament.jpg" alt="" />
        </div>
        <div class="tour_info">
          <h1>League of Legends</h1>
          <p><strong>1 v 1</strong> Best of 1
          <br>Hollowing Abyss
          <br>Final best of 3</p><br>
          <div class="center"><?php echo $Tournament->already_signup($_SESSION['logged-in'], "1"); ?></div>
        </div>
      </div>
      <div class="tournament_div">
        <div class="tour_img">
          <img src="../assets/img/CSGO-tournament.jpg" alt="" />
        </div>
        <div class="tour_info">
          <h1>Counter Strike Global Offensive</h1>
          <p>
          <strong>1 v 1</strong> Best of 1
          <br>Aim map
          <br>Final best of 3</p><br>
          <div class="center"><?php echo $Tournament->already_signup($_SESSION['logged-in'], "2"); ?></div>
        </div>
      </div>
      <div class="tournament_div">
        <div class="tour_img">
          <img src="../assets/img/Hearthstone-tournament.jpg" alt="" />
        </div>
        <div class="tour_info">
          <h1>Hearthstone</h1>
          <p><strong>1 v 1</strong> Best of 3
          <br>Final best of 5</p><br><br>
          <div class="center"><?php echo $Tournament->already_signup($_SESSION['logged-in'], "3"); ?></div>
        </div>
      </div>

    </div>
  </div>
</div>
