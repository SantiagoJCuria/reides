<?php 

session_start();
error_reporting(0);
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$fecha = date('d/m/Y');
    if(isset($_GET["data"]))
    {
        $data = $_GET["data"];
        $sql2 = "SELECT * FROM pagos WHERE Id = '$data' ";
        $id = mysqli_query($conn, $sql2);
          if ($id->num_rows > 0) {
          $row = mysqli_fetch_assoc($id);
          $valor_num = $row['val_num'];
          $valor = $row['valor'];
          $nombre = $row['nombre'];
          $fecha = $row['fecha'];
          $motivo = $row['motivo'];
          $caracter = $row['Caracter'];
        }
    }


$year = date('Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Recibo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" type="text/css" href="style.scss" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  </head>
  <body data-spy="scroll" data-offset="0" data-target="#navigation">
  <?php if($caracter == 'Ingreso') : ?>
<div class="receipt-main">
  
  <p class="receipt-title">Recibo</p>
  
  <div class="receipt-section pull-left">
    <span class="receipt-label text-large">Número:</span>
    <span class="text-large"><?= $year ?>/<?= $row['Id'] ?></span>
  </div>
  
  <div class="pull-right receipt-section">
    <span class="text-large receipt-label">Pesos</span>
    <span class="text-large">$<?= $valor_num?>
    <?php if($valor != '') : ?>
    (<?= $valor?>)</span>
    <?php endif; ?>
  </div>
  
  <div class="clearfix"></div>
  
  <div class="receipt-section">
    <span class="receipt-label">De:</span>
    <span><?= $nombre ?></span>
  </div>
  
  <div class="receipt-section">
    <span class="receipt-label">Recibió:</span>
    <span>Club de barrio genérico</span>
  </div>
  
  <div class="receipt-section">
    <p>Recibí de <?= $nombre ?> la cantidad de <?= $valor_num?> 
    <?php if($valor != '') : ?>
    (<?= $valor?>) <?php endif; ?> pesos</p>
    
    <p>Referente a: <?= $motivo ?></p>
  </div>
  
  <div class="receipt-section">
    <p class="pull-right text-large">Buenos aires, <?= $fecha ?></p>
  </div>
  
  <div class="clearfix"></div>
  
  <div class="receipt-signature col-xs-6">
    <p class="receipt-line"></p>
    <p>Club genérico</p>
    <p>4321-9876</p>
    <p>Calle Blablabla, 3456 - Barrio de barrio</p>
    <p>Buenos aires - BA - 09889-349</p>
  </div>

  <div class="receipt-signature col-xs-6">
    <p class="receipt-line"></p>
    <p><?= $nombre ?></p>
    <p>.</p>
  </div>
<?php endif; ?>
<?php if($caracter == 'Egreso') : ?>
<div class="receipt-main">
  
  <p class="receipt-title">Recibo</p>
  
  <div class="receipt-section pull-left">
    <span class="receipt-label text-large">Número:</span>
    <span class="text-large"><?= $year ?>/<?= $row['Id'] ?></span>
  </div>
  
  <div class="pull-right receipt-section">
    <span class="text-large receipt-label">Pesos</span>
    <span class="text-large">$<?= $valor_num?> (<?= $valor?>)</span>
  </div>
  
  <div class="clearfix"></div>
  
  <div class="receipt-section">
    <span class="receipt-label">De:</span>
    <span>Club de barrio genérico</span>
  </div>
  
  <div class="receipt-section">
    <span class="receipt-label">Recibió:</span>
    <span><?= $nombre ?></span>
  </div>
  
  <div class="receipt-section">
    <p>El club genérico entregó a <?= $nombre ?> la cantidad de <?= $valor_num?> (<?= $valor?>) pesos.</p>
    <p>Referente a: <?= $motivo ?></p>
  </div>
  
  <div class="receipt-section">
    <p class="pull-right text-large">Buenos aires, <?= $fecha ?></p>
  </div>
  
  <div class="clearfix"></div>
  
  <div class="receipt-signature col-xs-6">
    <p class="receipt-line"></p>
    <p>Club genérico</p>
    <p>4321-9876</p>
    <p>Calle Blablabla, 3456 - Barrio de barrio</p>
    <p>Buenos aires - BA - 09889-349</p>
  </div>

  <div class="receipt-signature col-xs-6">
    <p class="receipt-line"></p>
    <p><?= $nombre ?></p>
    <p>.</p>
  </div>
<?php endif; ?>
</div><a href="../main.php">Salir</a>
</body>
</html>