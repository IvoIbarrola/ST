<?php

$search = $_POST['search'];

// Parámetros de conexión (asegúrese de que estas variables estén definidas correctamente)
$host = 'db';
$dbname = 'st-db';  // Nombre de la base de datos corregido
$username_db = 'usuario';          // Defina esta variable correctamente
$password_db = 'contraseña';       // Defina esta variable correctamente

// Conexión a la base de datos
$conn = new mysqli($host, $username_db, $password_db, $dbname);

$sql = "SELECT * FROM ordenes_servicio WHERE id = '$search'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<h5 class='card-header'>Orden de Servicio</h5>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>ID: " . $row['id'] . "</h5>";
        echo "<p class='card-text'>Cliente: " . $row['nombre_cliente'] . "</p>";
        echo "<p class='card-text'> Diagnostico: " . $row['diagnostico_tecnico'] . "</p>";
        echo "<p class='card-text'>Estado: " . $row['estado'] . "</p>";
        echo "<p class='card-text'>Fecha: " . $row['fecha_ingreso'] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No se encontraron resultados.";
}
?>