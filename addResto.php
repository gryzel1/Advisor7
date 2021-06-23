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

$queryID = $db->query("SELECT MAX(id) FROM resto;");
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

if ($plat=="") {
  $plat="NULL";
}

if ($tel=="") {
  $tel=null;
}

$plat = str_replace (",", ".", $plat);
$tel = str_replace (" ", "", $tel);
$x = str_replace (",", ".", $x);
$y = str_replace (",", ".", $y);

if($commune&&$tel){
  $db->query('insert into resto values('.$id.',"'.$nom.'",'.$x.','.$y.',"'.$commune.'",'.$plat.',"'.$tel.'")');
}else if(!$commune&&$tel){
  $db->query('insert into resto values('.$id.',"'.$nom.'",'.$x.','.$y.',NULL,'.$plat.',"'.$tel.'")');
}elseif($commune&&!$tel){
  $db->query('insert into resto values('.$id.',"'.$nom.'",'.$x.','.$y.',"'.$commune.'",'.$plat.',NULL)');
}else{
  $db->query('insert into resto values('.$id.',"'.$nom.'",'.$x.','.$y.',NULL,'.$plat.',NULL)');
}

header('Location: index.php');

 ?>
