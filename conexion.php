<?php
//Control de conexion a base de datos
//Activar reporte de errores
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$host = 'localhost';
$usuario = 'root';
$contrasenia = 'Jdcc7206.';
$base_datos = 'control_tareas';

//crear conexion
$mysqli = new mysqli($host,$usuario,$contrasenia,$base_datos);

$mysqli->set_charset('utf8mb4');


?>