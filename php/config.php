<?php
// Pone la zona horario por default
date_default_timezone_set('America/Mexico_City');

// Datos de accesso a la base de datos
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mired');
// /Datos de accesso a la base de datos

// Intenta conectarse a la base de datos
$db_link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($db_link === false) {
    die('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
} else {
    // echo 'Conexión a la base de datos satisfatoria.';
}
?>