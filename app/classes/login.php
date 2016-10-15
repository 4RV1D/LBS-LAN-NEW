<?php
/**
 * Login functions
 */
class Login {

  // Have the user entered both Username And Password
  function form_check($Username, $Password) {
    if (empty($Username) || empty($Password)) {
      $_SESSION['login-fail'] = "<h3>Du måste fylla i både Användarnamn och Lösenord</h3>";
      header("Location: fail");
      die();
    }
  }

  // Encrypt Password with a MD5 String so it matches the one in DB
  function hash($Password) {

    $options = ['cost' => 12,];
    $encryptedPassword = password_hash($Password, PASSWORD_BCRYPT, $options);

    return $encryptedPassword;
  }

  // Connect to DB and check the username and password
  function run_login($Username, $Password) {

    // Include MYSQL for SQL command.
    include __DIR__."/../mysql.php";

    // Connect to the Database to get the User ID, Username and Password
    $sql = "SELECT USERid, Username, Password FROM users WHERE Username='$Username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        // Check if the password matches the one in DB
        if (password_verify($Password, $row["Password"])) {
          $_SESSION['logged-in'] = $row["USERid"];
          $_SESSION['login-success'] = "<p class='header_popup'>Välkommen tillbaka " . $Username . "!</p>";
          header("Location: ../home/?page=home");

        } else {
          $_SESSION['login-fail'] = "<h3 class='header_popup'>Ditt lösenord var fel</h3>";
          header("Location: ?page=login");
          die();
        }
      }

    } else {
      $_SESSION['login-fail'] = "<h3 class='header_popup'>Ditt användarnamn finns inte</h3>";
      header("Location: ?page=login");
      die();
    }

  }
}
