<?php
/**
 * Placing and order system
 */
class Placing {

  function alreadyBoked($USERid) {

    include "mysql.php";

    $sql = "SELECT TableNum FROM users WHERE USERid = '$USERid'";
  	$result = $conn->query($sql);

  	if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($row['TableNum'] != "0") {
          echo "
            <i class='fa fa-times' aria-hidden='true'></i><a class='button' href='cancel-boking'>Avboka</a>
            <i class='fa fa-arrows' aria-hidden='true'></i><a class='button' href='move-seat'>Flytta</a>
          ";
        } else {
          echo "<i class='fa fa-check-circle-o' aria-hidden='true'></i><a class='button' href='order'>Boka</a>";
        }
      }
    }
  }

  function placing($seat) {

    include "mysql.php";

  	$sql = "SELECT TableNum FROM users WHERE TableNum = '$seat'";
  	$result = $conn->query($sql);

  	if ($result->num_rows > 0) {

  		return "<p class='taken'>$seat</p>";

  	} else {
  		return "<p>$seat</p>";
  	}
  }

  function placing_order($seat) {

    include "mysql.php";

  	$sql = "SELECT TableNum FROM users WHERE TableNum = '$seat'";
  	$result = $conn->query($sql);

  	if ($result->num_rows > 0) {

  		return "<p class='taken_order'>$seat</p>";

  	} else {
  		return "<input type='radio' name='seat' value='$seat'/><p>$seat</p>";
  	}
  }

  function order($USERid, $OrderSeat) {

    include "mysql.php";

    $sql = "UPDATE users SET TableNum = '$OrderSeat' WHERE USERid = '$USERid'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['order-success'] = "<h3 class='header_popup'>Du har bokat plats " . $OrderSeat . "</h3>";
        header("Location: placing");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function move($USERid, $OrderSeat) {
    include "mysql.php";

    $sql = "UPDATE users SET TableNum = '$OrderSeat' WHERE USERid = '$USERid'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['order-success'] = "<h3 class='header_popup'>Du har bokat plats " . $OrderSeat . "</h3>";
        header("Location: placing");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function cancel($USERid) {
    include "mysql.php";

    $sql = "UPDATE users SET TableNum='' WHERE USERid = '$USERid'";

    if ($conn->query($sql) === TRUE) {
      $_SESSION['order-success'] = "<h3 class='header_popup'>Du har avbokat din plats</h3>";
      header("Location: placing");
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }
}
