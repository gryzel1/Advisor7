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
  //header('Location: login.php');
}

if ($_SESSION["cuid"]=="test0000") {
  header('Location: index.php');
}

if(isset($_POST['oldPassword'])){
  $old = $_POST['oldPassword'];
  $new = $_POST['newPassword'];
  $repeat = $_POST['newPasswordRepeat'];
}else {
  header('Location: index.php');
}

$old = crypt(str_replace(" ", "", $old), '$6$rounds=5000$advisor7havethebestrestaurants$');
$new = crypt(str_replace(" ", "", $new), '$6$rounds=5000$advisor7havethebestrestaurants$');
$repeat = crypt(str_replace(" ", "", $repeat), '$6$rounds=5000$advisor7havethebestrestaurants$');

$stmtLogin = $db->prepare("SELECT * FROM user WHERE cuid LIKE ?");
$stmtLogin->bind_param("s",$_SESSION["cuid"]);
$stmtLogin->execute();
$queryLogin = $stmtLogin->get_result();

$rowLogin = $queryLogin->fetch_assoc();
$current = $rowLogin['motdepasse'];

echo $current."\n";
echo $old."\n";
echo $new."\n";
echo $repeat."\n";

if (hash_equals($old, $current) && hash_equals($repeat, $new)){
  $stmtDB= $db->prepare('UPDATE user SET motdepasse=? WHERE cuid LIKE ?');
  $stmtDB->bind_param("ss",$new,$_SESSION["cuid"]);
  $stmtDB->execute();
  $queryDB = $stmtDB->get_result();
  header('Location: modifyPassword.php?answer=success');
}else if (!hash_equals($old, $current)){
  header('Location: modifyPassword.php?answer=checkFailure');
}else if (!hash_equals($old, $new)){
  header('Location: modifyPassword.php?answer=repeatFailure');
}

 ?>
