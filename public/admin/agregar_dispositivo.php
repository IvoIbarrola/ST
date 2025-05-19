<?php
$nombreCliente = $_POST['nombre_cliente'];
$contactoCliente = $_POST['dato_contacto'];
$tipoDispositivo = $_POST['tipo_dispositivo'];
$marcaDispositivo = $_POST['marca'];
$modeloDispositivo = $_POST['modelo'];
$descripcionDispositivo = $_POST['descripcion'];

// Conexión a la base de datos
$host = 'db';
$username_db = 'usuario';
$password_db = 'contraseña';
$dbname = 'st-db';

$conn = new mysqli($host, $username_db, $password_db, $dbname);
// Verificación de la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "INSERT INTO ordenes_servicio (nombre_cliente, dato_contacto, tipo_dispositivo, marca, modelo, descripcion) VALUES ('$nombreCliente', '$contactoCliente', '$tipoDispositivo', '$marcaDispositivo', '$modeloDispositivo', '$descripcionDispositivo')";
$result = $conn->query($sql);
if ($result) {
    ?>
    <script>
        window.location.href = "index.php";
    </script>
    <?php
}
$conn->close();
?>