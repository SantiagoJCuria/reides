<?php 

session_start();
//error_reporting(0);
include '../db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
if(isset($_GET["data"]))
{
    $data = $_GET["data"];
    $sql2 = "SELECT * FROM socios WHERE Id = '$data' ";
    $id = mysqli_query($conn, $sql2);
      if ($id->num_rows > 0) {
      $row = mysqli_fetch_assoc($id);
      $nombre = ($row['nombre']);
      $id = ($row['Id']);
    }
}
if (isset($_POST['submit'])) {
    echo"hola";
    $sql = "DELETE FROM socios WHERE Id = $id";
	$result = mysqli_query($conn, $sql);
    if($result)
    {
        header ("Location: ./socios.php");
    }   
    else
    {
        echo "Hubo un error";
    }

//    $sql2 = "SELECT * FROM pagos WHERE fecha='$fecha' AND nombre='$nombre' AND valor='$valor_num'AND motivo='$motivo'";
//	$id = mysqli_query($conn, $sql2);
//    if ($id->num_rows > 0) {
//		$row = mysqli_fetch_assoc($id); } else {echo "<script>alert('Hubo un error')</script>";header("Location: recibo.php");}
}
//    $sql2 = "SELECT * FROM pagos WHERE fecha='$fecha' AND nombre='$nombre' AND valor='$valor_num'AND motivo='$motivo'";
//	$id = mysqli_query($conn, $sql2);
//    if ($id->num_rows > 0) {
//		$row = mysqli_fetch_assoc($id); } else {echo "<script>alert('Hubo un error')</script>";header("Location: recibo.php");}
$frm = $_POST;
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Main</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    </head>
    <body>
        <h4>¿Segura/o que quiere eliminar a <?=$nombre?>, N° de socio <?=$id ?>? esta acción es permanente</h4>
        <form action="" method="post">
        <button type="submit" id="submit" name="submit">Si</button>
        </form>
        <form action='./socios.php'>
         <button type="submit">No</button>
        </form>
    </body>
</html>