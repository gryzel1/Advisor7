<?php require_once('include/db.php'); 

if (!$_SESSION["cuid"]) {
  header('Location: login.php');
}

if ($_SESSION["cuid"]=="test0000") {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

  <!-- head -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <title> Advisor7 </title>

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

  <body style="background-color:rgb(2, 73, 147);">
    <div class="block container margin-auto">
      <section class="hero is-fullheight">
        <div class="hero-body">
          <div class="container">
            <div class="columns is-centered">
              <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                <form action="passwordChangeRequest.php" class="box" method="post">
                  <label class="label is-large" style="text-align:center;margin-top:15px;">Modification de mot de passe</label>
                  <div class="field">
                    <label for="" class="label">Ancien mot de passe</label>
                    <div class="control has-icons-left">
                      <input type="password" placeholder="Mot de passe" class="input" required name="oldPassword">
                      <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <label for="" class="label">Nouveau mot de passe</label>
                    <div class="control has-icons-left">
                      <input type="password" placeholder="Mot de passe" class="input" required name="newPassword">
                      <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <label for="" class="label">Répéter le nouveau mot de passe</label>
                    <div class="control has-icons-left">
                      <input type="password" placeholder="Mot de passe" class="input" required name="newPasswordRepeat">
                      <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <button type="submit" class="button is-success is-pink" style="margin-top:15px;">
                      Modifier le mot de passe
                    </button>
                  </div>
                </form>

                <?php
                  if($_GET["answer"]){
                    if($_GET["answer"]=="success"){
                      echo '<div class="notification is-success">
                          Mot de passe modifié avec succès. <a href="index.php">Cliquer pour retourner à l\'accueil.</a>
                        </div>';
                    }else if($_GET["answer"]=="checkFailure"){
                      echo '<div class="notification is-danger">
                          Ancien mot de passe erroné.
                        </div>';
                    }else if($_GET["answer"]=="repeatFailure"){
                      echo '<div class="notification is-danger">
                          Les répétitions du nouveau mot de passe ne correspondent pas.
                        </div>';
                    }
                  }
                  
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</div>
  </body>
</html>