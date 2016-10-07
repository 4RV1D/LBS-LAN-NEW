<?php

@session_start();
include "../app/autoload.php";

?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../assets/css/style.css" media="screen">
      <meta charset="utf-8">
      <title>LBS LAN - Logga in</title>
   </head>
   <body>
     <div id="register-body">
       <div id="register">
         <div class="image">
           <div class="image-overlay">
             <h1>LBS LAN</h1>
             <h3>Linköpings Best LAN event</h3>
           </div>
         </div>

        <?php

        if (isset($_GET['page'])) {
          $page = $_GET['page'];

          if($page == "login") {
            include "login.php";
          }

          if($page == "register") {
            include "register.php";
          }
        } else {
          include "login.php";
        }

        ?>

      </div>
      <div class="more-info">
        <i class="fa fa-angle-down" aria-hidden="true"></i>
        <p>Mer Information</p>
      </div>
     </div>

     <div id="info">
       <div class="info-container">
         <div class="info-content" style="float: right;">
           <h1>Vad behöver du ha med dig?</h1>
           <ul>
             <li>Dator/konsol</li>
             <li>Skärm</li>
             <li>Tillhörande kablage</li>
             <li>Tangentbord & mus</li>
             <li>Musmatta</li>
             <li>Förgreningsdosa</li>
             <li>Nätverkssladd, minst 10 meter</li>
             <li>Stol finns på plats, men man kan även ha med sig egen. Fåtölj/soffa är inte tillåtet.</li>
             <li>Silvertejp (om du lider av de ibland vassa bordskanterna)</li>
             <li>Mobiltelefon + laddare</li>
             <li>Liggunderlag</li>
             <li>Kudde</li>
             <li>Tandborste + Tandkräm</li>
             <li>Hörselproppar</li>
             <li>Hygienartiklar</li>
             <li>Medicin vid sjukdom</li>
             <li>Huvudvärkstablett</li>
             <li>Ett gott humör</li>
             <li>Antivirus, antispyware och brandvägg. Extra viktigt om man har OS från Microsoft.</li>
             <li>Ficklampa</li>
           </ul>
         </div>
         <div class="info-content">
           <h1>Pris</h1>
            <ul>
              <li>1 Dator Plats Biljett <i>ta med dator!</i> - 70KR</li>
              <li>1 Inträdes Biljett <i>ingen dator!</i> – 20KR</li>
              <h3>Med Dator Plats Ingår</h3>
              <ul>
                <li>1 Stol</li>
                <li>70x60cm / 90x60cm plats</li>
                <li>Sovplats</li>
              </ul>
            </ul>
            <br>
         </div>
         <div class="info-content">
           <h1>Inte tillåtet</h1>
             <ul>
               <li>Högtalare</li>
               <li>Inga Streams</li>
               <li>Nerladdning pga Internet (ladda ner spel innan lanet!)</li>
             </ul>
         </div>
       </div>
     </div>
   </body>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
   <script src="../assets/js/animations.js"></script>
</html>
