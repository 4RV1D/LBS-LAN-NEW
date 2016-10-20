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

}


?>
