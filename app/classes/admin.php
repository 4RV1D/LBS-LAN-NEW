<?php

/**
 * Admin class
 */
class Admin {

  function is_userAdmin($USERid) {
    include __DIR__."/../mysql.php";

    $sql = "SELECT Admin FROM users WHERE USERid='$USERid'";
  	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        if ($row['Admin'] == "1") {
          return true;
        } else {
          return false;
        }
      }
    }
  }

  function registered_users() {
    include __DIR__."/../mysql.php";

    $sql = "SELECT Name, Username, Email FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "
        <tr>
          <td>" . $row['Name'] . "</td>
          <td>" . $row['Username'] . "</td>
          <td>" . $row['Email'] . "</td>
        </tr>
        ";
      }
    }
  }

  function booked_users() {
    include __DIR__."/../mysql.php";

    $sql = "SELECT Name, Username, Email, TableNum FROM users WHERE TableNum != '0'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "
        <tr>
          <td>" . $row['Name'] . "</td>
          <td>" . $row['Username'] . "</td>
          <td>" . $row['Email'] . "</td>
          <td>" . $row['TableNum'] . "</td>
        </tr>
        ";
      }
    }
  }

  function booked_userCount() {
    include __DIR__."/../mysql.php";

    $sql = "SELECT COUNT(DISTINCT TableNum) FROM users WHERE TableNum != '0'";
    $result = $conn->query($sql);

    $rows = mysqli_fetch_row($result);
    echo $rows[0];
  }

  function userCount() {
    include __DIR__."/../mysql.php";

    $sql = "SELECT COUNT(USERid) FROM users";
    $result = $conn->query($sql);

    $rows = mysqli_fetch_row($result);
    echo $rows[0];
  }

  function tournament_csgo() {

    include __DIR__."/../mysql.php";

    $sql = "SELECT users.USERid, users.Name, users.Username, tournament.Game, tournament.USERid
    FROM users
    RIGHT JOIN tournament
    ON  users.USERid = tournament.USERid
    WHERE tournament.Game=2";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        $Game = "Default";
        if ($row['Game'] == "1") {$Game = "League Of Legends";}
        if ($row['Game'] == "2") {$Game = "CSGO";}
        if ($row['Game'] == "3") {$Game = "Hearthstone";}

        echo "
        <tr>
          <td>" . $row['Name'] . "</td>
          <td>" . $row['Username'] . "</td>
          <td>" . $Game . "</td>
        </tr>
        ";

      }
    } else {
      echo "Fuck.. Error, RIP";
    }
  }

  function tournament_lol() {

    include __DIR__."/../mysql.php";

    $sql = "SELECT users.USERid, users.Name, users.Username, tournament.Game, tournament.USERid
    FROM users
    RIGHT JOIN tournament
    ON  users.USERid = tournament.USERid
    WHERE tournament.Game=1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        $Game = "Default";
        if ($row['Game'] == "1") {$Game = "League Of Legends";}
        if ($row['Game'] == "2") {$Game = "CSGO";}
        if ($row['Game'] == "3") {$Game = "Hearthstone";}

        echo "
        <tr>
          <td>" . $row['Name'] . "</td>
          <td>" . $row['Username'] . "</td>
          <td>" . $Game . "</td>
        </tr>
        ";

      }
    } else {
      echo "Fuck.. Error, RIP";
    }
  }

  function tournament_hs() {

    include __DIR__."/../mysql.php";

    $sql = "SELECT users.USERid, users.Name, users.Username, tournament.Game, tournament.USERid
    FROM users
    RIGHT JOIN tournament
    ON  users.USERid = tournament.USERid
    WHERE tournament.Game=3";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        $Game = "Default";
        if ($row['Game'] == "1") {$Game = "League Of Legends";}
        if ($row['Game'] == "2") {$Game = "CSGO";}
        if ($row['Game'] == "3") {$Game = "Hearthstone";}

        echo "
        <tr>
          <td>" . $row['Name'] . "</td>
          <td>" . $row['Username'] . "</td>
          <td>" . $Game . "</td>
        </tr>
        ";

      }
    } else {
      echo "Fuck.. Error, RIP";
    }
  }

}


?>
