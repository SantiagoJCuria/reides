<?php 

session_start();
error_reporting(0);
include '../db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
$fecha = date('d/m/Y');
if (isset($_POST['submit'])) {
	$id_socio = $_POST['id_socio'];
	$valor = ($_POST['valor']);
    $valor_num = floatval($_POST['valor_num']);
    $motivo = ($_POST['motivo']);
    $caracter = ($_POST['caracter']);
    $sql2 = "SELECT * FROM socios WHERE Id = $id_socio";
	$id = mysqli_query($conn, $sql2);
    if ($id->num_rows > 0) {
		$row = mysqli_fetch_assoc($id);
        $nombre=$row['nombre'];
	} else {
        $nombre=$_POST['nombre'];
    }
    $sql = "INSERT into pagos (fecha, nombre, Id_Socio, valor, motivo, Caracter, val_num) values ('$fecha','$nombre','$id_socio','$valor','$motivo','$caracter', $valor_num)";
	$result = mysqli_query($conn, $sql);
    if($result)
    {
        header ("Location: historial_pagos.php");
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
if (isset($_POST['Nosocio'])) 
{
        $socio = $_POST['socio'];
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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body data-spy="scroll" data-offset="0" data-target="#navigation">
    <h3>Añadir Pago</h3>
    <form action="" method="POST">
        <input type="text" id="buscar" name="buscar" placeholder="Buscar Socio"></input>
        <button type="submit" id="busqueda" name="busqueda">Buscar</button></p>
    </form>
    <?php if($socio != "Nosocio") : ?> 
        No es socio?<a href="../socios/agregar_socio.php"> Agregar</a> O 
        <?php endif; ?>
        <form action="" method="POST">
        <input type="hidden" id="socio" name="socio"
        <?php if($socio != "Nosocio") : ?> value="Nosocio"  <?php endif; ?>
        <?php if($socio == "Nosocio") : ?> value="Socio"  <?php endif; ?>></input>
        <button type="submit" id="Nosocio" name="Nosocio">
            <?php if($socio != "Nosocio") : ?> Ingresar como No socio <?php endif; ?>
            <?php if($socio == "Nosocio") : ?> Ingresar como Socio <?php endif; ?>
        </button></p>
        </form>
        <form action="" method="POST">
      <h4>Seleccionar Caracter</h4>
             <input type="radio" id="ing" name="caracter" value="Ingreso"
             checked>
      <label for="Ingreso">Ingreso</label>
      <input type="radio" id="egr" name="caracter" value="Egreso">
      <label for="Egreso">Egreso</label>
      <?php if($socio != "Nosocio") : ?> 
            <h4>Seleccionar Socio</h4>
        <select id="id_socio" name="id_socio" required="true">
        <option value="">Seleccionar</option>
             <?php
             $sql= "SELECT * from socios";
             if (isset($_POST['busqueda'])) 
             {
                $busqueda = $_POST['buscar'];
                $sql .= " WHERE nombre LIKE '%$busqueda%'";
            }
            $resul_socios = mysqli_query($conn,$sql);
              if (mysqli_num_rows($resul_socios) > 0) 
              {
                  while($rowData = mysqli_fetch_array($resul_socios))
                    { ?>
                        <option value="<?php echo"".$rowData["Id"]."" ?> "> 
                        <?php echo "".$rowData["nombre"]."";?> </option>
                        
                        <?php 
                    //echo"".$rowData["nombre"]." </br>";
                    }
              }	
             ?>
        </select>
        <?php endif; ?>  <?php if($socio == "Nosocio") : ?> 
        <h4>Ingresar Nombre</h4>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre:"></input></p>
        <?php endif; ?>
        <h4>Ingresar Valor Numerico</h4>
        <input type="number" id="valor_num" name="valor_num" required="true" placeholder="Valor numerico" step=".01"></input></p>
        <h4>Ingresar Valor</h4>
        <input type="text" id="valor" name="valor" placeholder="Valor:"></input></p>
        <h4>Ingresar Motivo</h4>
        <input type="text" id="motivo" name="motivo" required="true" placeholder="Motivo"></input></p>
        <button type="submit" id="submit" name="submit">Agregar Pago</button></form>
        
    <?





    ?>
    <a href="../main.php">Salir</a>

    </body>
</html>