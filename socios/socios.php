<?php 

session_start();
error_reporting(0);
include '../db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
if (isset($_POST['ordenar'])) {
    $orden = $_POST['orden'];
    $filtrar = ($_POST['filtrar']);
    echo"<script>console.log('".$filtrar." ".$orden."')</script>";
 }
 if (isset($_POST['busqueda'])) 
 {
  $_SESSION['$busqueda'] = $_POST['buscar'];
  $_SESSION['$nombre'] = $_POST['nombre'];
  $_SESSION['$id'] = $_POST['Id'];
  $_SESSION['$DNI'] = $_POST['DNI'];
  $_SESSION['$desde'] = $_POST['desde'];
  $_SESSION['$fecha'] = $_POST['fecha'];
  $_SESSION['$caracter'] = $_POST['Caracter'];
}
if (isset($_POST['borrar'])) 
{
 $_SESSION['$busqueda'] = "";
 $_SESSION['$nombre'] = "";
 $_SESSION['$id'] = "";
 $_SESSION['$DNI'] = "";
 $_SESSION['$desde'] = "";
 $_SESSION['$fecha'] = "";
 $_SESSION['$caracter'] = "";
}
$busqueda = $_SESSION['$busqueda'];
$nombre=$_SESSION['$nombre'];
$id=$_SESSION['$id'];
$DNI=$_SESSION['$DNI'];
$desde=$_SESSION['$desde'];
$fecha=$_SESSION['$fecha'];
$caracter=$_SESSION['$caracter'];
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
<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="Nombre">Por nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $nombre ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="Id">N° Socio:</label>
      <input type="text" class="form-control" id="Id" placeholder="N° Socio:" name="Id" value="<?php echo $id ?>">
    </div>
    <div class="form-group col-md-3">
    <label for="DNI">DNI</label>
    <input type="text" class="form-control" id="DNI" placeholder="DNI" name="DNI" value="<?php echo $DNI ?>">
  </div>
  <div class="form-group col-md-3">
    <label for="desde">Antigüedad</label>
    <input type="text" class="form-control" id="desde" placeholder="Antiguedad"name="desde" value="<?php echo $desde ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="fecha">Fecha Ultimo Pago:</label>
      <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Caracter</label>
      <input type="text" class="form-control" id="p.Caracter" name="Caracter" value="<?php echo $caracter ?>">
    </div>  
</div>
  <div class="form-group col-md-10">
  <button type="submit" id="busqueda" name="busqueda" class="btn btn-primary">Filtrar</button>
  <button type="submit" id="borrar" name="borrar" class="btn btn-primary">Borrar Filtro</button>
  </div>
</form>

<form action="" method="POST">
    <div class="form-group col-md-10">
      <h4>Ordenar Por:</h4>
      <input type="radio" id="Id"  name="filtrar" value="s.Id" checked>
      <label for="Ingreso">N° Socio</label>
      <input type="radio" id="s.nombre"  name="filtrar" value="s.nombre" <?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='s.nombre' ){echo "checked";}?> >
      <label for="Egreso">Nombre</label>
      <input type="radio" id="s.DNI"  name="filtrar" value="s.DNI"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='s.DNI' ){echo "checked";}?>>
      <label for="Ingreso">DNI</label>
      <input type="radio" id="desde"  name="filtrar" value="desde"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='desde' ){echo "checked";}?>>
      <label for="Egreso">Antigüedad</label>
      <input type="radio" id="p.val_num"  name="filtrar" value="p.val_num"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='p.val_num' ){echo "checked";}?> >
      <label for="Ingreso">Ultimo Pago</label>
      <input type="radio" id="fecha"  name="filtrar" value="fecha"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='fecha' ){echo "checked";}?>>
      <label for="Egreso">Fecha Ultimo Pago</label>
      <input type="radio" id="p.motivo"  name="filtrar" value="p.motivo"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='p.motivo' ){echo "checked";}?>>
      <label for="Ingreso">Motivo</label>
      <input type="radio" id="p.Caracter"  name="filtrar" value="p.Caracter"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='p.Caracter' ){echo "checked";}?>>
      <label for="Ingreso">Caracter</label>
      <input type="hidden" id="orden" name="orden"
        <?php if ($orden != "DESC") : ?> value="DESC"  <?php endif; ?>
        <?php if ($orden == "DESC") : ?> value="ASC"  <?php endif; ?>></input>
    <button type="submit" class="btn btn-primary" name="ordenar">Ordenar</button>
    </div>
</form>

    

             <?php

             $sql= "SELECT s.Id, s.nombre, s.DNI, STR_TO_DATE(s.fecha, '%d/%m/%Y') as desde, STR_TO_DATE(p.fecha, '%d/%m/%Y') as fecha, p.val_num, p.motivo, p.Caracter FROM socios s JOIN pagos p ON s.Id = p.Id_Socio 
             WHERE p.fecha = (SELECT MAX(fecha) FROM pagos WHERE Id_socio = s.Id)";
               
               if ($nombre != '' || $id != '' ||$DNI != '' ||$desde != '' ||$fecha != '' ||$caracter != '') {
                $sql .= " AND s.nombre LIKE '%$nombre%' AND s.DNI LIKE '%$DNI%' 
                AND s.fecha LIKE '%$desde%' AND p.fecha LIKE '%$fecha%' AND p.Caracter LIKE '%$caracter%' AND s.Id LIKE '%$id%'";
               // $sql .= "    ";
               }


             $sql .="GROUP BY s.Id";
            if ($filtrar == "s.Id" || $filtrar == "s.DNI"|| $filtrar == "p.val_num" ) {
                $sql .= " ORDER BY $filtrar + 0";
            } else if ($filtrar == "s.nombre" || $filtrar == "desde"|| $filtrar == "fecha"|| $filtrar == "p.motivo"|| $filtrar == "p.Caracter" ){
                $sql .= " ORDER BY $filtrar";
            }

            $sql .= " $orden";             
            //echo $sql;
             $result = mysqli_query($conn,$sql);
            if ($result->num_rows > 0) {
                echo "<table class='table'><tr><th>   Id   </th><th>   Nombre   </th><th>   DNI   </th><th>   Socio desde  </th><th>   Ultimo pago  </th><th>   Fecha </th><th>   Motivo </th><th>   Caracter </th></tr>";
    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if($row["fecha"] <> 0){
                            $fechadate = date("d/m/Y", strtotime(str_replace('/', '-', $row["fecha"])));
                        } else {
                            $fechadate = "";
                        }
                        if($row["val_num"] <> 0){
                            $valor_numerico = $row["val_num"];
                        } else {
                            $valor_numerico = "";
                        }
                      echo "<tr><td>".$row["Id"]."</td><td><a href='./socio_detalle.php?data=".$row["Id"]."'>".$row["nombre"]."</a></td><td>".$row["DNI"]."</td><td>"
                      .date("d/m/Y", strtotime($row["desde"]))."</td><td>$"
                      .$valor_numerico."</td><td>".$fechadate."</td><td>".
                      $row["motivo"]."</td><td>".$row["Caracter"]."</td></tr>";
                }
                echo "</table>";
                    } else {
                  //echo "0 results";
                    }
              
?>
    <a href="../main.php">Salir</a>

    </body>
</html>