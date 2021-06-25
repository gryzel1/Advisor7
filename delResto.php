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
  header('Location: ../modify.php');
}

$stmtResto = $db->prepare("SELECT * FROM resto WHERE id=?");
$stmtResto->bind_param("i",$id);
$stmtResto->execute();
$queryResto = $stmtResto->get_result();
$rowResto = $queryResto->fetch_assoc();
$adder = $rowResto['cuid'];
$isAdder = False;
if($adder == $_SESSION["cuid"]) $isAdder = True;

if($_SESSION["role"]=="admin" || $isAdder){
  $stmtDB = $db->prepare('DELETE FROM resto WHERE id=?');
  $stmtDB->bind_param("i",$id);
  $stmtDB->execute();
  $queryDB = $stmtDB->get_result();
}

header('Location: ../modify.php');

 ?>
