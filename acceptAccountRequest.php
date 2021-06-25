<!-- head -->
<head>
  <meta charset="utf-8">
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

<?php

require_once('include/db.php');

if (!$_SESSION["cuid"]) {
  header('Location: login.php');
}

if ($_SESSION["cuid"]=="test0000" || !$_SESSION["role"]=="admin") {
  header('Location: index.php');
}

if(isset($_GET['id'])){
  $id = $_GET["id"];
  if($_GET["accept"]=="y"){$accept = True;}
  else $accept = False;
}else {
  header('Location: index.php');
}

$stmtDB = $db->prepare('SELECT * FROM accountRequest WHERE cuid LIKE ?');
$stmtDB->bind_param("s",$id);
$stmtDB->execute();
$queryDB = $stmtDB->get_result();
$rowDB = $queryDB->fetch_assoc();
$prenom = $rowDB['prenom'];
$nom = $rowDB['nom'];
$mdp = $rowDB['motdepasse'];

$stmtDB = $db->prepare('DELETE FROM accountRequest WHERE cuid LIKE ?');
$stmtDB->bind_param("s",$id);
$stmtDB->execute();
$queryDB = $stmtDB->get_result();

if($accept){
  $stmtDB = $db->prepare('INSERT INTO user VALUES(?,?,?,?,"membre")');
  $stmtDB->bind_param("ssss",$id,$mdp,$prenom,$nom);
  $stmtDB->execute();
  $queryDB = $stmtDB->get_result();
}

header('Location: dashboard.php');

 ?>
