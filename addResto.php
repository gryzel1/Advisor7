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

$stmtID= $db->prepare("SELECT MAX(id) FROM resto");
$stmtID->execute();
$queryID = $stmtID->get_result();
$rowID = $queryID->fetch_assoc();
$id = $rowID['MAX(id)'];
$id++;

if(isset($_POST['nom'])){
  $nom = $_POST['nom'];
  $commune = $_POST['commune'];
  $plat = $_POST['plat'];
  $tel = $_POST['tel'];
  $x = $_POST['x'];
  $y = $_POST['y'];
}else {
  header('Location: index.php');
}

if ($commune=="") {
  $commune=null;
}

if ($tel=="") {
  $tel=null;
}

$plat = str_replace (",", ".", $plat);
$tel = str_replace (" ", "", $tel);
$x = str_replace (",", ".", $x);
$y = str_replace (",", ".", $y);

if($commune&&$tel){
  if($plat==""){
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,?,NULL,?,?)');
    $stmtDB->bind_param("ssddsss",$id,$nom,$x,$y,$commune,$tel,$_SESSION["cuid"]);
  }else{
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,?,?,?,?)');
    $stmtDB->bind_param("ssddsdss",$id,$nom,$x,$y,$commune,$plat,$tel,$_SESSION["cuid"]);
  }
  $stmtDB->execute();
  $queryDB = $stmtDB->get_result();
}else if(!$commune&&$tel){
  if($plat==""){
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,NULL,NULL,?,?)');
    $stmtDB->bind_param("ssddss",$id,$nom,$x,$y,$tel,$_SESSION["cuid"]);
  }else{
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,NULL,?,?,?)');
    $stmtDB->bind_param("ssdddss",$id,$nom,$x,$y,$plat,$tel,$_SESSION["cuid"]);
  }
  $stmtDB->execute();
  $queryDB = $stmtDB->get_result();
}elseif($commune&&!$tel){
  if($plat==""){
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,?,NULL,NULL,?)');
    $stmtDB->bind_param("ssddss",$id,$nom,$x,$y,$commune,$_SESSION["cuid"]);
  }else{
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,?,?,NULL,?)');
    $stmtDB->bind_param("ssddsds",$id,$nom,$x,$y,$commune,$plat,$_SESSION["cuid"]);
  }
  $stmtDB->execute();
  $queryDB = $stmtDB->get_result();
}else{
  if($plat==""){
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,NULL,NULL,NULL,?)');
    $stmtDB->bind_param("ssdds",$id,$nom,$x,$y,$_SESSION["cuid"]);
  }else{
    $stmtDB= $db->prepare('insert into resto values(?,?,?,?,NULL,?,NULL,?)');
    $stmtDB->bind_param("ssddds",$id,$nom,$x,$y,$plat,$_SESSION["cuid"]);
  }
  $stmtDB->execute();
  $queryDB = $stmtDB->get_result();
}

header('Location: index.php');

 ?>
