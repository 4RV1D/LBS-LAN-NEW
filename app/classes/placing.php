<?php
/**
 * Placing and order system
 */
class Placing {

  function reservation() {

    include __DIR__."/../mysql.php";

  	$sql = "SELECT TableNum FROM users";
  	$result = $conn->query($sql);

    if ($result->num_rows > 0) {

      $booked = array();

      while($row = $result->fetch_assoc()) {
        if ($row['TableNum'] != "0") {
          array_push($booked, $row['TableNum']);
        }
      }
    }
    return $booked;
  }

  function is_reserved($booked, $seat) {
    if (in_array($seat, $booked)) {
      return "<a class='taken' href='?page=boka&plats=" . $seat . "'>" . $seat . "</a>";
    } else {
      return "<a href='?page=boka&plats=" . $seat . "'>" . $seat . "</a>";
    }
  }

  function is_reserved_bool($booked, $seat) {
    if (in_array($seat, $booked)) {
      return true;
    } else {
      return false;
    }
  }

  function get_seatinfo($seat) {

    include __DIR__."/../mysql.php";

  	$sql = "SELECT Name, Username FROM users WHERE TableNum='$seat'";
  	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        return "<p>" . $row['Username'] . "<br/>" . $row['Name'] . "</p>";
      }
    } else {
      return "User not found.";
    }
  }

  function is_yourseat($USERid, $seat) {

    include __DIR__."/../mysql.php";

    $sql = "SELECT TableNum FROM users WHERE USERid='$USERid'";
  	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        if ($row['TableNum'] == $seat) {
          return true;
        } else {
          return false;
        }

      }
    } else {
      return "User not found.";
    }
  }

  function reserve($USERid, $seat) {

    include __DIR__."/../mysql.php";

    $sql = "UPDATE users SET TableNum='$seat' WHERE USERid='$USERid'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['reserve-success'] = "<p>Du har bokat plats " . $seat . "</p>";
        header("Location: ?page=boka&plats=" . $seat . "");
    } else {
        echo "Error: Din user finns inte.";
    }
  }

  function cancel($USERid, $seat) {
    include __DIR__."/../mysql.php";

    $sql = "UPDATE users SET TableNum='0' WHERE USERid = '$USERid'";

    if ($conn->query($sql) === TRUE) {
      $_SESSION['cancel-success'] = "<p>Du har avbokat plats" . $seat . "</p>";
      header("Location: ?page=boka&plats=" . $seat . "");
    } else {
      echo "Error: Din plats finns inte!";
    }
  }
}
