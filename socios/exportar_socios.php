<?php 

session_start();
//error_reporting(0);
include '../db.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
$date = date("Y-m-d_H-i-s");
$filename = "Reporte_socios_$date.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
if (!isset($_SESSION['$excel_socios'])){
    $_SESSION['$excel_socios'] = "SELECT * FROM socios";
};
$user_query = mysqli_query($conn, $_SESSION['$excel_socios']);
// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($user_query)) {
    if (!$flag) {
        $headers = array('Numero de Socio','Nombre','Fecha de Socio','DNI','Domicilio','Localidad','Provincia','Telefono','Celular','Mail','Nacionalidad Tutor','Nacionalidad','Fecha Nacimiento','Estado Civil','Profesion','Nombre Tutor','Telefono Tutor','Estado Civil Tutor','Profesion Tutor','DNI Tutor','Celular Tutor','Fecha Nacimiento Tutor');
        echo implode("\t", array_values($headers)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
$_SESSION['$excel_socios'] = "";
exit();
?>