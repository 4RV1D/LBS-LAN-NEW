<?php
/**
 * Profile functions
 */
class Profile {

  // Connect to DB
  public function profile_info($USERid) {

    // Include MYSQL for SQL command.
    include __DIR__."/../mysql.php";

    // Connect to the Database to get the Profile informaton
    $sql = "SELECT USERid, Name, Username, TableNum FROM users WHERE USERid='$USERid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='profile_info'>";
          echo "<h1>" . $row['Username'] . "</h1>";
          echo "<p><strong>Namn: </strong>" . $row['Name'] . "</p>";
          echo "<p><strong>Plats: </strong>" . $row['TableNum'] . "</p>";
        echo "</div>";
      }
    } else {
      $_SESSION['profile-fail'] = "<h3 class='header_popup'>Ingen profil hittades</h3>";
      header("Location: ?page=profile");
      die();
    }

  }
}
