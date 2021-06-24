<?php require_once('include/db.php'); ?>

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
    <link rel="shortcut icon" href="img/icon.png">
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
                <form action="index.php" class="box" method="post">
                  <img src="img/blueIcon7.png" alt="Advisor7" style="width:150px;display:block;margin:auto">
                  <label class="label is-large" style="text-align:center;margin-top:15px;">Advisor7</label>
                  <div class="field">
                    <label for="" class="label">Identifiant</label>
                    <div class="control has-icons-left">
                      <input placeholder="exemple@hote.fr" class="input" required name="cuid">
                      <span class="icon is-small is-left">
                        <i class="fas fa-id-card"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <label for="" class="label">Mot de passe</label>
                    <div class="control has-icons-left">
                      <input type="password" placeholder="**********" class="input" required name="passwd">
                      <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <button type="submit" class="button is-success is-pink" style="padding-left:29%;padding-right:29%;margin-top:15px;">
                      Se connecter
                    </button>
                  </div>
                </form>
                  <a href="testAccount.php" class="button is-dark" style="width:100%"><i class="fas fa-user-tag"></i>&nbsp;Session invité</a>
                  <a href="https://grisel.eu" class="button is-dark" style="width:100%;margin-top:10px;"><i class="fas fa-file-code"></i>&nbsp;Développeur</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</div>

  </body>
</html>
