<?php require_once('include/db.php');
$db -> set_charset("utf8");

if (!$_SESSION["cuid"]) {
  header('Location: login.php');
}

if ($_SESSION["cuid"]=="test0000" || !$_SESSION["role"]=="admin") {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

  <!-- head -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <title> Advisor7 - Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- CSS -->

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <!-- fonts -->

    <!-- icon -->
    <link rel="shortcut icon" href="img/icon7.png">
    <!-- icon -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="js/main.js"></script>
    <!-- JS -->
  </head>

  <body>
    <div class="header" style="height:6rem">
      <div class="block container margin-auto">
        <div class="is-header">
          <div class="columns">
            <div class="column">
              <p class="advisor"><img src="img/logo7.png" alt="Advisor7" style="width:50px;margin-top:15px"> Advisor7 <a href="index.php" class="is-hidden-desktop" style="color:white;font-size:20px"><i class="fas fa-home"></i></a></p>
            </div>
            <div style="margin-top:8px;text-align:right" class="column button-column">
              <br>
              <a id="addButton" class="pink-button is-hidden-touch" href="index.php"><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;Retour à la carte</a>
              <br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block container margin-auto">
      <?php
        $stmtRequest = $db->prepare("SELECT * FROM accountRequest");
        $stmtRequest->execute();
        $queryRequest = $stmtRequest->get_result();
        while($rowRequest = $queryRequest->fetch_assoc()){
          $id = $rowRequest['cuid'];
          $nom = $rowRequest['nom'];
          $prenom = $rowRequest['prenom'];

          echo '<div class="box is-hidden-touch" style="width:75%;margin:auto;margin-top:15px;">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <p>
                    <span style="float:right"><a href="acceptAccountRequest.php?id='.$id.'&accept=n" class="button is-success is-modify"><i class="fas fa-user-minus"></i></a></span>
                    <span style="float:right;margin-right:10px;"><a href="acceptAccountRequest.php?id='.$id.'&accept=y" class="button is-success is-modify"><i class="fas fa-user-plus"></i></a></span>
                    <strong>'.$prenom.' '.$nom.'</strong>
                    <br>
                    <span class="blue-color"><i class="fas fa-paper-plane"></i></span>&nbsp;&nbsp;'.$id.'
                  </p>
                </div>
              </div>
            </article>
          </div>';

          echo '<div class="box is-hidden-desktop" style="width:90%;margin:auto;margin-top:15px;">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <p>
                    <span style="float:right"><a href="acceptAccountRequest.php?id='.$id.'&accept=n" class="button is-success is-modify"><i class="fas fa-user-minus"></i></a></span>
                    <span style="float:right;margin-right:10px;"><a href="acceptAccountRequest.php?id='.$id.'&accept=y" class="button is-success is-modify"><i class="fas fa-user-plus"></i></a></span>
                    <strong>'.$prenom.' '.$nom.'</strong>
                    <br><br>
                    <span class="blue-color"><i class="fas fa-paper-plane"></i></span>&nbsp;&nbsp;'.$id.'
                  </p>
                </div>
              </div>
            </article>
          </div>';

          echo '<script>  window.addEventListener("load", function () {// Get the modal
            var modal'.$id.' = document.getElementById("restoDesc'.$id.'");

            // Get the button that opens the modal
            var btn'.$id.' = document.getElementById("select'.$id.'");
            var btn'.$id.'Mobile = document.getElementById("select'.$id.'Mobile");

            // Get the <span> element that closes the modal
            var span'.$id.' = document.getElementById("close'.$id.'");

            // When the user clicks on the button, open the modal
            btn'.$id.'.onclick = function() {
              modal'.$id.'.style.display = "block";
            }
            btn'.$id.'Mobile.onclick = function() {
              modal'.$id.'.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span'.$id.'.onclick = function() {
              modal'.$id.'.style.display = "none";
            }
          })</script>';
          echo '<script>var submit'.$id.' = document.getElementById("submit-button'.$id.'");
            var nom'.$id.' = document.getElementById("nom'.$id.'");
            var commune'.$id.' = document.getElementById("commune'.$id.'");
            var plat'.$id.' = document.getElementById("plat'.$id.'");
            var tel'.$id.' = document.getElementById("tel'.$id.'");
            var x'.$id.' = document.getElementById("x'.$id.'");
            var y'.$id.' = document.getElementById("y'.$id.'");
            var form'.$id.' = document.getElementById("form'.$id.'");

            submit'.$id.'.onclick = function() {
              var check'.$id.'=true;
              if (nom'.$id.'.value=="") {
                nom'.$id.'.className="input is-danger";
                check'.$id.'=false;
              }else{
                nom'.$id.'.className="input is-success";
              }

              if (!parseFloat(x'.$id.'.value)) {
                x'.$id.'.className="input is-danger";
                check'.$id.'=false;
              }else{
                x'.$id.'.className="input is-success";
              }

              if (!parseFloat(y'.$id.'.value)) {
                y'.$id.'.className="input is-danger";
                check'.$id.'=false;
              }else{
                y'.$id.'.className="input is-success";
              }

              if (commune'.$id.'.value=="") {
                commune'.$id.'.className="input is-warning";
              }else{
                commune'.$id.'.className="input is-success";
              }

              if (plat'.$id.'.value=="") {
                plat'.$id.'.className="input is-warning";
              }else if (parseFloat(plat'.$id.'.value)){
                plat'.$id.'.className="input is-success";
              }else{
                plat'.$id.'.className="input is-danger";
                check'.$id.'=false;
              }

              if(tel'.$id.'.value=="") {
                tel'.$id.'.className="input is-warning";
              }else if(parseFloat(tel'.$id.'.value)){
                tel'.$id.'WithoutSpace = tel'.$id.'.value.replace(/\s+/g, "");
                if(tel'.$id.'WithoutSpace.length==10){
                  tel'.$id.'.className="input is-success";
                }else{
                  tel'.$id.'.className="input is-danger";
                  check'.$id.'=false;
                }
              }else{
                tel'.$id.'.className="input is-danger";
                check'.$id.'=false;
              }

              if (check'.$id.'==true) {
                form'.$id.'.setAttribute("onSubmit", "");
                form'.$id.'.submit();
              }
            }</script>';
        }
      ?>
    </div>
</div>

  </body>
</html>
