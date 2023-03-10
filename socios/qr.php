<?php 
include '../db.php';
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
require_once '../phpqrcode/qrlib.php';
$codeContents = $_SESSION['$Qr'];
QRcode::png($codeContents, '007_4.png', QR_ECLEVEL_L, 20);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Programa</title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
</head>
  <body class="fondo">
  <img style="position: absolute;left: 50%;top:  50%;transform: translate(-50%, -50%);" src="007_4.png"/>
 </body>
</html>
