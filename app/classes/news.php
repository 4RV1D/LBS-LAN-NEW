<?php
/**
 *  News System
 */
class News {

  function post_news($title, $text, $name) {

    include "mysql.php";

    $sql = "INSERT INTO news (Title, Text, Name)
            VALUES ('$title', '$text', '$name')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['news-success'] = "<h3 class='header_popup'>You posted some news</h3>";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  public function show_news() {

    // Include MYSQL for SQL command.
    include "mysql.php";

    // Connect to the Database to get the Profile informaton
    $sql = "SELECT Title, Text, Name FROM news ORDER BY NewsID DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        echo "<div class='news-content'>";
          echo "<h1>". $row['Title'] . "</h1>";
          echo "<hr>";
          echo "<p>" . $row['Text'] . "</p>";
          echo "<hr>";
          echo "<p><strong>Skrivet av: </strong>" . $row['Name'] . "</p>";
        echo "</div>";
      }
    }
  }
}
