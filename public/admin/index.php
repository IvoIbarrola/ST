<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST - Administración</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" 
        crossorigin="anonymous"
    />
</head>
<body>

<?php
// Parámetros de conexión (asegúrese de que estas variables estén definidas correctamente)
$host = 'db';
$dbname = 'st-db';  // Nombre de la base de datos corregido
$username_db = 'usuario';          // Defina esta variable correctamente
$password_db = 'contraseña';       // Defina esta variable correctamente

// Conexión a la base de datos
$conn = new mysqli($host, $username_db, $password_db, $dbname);

// Verificación de la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta a la base de datos
$sql = "SELECT * FROM ordenes_servicio";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h2 class="mb-4">Órdenes de Servicio</h2>

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre cliente</th>
                <th scope="col">Dato de contacto</th>
                <th scope="col">Tipo de dispositivo</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Fecha de ingreso</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre_cliente']); ?></td>
                        <td><?php echo htmlspecialchars($row['dato_contacto']); ?></td>
                        <td><?php echo htmlspecialchars($row['tipo_dispositivo']); ?></td>
                        <td><?php echo htmlspecialchars($row['marca']); ?></td>
                        <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($row['fecha_ingreso']); ?></td>
                        <td><?php echo htmlspecialchars($row['estado']); ?></td>
                        <td>
                            <a href="detalle.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-sm btn-dark ">
                                Ver más
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">No hay dispositivos registrados.</td>
                </tr>
            <?php endif; ?>
            
        </tbody>
    </table>    
         
        <div class="text-center">
            <a href="agregar_dispositivos.html" class="btn btn-dark">Añadir Dispositivos</a>
         </div>

<?php
// Cierre de conexión
$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"></script>
</body>
</html>