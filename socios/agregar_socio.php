<?php 

session_start();
error_reporting(0);
include '../db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
$fecha = date('d/m/Y');
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
    $sql4 = "SELECT * FROM socios WHERE nombre = '$nombre' OR Id = '$id' OR DNI = '$dni'";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0) {
        echo "<script>alert('Ya Existe un Socio con ese nombre, DNI, o N° Socio')</script>";
    }
    else
    {
    $sql2 = "INSERT into pagos (nombre, Id_Socio) values ('$nombre','$id')";
	$result2 = mysqli_query($conn, $sql2);
    $sql ="INSERT INTO socios (Id, nombre, fecha, DNI, Domicilio, Localidad, Provincia, Telefono, 
    Celular, Mail, nacionalidad_tutor, Nacionalidad, Fecha_nacimiento, Estado_Civil, Profesion, 
    nombre_tutor, telefono_tutor, estado_tutor, profesion_tutor, DNI_tutor, celular_tutor, 
    fecha_nac_tutor) VALUES ('$id','$nombre','$fecha','$dni','$domicilio','$localidad',
    '$provincia','$telefono','$celular','$mail','$nacionalidad_t',' $nacionalidad','$nacimiento','$ecivil',
    '$profesion','$apellido_t','$telefono_t','$ecivil_t','$profesion_t','$DNI_t','$celular_t','$nacimiento_t')";
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
}
$sql3 = "SELECT MAX(Id) FROM socios";
$result3 = $conn->query($sql3);
if ($result3 && $result3->num_rows > 0) {
    // Obtiene el valor máximo
    $row3 = $result3->fetch_assoc();
    $valor_maximo = ($row3["MAX(Id)"])+1;
} else {
    echo "No se encontraron resultados";
}
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
      <input type="text" class="form-control" id="id" placeholder="N° Socio" name="id" require="true" value=<?=$valor_maximo?>>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="nombre" class="col-sm-1 col-form-label">Nombre Completo</label>
    <div class="col-sm-11">
      <input type="Text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" require="true">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="domicilio" class="col-sm-1 col-form-label">Domicilio</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="domicilio" placeholder="Domicilio" name="domicilio" require="true">
    </div>
</div>
<div class="mb-3 row">
    <label for="localidad" class="col-sm-1 col-form-label">Localidad</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="localidad" placeholder="Localidad" name="localidad" require="true">
    </div>
    <label for="provincia" class="col-sm-1 col-form-label">Provincia</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="provincia" placeholder="Provincia" name="provincia" require="true">
    </div>
</div>
<div class="mb-3 row">
    <label for="telefono" class="col-sm-1 col-form-label">Telefono</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono" require="true">
    </div>
    <label for="celular" class="col-sm-1 col-form-label">Celular</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" require="true">
    </div>
</div>
<div class="mb-3 row">
    <label for="mail" class="col-sm-1 col-form-label">Mail</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="mail" placeholder="Mail" name="mail" require="true">
    </div>
</div>
<div class="mb-3 row">
    <label for="DNI" class="col-sm-1 col-form-label">DNI</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="DNI" placeholder="DNI" name="DNI" require="true">
    </div>
    <label for="nacionalidad" class="col-sm-1 col-form-label">Nacionalidad</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" require="true">
    </div>
</div>
<div class="mb-3 row">
    <label for="nacimiento" class="col-sm-1 col-form-label">Fecha de nacimiento</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="nacimiento" name="nacimiento" require="true">
    </div>
    <label for="ecivil" class="col-sm-1 col-form-label">Estado civil</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="ecivil" placeholder="Estado Civil" name="ecivil" require="true">
    </div>
</div>
<div class="mb-3 row">
    <label for="profesion" class="col-sm-1 col-form-label">Profesion</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="profesion" placeholder="Profesion" name="profesion" require="true">
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
      <input type="text" class="form-control" id="apellido-t" placeholder="Nombre y Apellido del tutor" name="apellido-t" placeholder="Apellido">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="telefono-t" class="col-sm-1 col-form-label">Telefono</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="telefono-t" placeholder="Telefono del tutor" name="telefono-t">
    </div>
    <label for="celular-t" class="col-sm-1 col-form-label">Celular</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="celular-t" placeholder="Celular del tutor" name="celular-t">
    </div>
</div>
<div class="mb-3 row">
    <label for="DNI-t" class="col-sm-1 col-form-label">DNI</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="DNI-t" placeholder="DNI del tutor" name="DNI-t">
    </div>
    <label for="nacionalidad-t" class="col-sm-1 col-form-label">Nacionalidad</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="nacionalidad-t" placeholder="Nacionalidad del tutor" name="nacionalidad-t">
    </div>
</div>
<div class="mb-3 row">
    <label for="nacimiento-t" class="col-sm-1 col-form-label">Fecha de nacimiento</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="nacimiento-t" name="nacimiento-t">
    </div>
    <label for="ecivil-t" class="col-sm-1 col-form-label">Estado civil</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="ecivil-t" placeholder="Estado civil del tutor" name="ecivil-t">
    </div>
</div>
<div class="mb-3 row">
    <label for="profesion-t" class="col-sm-1 col-form-label">Profesion</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="profesion-t" placeholder="Profesion del tutor" name="profesion-t">
    </div>
</div>
<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" value="" id="aceptar-t">
  <label class="form-check-label" for="aceptar">
    Acepto como tutor
  </label>
</div>
    <button type="submit" id="submit" name="submit" class="btn btn-primary">Agregar Socio</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</main>
    </body>
</html>