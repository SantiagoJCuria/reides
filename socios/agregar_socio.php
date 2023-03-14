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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css">
    </head>
    <body class="fondo">
    <nav class="menu-lateral">
            <div class="icono">
                <i>
                    <svg class="icono-reidex" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500.000000 500.000000"
                        preserveAspectRatio="xMidYMid meet">

                        <g fill="#0d6efd"transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)"
                        fill="#000000" stroke="none">
                        <path d="M2295 4599 c-278 -32 -495 -95 -729 -211 -224 -112 -399 -241 -576
                        -424 -302 -314 -487 -682 -566 -1129 -25 -140 -25 -476 0 -630 113 -707 541
                        -1284 1176 -1589 297 -142 664 -218 982 -202 536 26 1029 244 1403 620 701
                        704 811 1791 267 2626 -338 519 -895 862 -1513 934 -141 17 -326 19 -444 5z
                        m474 -134 c566 -81 1071 -404 1384 -885 99 -152 143 -78 -337 -559 -384 -385
                        -417 -420 -407 -440 7 -11 19 -21 29 -21 9 0 200 183 424 407 224 224 409 405
                        411 403 2 -3 20 -43 40 -90 186 -445 207 -941 57 -1390 -21 -63 -51 -143 -67
                        -177 l-28 -61 -300 289 c-494 477 -521 502 -545 494 -53 -17 -30 -43 373 -431
                        215 -207 403 -387 415 -399 l24 -22 -48 -79 c-453 -754 -1333 -1117 -2189
                        -903 -168 42 -394 138 -544 232 -227 141 -456 364 -605 587 -216 324 -326 699
                        -326 1108 0 277 47 504 157 765 l46 107 321 0 c363 -1 476 -9 559 -40 138 -52
                        227 -173 248 -338 29 -222 -59 -402 -243 -499 -68 -35 -138 -102 -138 -131 0
                        -8 17 -30 39 -48 23 -20 87 -113 166 -241 304 -495 385 -569 645 -588 41 -3
                        92 -8 112 -10 31 -4 38 -2 43 17 4 13 196 212 427 444 351 352 419 425 416
                        445 -2 16 -11 25 -25 27 -18 3 -107 -82 -441 -419 l-418 -422 -49 29 c-98 56
                        -218 198 -401 474 -115 172 -238 370 -233 374 2 2 37 20 76 41 133 69 238 184
                        284 311 29 79 32 242 5 326 -37 121 -132 226 -256 282 -117 53 -180 59 -647
                        65 l-431 6 56 87 c182 277 446 515 742 667 218 111 405 172 632 205 128 19
                        418 19 547 1z"/>
                        <path d="M2410 3441 c-5 -11 -10 -22 -10 -25 0 -2 199 -196 442 -431 457 -440
                        479 -458 486 -394 3 23 -53 80 -435 448 -240 231 -445 421 -455 421 -9 0 -22
                        -9 -28 -19z"/>
                        <path d="M1164 2571 c-34 -21 -64 -75 -64 -115 0 -44 27 -94 62 -116 26 -17
                        45 -20 87 -17 47 3 59 9 87 40 45 48 52 94 25 151 -35 72 -128 99 -197 57z"/>
                        <path d="M3332 2538 c-7 -7 -12 -24 -12 -38 0 -34 17 -50 52 -50 18 0 33 8 44
                        25 15 23 15 27 0 50 -18 27 -63 34 -84 13z"/>
                        </g>
                        </svg>
                    </i>
            </div>
            <form action="../resumen.php" class="menu-lateral--form">
                <svg class="menu-lateral--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm64 192c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V160zM320 288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V320c0-17.7 14.3-32 32-32z"/></svg>
                <input type="submit" value="Resumen Diario" class="menu-lateral--btn"/>
            </form>
            <form action="../pagos/agregar_pago.php" class="menu-lateral--form">
                <svg class="menu-lateral--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM128 416H64V352c35.3 0 64 28.7 64 64zM64 224V160h64c0 35.3-28.7 64-64 64zM448 352c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM252 208c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z"/></svg>
                <input type="submit" value="Agregar Pago" class="menu-lateral--btn"/>
            </form>
            <form action="./socios.php" class="menu-lateral--form">
                <svg class="menu-lateral--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM228 104c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104z"/></svg>
                <input type="submit" value="Ver Socios" class="menu-lateral--btn"/>
            </form>
            <form action="../pagos/historial_pagos.php" class="menu-lateral--form">
                <svg class="menu-lateral--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM228 104c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104z"/></svg>
                <input type="submit" value="Ver Pagos" class="menu-lateral--btn"/>
            </form>
            <form action="./agregar_socio.php" class="menu-lateral--form">
            <svg class="menu-lateral--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                <input type="submit" value="Agregar Socios" class="menu-lateral--btn"/>
            </form>
            <a href="logout.php" class="menu-lateral--form menu-lateral--btn-out">Cerrar Sesión</a>
        </nav>
    <section class="principal">
    <div class="principal--add-pay">
    <div class="principal--titulo-pagina">
          <h3>Añadir Socio</h3>
    </div>
    <form action="" method="post" class="mb-3">
    <label for="id" class="form-label">N° de Socio</label>
      <input type="text" class="form-control input-dato" id="id" placeholder="N° Socio" name="id" require="true" value=<?=$valor_maximo?>>
  
    <label for="nombre" class="form-label">Nombre Completo</label>
    <input type="Text" class="form-control input-dato" id="nombre" name="nombre" placeholder="Nombre" require="true">
    
    <label for="domicilio" class="form-label">Domicilio</label>
    <input type="text" class="form-control input-dato" id="domicilio" placeholder="Domicilio" name="domicilio" require="true">

    <div class="formacion-doble">
      <div class="formacion-doble--elemento">
        <label for="localidad" class="form-label">Localidad</label>
        <input type="text" class="form-control input-dato" id="localidad" placeholder="Localidad" name="localidad" require="true">
      </div>
      <div class="formacion-doble--elemento">
        <label for="provincia" class="form-label">Provincia</label>
        <input type="text" class="form-control input-dato" id="provincia" placeholder="Provincia" name="provincia" require="true">
    </div>
    </div>
    
    <div class="formacion-doble">
      <div class="formacion-doble--elemento">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="text" class="form-control input-dato" id="telefono" placeholder="Telefono" name="telefono" require="true">
      </div>
      <div class="formacion-doble--elemento">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control input-dato" id="celular" placeholder="Celular" name="celular" require="true">
      </div>
    </div>
    
    <label for="mail" class="form-label">Mail</label>
    <input type="text" class="form-control input-dato" id="mail" placeholder="Mail" name="mail" require="true">

    <div class="formacion-doble">
      <div class="formacion-doble--elemento">
        <label for="DNI" class="form-label">DNI</label>
        <input type="text" class="form-control input-dato" id="DNI" placeholder="DNI" name="DNI" require="true">
      </div>
      <div class="formacion-doble--elemento">
        <label for="nacionalidad" class="form-label">Nacionalidad</label>
        <input type="text" class="form-control input-dato" id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" require="true">
      </div>
    </div>

    <label for="nacimiento" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control input-dato" id="nacimiento" name="nacimiento" require="true">
    
    <label for="ecivil" class="form-label">Estado civil</label>
    <input type="text" class="form-control input-dato" id="ecivil" placeholder="Estado Civil" name="ecivil" require="true">
    
    <label for="profesion" class="col-sm-1 col-form-label">Profesion</label>
    <input type="text" class="form-control input-dato" id="profesion" placeholder="Profesion" name="profesion" require="true">
  

  <input class="form-check-input" type="checkbox" value="" id="aceptar">
  <label class="form-check-label" for="aceptar">
    Acepto ingresar como socio
  </label>


<hr class="border border-primary border opacity-50">

<h4 class="h5">Completar solo si el socio es menor de edad:</h4>
    
    <label for="apellido-nombre" class="form-label">Apellido y Nombre</label>
    <input type="text" class="form-control input-dato" id="apellido-t" placeholder="Nombre y Apellido del tutor" name="apellido-t" placeholder="Apellido">

    <label for="telefono-t" class="form-label">Telefono</label>
    <input type="text" class="form-control input-dato" id="telefono-t" placeholder="Telefono del tutor" name="telefono-t">
  
    <label for="celular-t" class="form-label">Celular</label>
    <input type="text" class="form-control input-dato" id="celular-t" placeholder="Celular del tutor" name="celular-t">

    <label for="DNI-t" class="form-label">DNI</label>
    <input type="text" class="form-control input-dato" id="DNI-t" placeholder="DNI del tutor" name="DNI-t">
    
    <label for="nacionalidad-t" class="col-sm-1 col-form-label">Nacionalidad</label>
    <input type="text" class="form-control input-dato" id="nacionalidad-t" placeholder="Nacionalidad del tutor" name="nacionalidad-t">

    <label for="nacimiento-t" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control input-dato" id="nacimiento-t" name="nacimiento-t">

    <label for="ecivil-t" class="form-label">Estado civil</label>
    <input type="text" class="form-control input-dato" id="ecivil-t" placeholder="Estado civil del tutor" name="ecivil-t">
  
    <label for="profesion-t" class="form-label">Profesion</label>
    <input type="text" class="form-control input-dato" id="profesion-t" placeholder="Profesion del tutor" name="profesion-t">

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
  </div>
</section>
    </body>
</html>