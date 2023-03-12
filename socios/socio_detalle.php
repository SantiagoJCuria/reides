<?php 

session_start();
error_reporting(0);
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
      $dni = ($row['DNI']);
      $id = ($row['Id']);
      $localidad = ($row['Localidad']);
      $provincia = ($row['Provincia']);
      $telefono = ($row['Telefono']);
      $celular = ($row['Celular']);
      $mail = ($row['Mail']);
      $domicilio = ($row['Domicilio']);
      $nacionalidad = ($row['Nacionalidad']);
      $nacimiento = ($row['Fecha_nacimiento']);
      $ecivil = ($row['Estado_Civil']);
      $profesion = ($row['Profesion']);
      $apellido_t = ($row['nombre_tutor']);
      $telefono_t = ($row['telefono_tutor']);
      $celular_t = ($row['celular_tutor']);
      $DNI_t = ($row['DNI_tutor']);
      $nacionalidad_t = ($row['nacionalidad_tutor']);
      $nacimiento_t = ($row['fecha_nac_tutor']);
      $ecivil_t = ($row['estado_tutor']);
      $profesion_t = ($row['profesion_tutor']);
      $_SESSION['$Qr'] =($row['qr']);
    }
}
if (isset($_POST['submit'])) {
	$nombre = ($_POST['nombre']);
    $dni = ($_POST['DNI']);
    $id = ($_POST['id']);
    $localidad = ($_POST['localidad']);
    $provincia = ($_POST['provincia']);
    $telefono = ($_POST['telefono']);
    $celular = ($_POST['celular']);
    $mail = ($_POST['mail']);
    $domicilio = ($_POST['domicilio']);
    $nacionalidad = ($_POST['nacionalidad']);
    $nacimiento = ($_POST['nacimiento']);
    $ecivil = ($_POST['ecivil']);
    $profesion = ($_POST['profesion']);
    $apellido_t = ($_POST['apellido-t']);
    $telefono_t = ($_POST['telefono-t']);
    $celular_t = ($_POST['celular-t']);
    $DNI_t = ($_POST['DNI-t']);
    $nacionalidad_t = ($_POST['nacionalidad-t']);
    $nacimiento_t = ($_POST['nacimiento-t']);
    $ecivil_t = ($_POST['ecivil-t']);
    $profesion_t = ($_POST['profesion-t']);
    $sql ="UPDATE socios SET 
    nombre = '$nombre', 
    fecha = '$fecha', 
    DNI = '$dni', 
    Domicilio = '$domicilio', 
    Localidad = '$localidad', 
    Provincia = '$provincia', 
    Telefono = '$telefono', 
    Celular = '$celular', 
    Mail = '$mail', 
    nacionalidad_tutor = '$nacionalidad_t', 
    Nacionalidad = '$nacionalidad', 
    Fecha_nacimiento = '$nacimiento', 
    Estado_Civil = '$ecivil', 
    Profesion = '$profesion', 
    nombre_tutor = '$apellido_t', 
    telefono_tutor = '$telefono_t', 
    estado_tutor = '$ecivil_t', 
    profesion_tutor = '$profesion_t', 
    DNI_tutor = '$DNI_t', 
    celular_tutor = '$celular_t', 
    fecha_nac_tutor = '$nacimiento_t' WHERE  Id = '$id' ";
     //"INSERT into socios (fecha, nombre, Id, DNI) values ('$fecha','$nombre','$id','$dni')";
	$result = mysqli_query($conn, $sql);
    if($result)
    {
        header ("Location: socios.php");
    }
    else {
        echo $sql;
    }   
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body data-spy="scroll" data-offset="0" data-target="#navigation" class="bg-primary row">
    <main class="container-sm border border-2 border-light rounded-4 bg-light bg-gradient shadow-lg p-3 col-11">
    <h3 class="h3 text-center mb-3">Añadir Socios</h3>
    <form action="" method="post" class="mb-3">
    <div class="mb-3 row">
    <label for="id" class="col-sm-1 col-form-label">N° de Socio</label>
    <div class="col-sm-11">
      <input type="text" readonly="readonly" class="form-control" id="id" name="id" require="true" value="<?=$id ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="nombre" class="col-sm-1 col-form-label">Nombre Completo</label>
    <div class="col-sm-11">
      <input type="Text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" require="true" value="<?=$nombre?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="domicilio" class="col-sm-1 col-form-label">Domicilio</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="domicilio" name="domicilio"  require="true" value="<?=$domicilio?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="localidad" class="col-sm-1 col-form-label">Localidad</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="localidad" name="localidad"  require="true" value="<?=$localidad?>">
    </div>
    <label for="provincia" class="col-sm-1 col-form-label">Provincia</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="provincia" name="provincia"  require="true" value="<?=$provincia?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="telefono" class="col-sm-1 col-form-label">Telefono</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="telefono" name="telefono"  require="true" value="<?=$telefono?>">
    </div>
    <label for="celular" class="col-sm-1 col-form-label">Celular</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="celular" name="celular"  require="true" value="<?=$celular?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="mail" class="col-sm-1 col-form-label">Mail</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="mail" name="mail"  require="true" value="<?=$mail?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="DNI" class="col-sm-1 col-form-label">DNI</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="DNI" name="DNI"  require="true" value="<?=$dni?>">
    </div>
    <label for="nacionalidad" class="col-sm-1 col-form-label">Nacionalidad</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"  require="true" value="<?=$nacionalidad?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="nacimiento" class="col-sm-1 col-form-label">Fecha de nacimiento</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="nacimiento" name="nacimiento"  require="true" value="<?=$nacimiento?>">
    </div>
    <label for="ecivil" class="col-sm-1 col-form-label">Estado civil</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="ecivil" name="ecivil"  require="true" value="<?=$ecivil?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="profesion" class="col-sm-1 col-form-label">Profesion</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="profesion" name="profesion"  require="true" value="<?=$profesion?>">
    </div>
</div>
<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" value="" id="aceptar">
  <label class="form-check-label" for="aceptar">
    Acepto ingresar como socio
  </label>
</div>

<hr class="border border-primary border opacity-50">

<h4 class="h5">Completar solo si el socio es menor de edad:</h4>
</div>
    <div class="mb-3 row">
    <label for="apellido-nombre" class="col-sm-1 col-form-label">Apellido y Nombre</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="apellido-t" name="apellido-t" placeholder="Apellido" value="<?=$apellido_t?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="telefono-t" class="col-sm-1 col-form-label">Telefono</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="telefono-t" name="telefono-t" value="<?=$telefono_t?>">
    </div>
    <label for="celular-t" class="col-sm-1 col-form-label">Celular</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="celular-t" name="celular-t" value="<?=$celular_t?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="DNI-t" class="col-sm-1 col-form-label">DNI</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="DNI-t" name="DNI-t" value="<?=$DNI_t?>">
    </div>
    <label for="nacionalidad-t" class="col-sm-1 col-form-label">Nacionalidad</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="nacionalidad-t" name="nacionalidad-t" value="<?=$nacionalidad_t?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="nacimiento-t" class="col-sm-1 col-form-label">Fecha de nacimiento</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="nacimiento-t" name="nacimiento-t" value="<?=$nacimiento_t?>">
    </div>
    <label for="ecivil-t" class="col-sm-1 col-form-label">Estado civil</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="ecivil-t" name="ecivil-t" value="<?=$ecivil_t?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="profesion-t" class="col-sm-1 col-form-label">Profesion</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="profesion-t" name="profesion-t" value="<?=$profesion_t?>">
    </div>
</div>
<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" value="" id="aceptar-t">
  <label class="form-check-label" for="aceptar">
    Acepto como tutor
  </label>
</div>
<button type="submit" id="submit" name="submit" class="btn btn-primary">Editar Socio</button>
  </form>
  <form action="eliminar_socio.php?data=<?php echo $id; ?>" method="post">
  <button type="submit" class="btn btn-primary">Eliminar socio</button>

  </form>
    <?



    if($result)
    {
        header ("Location: /socios.php");
    }   
        else
    {
        echo "Hubo un error";
    }
    ?>
    <a href="../main.php" class="btn btn-primary rounded"><img src="../volver.png" alt="atras" style="width:32px"></a>
    <a href="./qr.php" class="btn btn-primary rounded">Generar QR</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</main>
    </body>
</html>