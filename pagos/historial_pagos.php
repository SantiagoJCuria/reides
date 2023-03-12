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
    echo"<script>console.log('".$orden."')</script>";
 }
 if (isset($_POST['busqueda'])) 
 {
  $_SESSION['$busqueda'] = $_POST['buscar'];
  $_SESSION['$nombre'] = $_POST['nombre'];
  $_SESSION['$id'] = $_POST['Id'];
  $_SESSION['$valor'] = $_POST['valor'];
  $_SESSION['$motivo'] = $_POST['motivo'];
  $_SESSION['$fecha'] = $_POST['fechaformato'];
  $_SESSION['$caracter'] = $_POST['Caracter'];
}
if (isset($_POST['borrar'])) 
{
  $_SESSION['$busqueda'] = "";
  $_SESSION['$nombre'] = "";
  $_SESSION['$id'] = "";
  $_SESSION['$valor'] = "";
  $_SESSION['$motivo'] = "";
  $_SESSION['$fecha'] = "";
  $_SESSION['$caracter'] = "";
}
$busqueda = $_SESSION['$busqueda'];
$nombre=$_SESSION['$nombre'];
$id=$_SESSION['$id'];
$valor=$_SESSION['$valor'];
$motivo=$_SESSION['$motivo'];
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
      <input type="text" class="form-control" id="Id" placeholder="N° Socio:" name="Id"  value="<?php echo $id ?>" >
    </div>
    <div class="form-group col-md-3">
    <label for="Valor">Valor</label>
    <input type="text" class="form-control" id="Valor" placeholder="Valor" name="valor" value="<?php echo $valor ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="fechaformato">Fecha:</label>
      <input type="text" class="form-control" id="fechaformato" name="fechaformato" value="<?php echo $fecha ?>">
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="motivo">Motivo</label>
      <input type="text" class="form-control" id="motivo" name="motivo" value="<?php echo $motivo ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="Caracter">Caracter</label>
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
      <input type="radio" id="Id_Socio"  name="filtrar" value="Id_Socio" checked>
      <label for="Ingreso">N° Socio</label>
      <input type="radio" id="nombre"  name="filtrar" value="nombre" <?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='nombre' ){echo "checked";}?> >
      <label for="Egreso">Nombre</label>
      <input type="radio" id="valor"  name="filtrar" value="val_num"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='val_num' ){echo "checked";}?>>
      <label for="Ingreso">Valor</label>
      <input type="radio" id="fechaformato"  name="filtrar" value="fechaformato"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='fechaformato' ){echo "checked";}?>>
      <label for="Egreso">Fecha</label>
      <input type="radio" id="motivo"  name="filtrar" value="motivo"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='motivo' ){echo "checked";}?>>
      <label for="Ingreso">Motivo</label>
      <input type="radio" id="Caracter"  name="filtrar" value="Caracter"<?php if(isset($_POST['filtrar']) && $_POST['filtrar'] =='Caracter' ){echo "checked";}?>>
      <label for="Ingreso">Caracter</label>
      <input type="hidden" id="orden" name="orden"
        <?php if ($orden != "DESC") : ?> value="DESC"  <?php endif; ?>
        <?php if ($orden == "DESC") : ?> value="ASC"  <?php endif; ?>></input>
    <button type="submit" class="btn btn-primary" name="ordenar">Ordenar</button>
    </div>
</form>

    

             <?php
             $sql= "SELECT  Id, Id_Socio, STR_TO_DATE(fecha, '%d/%m/%Y') as fechaformato, nombre, val_num, motivo, Caracter from pagos WHERE val_num <> ''";
             $sqlxcel= "SELECT  * from pagos WHERE val_num <> ''";
             if ($nombre != '' || $id != '' ||$DNI != '' ||$desde != '' ||$fecha != '' ||$caracter != '') {
                $sql .= " AND Id_Socio LIKE '%$id%' AND nombre LIKE '%$nombre%' 
                AND fecha LIKE '%$fecha%'  AND Caracter LIKE '%$caracter%' AND motivo LIKE '%$motivo%'";
               // $sql .= "    ";
               $sqlxcel .= " AND Id_Socio LIKE '%$id%' AND nombre LIKE '%$nombre%' 
                AND fecha LIKE '%$fecha%'  AND Caracter LIKE '%$caracter%' AND motivo LIKE '%$motivo%'";
               }
             if ($filtrar == "Id_Socio" || $filtrar == "val_num" ) {
                $sql .= " ORDER BY $filtrar + 0";
                $sqlxcel .= " ORDER BY $filtrar + 0";
            } else if ($filtrar == "nombre" || $filtrar == "fechaformato"|| $filtrar == "motivo"|| $filtrar == "Caracter" ){
                $sql .= " ORDER BY $filtrar";
                $sqlxcel .= " ORDER BY $filtrar";
            }
            if (isset($filtrar)) {
                $sql .= " $orden";
                $sqlxcel .= " $orden"; 
            }
                //echo $sql;
             $result = mysqli_query($conn,$sql);
             $_SESSION['$excel_pagos'] = $sqlxcel;
            if ($result->num_rows > 0) {
                echo "<table class='table'><tr><th>   Num. Socio   </th><th>   Nombre   </th><th>   Valor   </th><th>   Fecha   </th><th>   Motivo   </th><th>   Caracter   </th><th>      </th></tr>";
    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if($row["fechaformato"] <> 0){    
                            //$fechadate = str_replace('/', '-', $row["fecha"]);
                            $fechadate = date("d/m/Y", strtotime(str_replace('/', '-', $row["fechaformato"])));
                        } else {
                            $fechadate = "";
                        }
                        if($row["val_num"] <> 0){
                            $valor_numerico = $row["val_num"];
                        } else {
                            $valor_numerico = "";
                        }
                     echo "<tr><td>".$row["Id_Socio"]."</td><td>".$row["nombre"]."</td><td>".$row["val_num"]."</td><td>".$fechadate."</td><td>".$row["motivo"]."</td><td>".$row["Caracter"]."</td><td><a href='../print_recibo.php?data=".$row["Id"]."'>Generar Recibo</a> </td></tr>";
                }
                echo "</table>";
                    } else {
                  echo "0 results";
                    }
              
?>
    <a href="../main.php">Salir</a>
    <a href="./exportar_pagos.php">Exportar a Excel</a>

    </body>
</html>