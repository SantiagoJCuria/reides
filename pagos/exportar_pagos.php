<?php 

session_start();
//error_reporting(0);
include '../db.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
$date = date("Y-m-d_H-i-s");
$filename = "Reporte_pagos_$date.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
if (!isset($_SESSION['$excel_pagos'])){
    $_SESSION['$excel_pagos'] = "SELECT * FROM pagos WHERE val_num <> ''";
};
$user_query = mysqli_query($conn, $_SESSION['$excel_pagos']);
// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        $headers = array('Id Pago','Fecha','Nombre','Numero de Socio','Valor','Valor Numerico','Motivo','Caracter');
        echo implode("\t", array_values($headers)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
$_SESSION['$excel_pagos'] = "";
exit();
?>