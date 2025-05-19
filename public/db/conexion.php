<?php
// Parámetros de conexión
$host = 'db';
$dbname = 'st-db';
$username_db = 'usuario';
$password_db = 'contraseña';

// Conexión a la base de datos
$conn = new mysqli($host, $username_db, $password_db, $dbname);
?>