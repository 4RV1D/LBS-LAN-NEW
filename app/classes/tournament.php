<?php
/**
 * Login functions
 */
class Tournament {

  function tournament_signup($GameID, $USERid) {

    $Game = "";
    if ($GameID == "1") {$Game = "League of Legends";}
    if ($GameID == "2") {$Game = "CSGO";}
    if ($GameID == "3") {$Game = "Hearthstone";}

    // Include MYSQL for SQL command.
    include __DIR__."/../mysql.php";

    $sql = "INSERT INTO tournament (Game, USERid)
            VALUES ('$GameID', '$USERid')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['tournament-success'] = "<h2 class='header_popup'>Du har gått med i " . $Game . " turneringen.</h2><br>";
        header("Location: ?page=turnering");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function tournament_cancel($GameID, $USERid) {

    $Game = "";
    if ($GameID == "1") {$Game = "League of Legends";}
    if ($GameID == "2") {$Game = "CSGO";}
    if ($GameID == "3") {$Game = "Hearthstone";}

    // Include MYSQL for SQL command.
    include __DIR__."/../mysql.php";

    $sql = "DELETE FROM	tournament WHERE Game='$GameID' AND USERid='$USERid'";

    if ($conn->query($sql) === TRUE) {
      $_SESSION['tournament-success'] = "<h2 class='header_popup'>Du har gått ur " . $Game . " turneringen.</h2><br>";
      header("Location: ?page=turnering");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function already_signup($USERid, $id) {

    include __DIR__."/../mysql.php";

    $sql = "SELECT Game, USERid FROM tournament WHERE Game='$id' AND USERid='$USERid'";
    $result = $conn->query($sql);

    if ($result->num_rows != "1") {
        return "<div class='button'><a href='?page=turnering&gameid=" . $id . "'>Delta</a></div>";
    } else {
        return "<div class='button'><a href='?page=turnering&gameid=" . $id . "&cancel=1'>Gå ur Turnering</a></div>";
    }

  }
}
