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
$db -> set_charset("utf8");

if (!$_SESSION["cuid"]) {
  header('Location: login.php');
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
}else {
  header('Location: ../index.php');
}

$stmtDB = $db->prepare('DELETE FROM reservation WHERE cuid like ?');
$stmtDB->bind_param("ssi",$_SESSION["cuid"]);
$stmtDB->execute();
$queryDB = $stmtDB->get_result();

header('Location: ../index.php');

 ?>
