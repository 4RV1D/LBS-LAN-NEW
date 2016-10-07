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
    include "mysql.php";

    $sql = "INSERT INTO tournaments (Game, USERid)
            VALUES ('$GameID', '$USERid')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['tournament-success'] = "<h2 class='header_popup'>Du har gått med i " . $Game . " turneringen.</h2><br>";
        header("Location: tournament");
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
    include "mysql.php";

    $sql = "DELETE FROM tournaments WHERE Game='$GameID' AND USERid='$USERid'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['tournament-success'] = "<h2 class='header_popup'>Du har gått ur " . $Game . " turneringen.</h2><br>";
        header("Location: tournament");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function already_signup($USERid, $id) {

    include "mysql.php";

    $sql = "SELECT Game, USERid FROM tournaments WHERE Game='$id' AND USERid='$USERid'";

    if ($result = mysqli_query($conn,$sql)) {
      $rowcount = mysqli_num_rows($result);

      if ($rowcount != "1") {

        return "<a class='button' href='tournament-signup?gameid=" . $id . "'>Delta</a>";

      } else {
        return "<a class='button' href='tournament-cancel?gameid=" . $id . "'>Gå ur Turnering</a>";
      }
    }
  }
}
