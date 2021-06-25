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

if(isset($_POST['nom'])){
  $nom = $_POST['nom'];
  $commune = $_POST['commune'];
  $plat = $_POST['plat'];
  $tel = $_POST['tel'];
  $x = $_POST['x'];
  $y = $_POST['y'];
  $id = $_POST['id'];
}else {
  header('Location: modify.php');
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
  if ($commune=="") {
    $commune=null;
  }

  $plat = str_replace (",", ".", $plat);
  $tel = str_replace (" ", "", $tel);
  $x = str_replace (",", ".", $x);
  $y = str_replace (",", ".", $y);

  if($commune&&$tel){
    if($plat==""){
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=?,plat=NULL,tel=? where id like ?');
      $stmtDB->bind_param("sddssi",$nom,$x,$y,$commune,$tel,$id);
    }else{
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=?,plat=?,tel=? where id like ?');
      $stmtDB->bind_param("sddsdsi",$nom,$x,$y,$commune,$plat,$tel,$id);
    }
    $stmtDB->execute();
    $queryDB = $stmtDB->get_result();

  }else if(!$commune&&$tel){
    if($plat==""){
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=NULL,plat=NULL,tel=? where id like ?');
      $stmtDB->bind_param("sddsi",$nom,$x,$y,$tel,$id);
    }else{
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=NULL,plat=?,tel=? where id like ?');
      $stmtDB->bind_param("sdddsi",$nom,$x,$y,$plat,$tel,$id);
    }
    $stmtDB->execute();
    $queryDB = $stmtDB->get_result();

  }elseif($commune&&!$tel){
    if($plat==""){
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=?,plat=NULL,tel=NULL where id like ?');
      $stmtDB->bind_param("sddsi",$nom,$x,$y,$commune,$id);
    }else{
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=?,plat=?,tel=NULL where id like ?');
      $stmtDB->bind_param("sddsdi",$nom,$x,$y,$commune,$plat,$id);
    }
    $stmtDB->execute();
    $queryDB = $stmtDB->get_result();

  }else{
    if($plat==""){
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=NULL,plat=NULL,tel=NULL where id like ?');
      $stmtDB->bind_param("sddi",$nom,$x,$y,$id);
    }else{
      $stmtDB= $db->prepare('UPDATE resto set nom=?,x=?,y=?,commune=NULL,plat=?,tel=NULL where id like ?');
      $stmtDB->bind_param("sdddi",$nom,$x,$y,$plat,$id);
    }
    $stmtDB->execute();
    $queryDB = $stmtDB->get_result();

  }
}

header('Location: modify.php');

 ?>
