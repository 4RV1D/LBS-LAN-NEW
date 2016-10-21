<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css" media="screen">
    <meta charset="utf-8">
    <title>Admin</title>
  </head>
  <body id="admin">

    <h2><a href="../" style="color: #e3e3e3; text-decoration: none;">Gå Tillbaka</a></h2>
    <br><hr><br>

    <div class="users">
      <h1>Totalt antal Användare: <?php $Admin->userCount(); ?></h1>
      <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
        </tr>
        <?php $Admin->registered_users(); ?>
      </table>
    </div>

    <br><hr><br>

    <div class="users">
      <h1>Bokade Användare: <?php $Admin->booked_userCount(); ?></h1>
      <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Platsnummer</th>
        </tr>
        <?php $Admin->booked_users(); ?>
      </table>
    </div>

    <br><hr><br>

    <div class="users">
      <h1>Anmälda Till CSGO 1v1</h1>
      <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Game</th>
        </tr>
        <?php echo $Admin->tournament_csgo(); ?>
      </table>
    </div>

    <div class="users">
      <h1>Anmälda Till LoL 1v1</h1>
      <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Game</th>
        </tr>
        <?php echo $Admin->tournament_lol(); ?>
      </table>
    </div>

    <div class="users">
      <h1>Anmälda Till Hearthstone 1v1</h1>
      <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Game</th>
        </tr>
        <?php echo $Admin->tournament_hs(); ?>
      </table>
    </div>

  </body>
</html>
