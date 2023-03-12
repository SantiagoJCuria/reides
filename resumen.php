<?php 

session_start();
error_reporting(0);
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
$fecha = date('d/m/Y');
if (isset($_POST['fecha'])) {
  if (strlen(trim($_POST['dia'])) == 10) {
    $fecha = $_POST['dia'];
    $month = "";
    $mes = "";
    $time = "";
  }
  else {
    echo "<script>alert('El formato de la fecha es erroneo')</script>";
  }
}
if (isset($_POST['mes'])) {
    $month = $_POST['month'];
    $time=strtotime($month);
    $mes=date("m/Y",$time);
}
if ($mes != "") {
  $query= "SELECT
  SUM(CASE WHEN Caracter = 'Ingreso' THEN val_num ELSE 0 END) AS ingresos,
  SUM(CASE WHEN Caracter = 'Egreso' THEN val_num ELSE 0 END) AS egresos
FROM pagos WHERE fecha LIKE '%$mes%' ORDER BY Caracter";
}else{
$query= "SELECT
  SUM(CASE WHEN Caracter = 'Ingreso' THEN val_num ELSE 0 END) AS ingresos,
  SUM(CASE WHEN Caracter = 'Egreso' THEN val_num ELSE 0 END) AS egresos
FROM pagos WHERE fecha ='$fecha' ORDER BY Caracter";
}
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $balance = $row['ingresos'] - $row['egresos'];
    $ingresos = $row['ingresos'] + 0;
    $egresos = $row['egresos'] + 0;
  } else {
    echo "No se encontraron datos";
  }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Main</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body data-spy="scroll" data-offset="0" data-target="#navigation">
    <p>Ingresos: $<?=$ingresos?></br></p>
    <p>Egresos: $<?=$egresos?></br></p>
    <p>Balance: $<?=$balance?></br></p>

        <form action="" method="POST">
          <label for="dia">Balance por fecha (dd/mm/aaaa)</label></br>
            <input type="text" name="dia" value="<?= $fecha ?>" />
            <input type="submit" name="fecha" value="Balance en esa fecha" />
        </form>
        <form action="" method="POST">
          <label for="dia">Balance por mes </label></br>
            <input type="month" name="month" value="<?= $month ?>" />
            <input type="submit" name="mes" value="Balance en ese mes" />
        </form>

    <a href="../main.php">Salir</a>

    </body>
</html>