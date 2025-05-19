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
    <style>
        body {
            background-color: #f8f9fa;
        }
        h2 {
            font-weight: 500;
            color: #343a40;
        }
        .table thead th {
            background-color: #e9ecef;
            color: #495057;
        }
        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-primary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .card {
            border-radius: 8px;
        }
    </style>
</head>
<body>

<?php
$host = 'db';
$dbname = 'st-db';
$username_db = 'usuario';
$password_db = 'contraseña';

$conn = new mysqli($host, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM ordenes_servicio";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="mb-4 text-center">Órdenes de Servicio</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Contacto</th>
                            <th>Dispositivo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ingreso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-center"><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nombre_cliente']); ?></td>
                                    <td><?php echo htmlspecialchars($row['dato_contacto']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tipo_dispositivo']); ?></td>
                                    <td><?php echo htmlspecialchars($row['marca']); ?></td>
                                    <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                                    <td class="text-center"><?php echo htmlspecialchars($row['fecha_ingreso']); ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary"><?php echo htmlspecialchars($row['estado']); ?></span>
                                    </td>
                                    <td class="text-center">
                                        <a href="detalle.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-sm btn-primary">
                                            Ver más
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center text-muted">No hay dispositivos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $conn->close(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"></script>
</body>
</html>
