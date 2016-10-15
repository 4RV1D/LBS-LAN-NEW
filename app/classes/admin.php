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
}


?>
