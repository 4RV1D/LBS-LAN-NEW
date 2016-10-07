<?php

/**
 * Register class all functions for the register page.
 */
class Register {

  // Form Input confirmation, Have they entered all the fields
  function formInputConfirmation($Name, $Email, $Username, $Password, $PasswordC) {
    if (empty($Name) || empty($Email) || empty($Username) || empty($Password) || empty($PasswordC)) {
      $_SESSION['register-fail'] = "<h3 class='header_popup'>Du måste Fylla i alla Formulär</h3>";
      header("Location: ?page=register");
      die();
    }
  }

  // Password Confirmation
  function passwordconfirmation($password, $passwordconfirm) {
    if ($password != $passwordconfirm) {
      $_SESSION['register-fail'] = "<h3 class='header_popup'>Dina Lösenord mathar inte!</h3>";
      header("Location: ?page=register");
      die();
    }
  }

  function hash($password) {
    $options = ['cost' => 12,];
    $encryptedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    return $encryptedPassword;
  }

  // Create a user for the MYSQL Database
  function createUser($Name, $Username, $Password, $Email) {

    // Include MYSQL for SQL command.
    include "/../mysql.php";

    //Check if the user already exists
    $sql = "SELECT Username FROM users WHERE Username='$Username'";

    if ($result = mysqli_query($conn,$sql)) {
      // Return the number of rows in result set
      $rowcount = mysqli_num_rows($result);
      if ($rowcount != 0) {
        $_SESSION['register-fail'] = "<h3 class='header_popup'>Ditt Användarnamn Används redan.</h3>";
        header("Location: ?page=register");
        die();

      } else {

        //Encrypt the Username and Names so they can't do XSS exploits and troll things.
        $Name_NoHTML = htmlspecialchars($Name, ENT_QUOTES, 'UTF-8');
        $Username_NoHTML = htmlspecialchars($Username, ENT_QUOTES, 'UTF-8');
        $MainGame_NoHTML = htmlspecialchars($MainGame, ENT_QUOTES, 'UTF-8');

        //Insert Register Data into database Users
        $sql = "INSERT INTO users (Name, Username, Password, Email)
                VALUES ('$Name_NoHTML', '$Username_NoHTML', '$Password', '$Email')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
  }

  // login after register
  function loginUser($Password, $Username) {

    // Include MYSQL for SQL command.
    include "/../mysql.php";

    $Username_NoHTML = htmlspecialchars($Username, ENT_QUOTES, 'UTF-8');

    // Connect to the Database to get the User ID, Username and Password
    $sql = "SELECT USERid, Username, Password FROM users WHERE Username='$Username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        if (password_verify($Password, $row["Password"])) {
          $_SESSION['logged-in'] = $row["USERid"];

          $_SESSION['register-success'] = "<p class='header_popup'>Du har Registrerat dig som " . $Username_NoHTML . "!</p>";
          header("Location: ../home/home?page=home");
        }

      }
    }
  }
}
