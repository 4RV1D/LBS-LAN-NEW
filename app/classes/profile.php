<?php
/**
 * Profile functions
 */
class Profile {

  // Connect to DB
  public function db_get_information($USERid) {

    // Include MYSQL for SQL command.
    include "mysql.php";

    // Connect to the Database to get the Profile informaton
    $sql = "SELECT USERid, FirstName, LastName, Username, MainGame, ProfilePic, TableNum FROM users WHERE USERid='$USERid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        echo "<div class='profile_picture'>";
          echo "<img src='" . $row['ProfilePic'] . "'>";
        echo "</div>";

        echo "<div class='profile_info'>";
          echo "<h1>" . $row['Username'] . "</h1>";
          echo "<p><strong>Namn: </strong>" . $row['FirstName'] . " " . $row['LastName'] . "</p>";
          echo "<p><strong>Main Spel: </strong>" . $row['MainGame'] . "</p>";
          echo "<p><strong>Plats: </strong>" . $row['TableNum'] . "</p>";
        echo "</div>";
      }
    } else {
      $_SESSION['profile-fail'] = "<h3 class='header_popup'>Ingen profil hittades</h3>";
      header("Location: profile");
      die();
    }

  }
}
