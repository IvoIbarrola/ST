<?php
$host = 'db';
$dbname = 'st-db';
$username_db = 'usuario';
$password_db = 'contraseña';

$conn = new mysqli($host, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configuración de paginación
$registros_por_pagina = 10;
$pagina_actual = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta total de registros
$total_resultado = $conn->query("SELECT COUNT(*) AS total FROM ordenes_servicio");
$total_filas = $total_resultado->fetch_assoc()['total'];
$total_paginas = ceil($total_filas / $registros_por_pagina);

// Consulta paginada
$sql = "SELECT * FROM ordenes_servicio ORDER BY id DESC LIMIT $registros_por_pagina OFFSET $offset";
$result = $conn->query($sql);
?>

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

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h2>Órdenes de Servicio</h2>
                    <a href="agregar_dispositivos.html" class="btn btn-secondary">Agregar dispositivo</a>
                </div>

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
                                        <a href="detalle.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-sm btn-secondary">
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

                <!-- Paginador -->
                <?php if ($total_paginas > 1): ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                        <!-- Página anterior -->
                        <li class="page-item <?php if ($pagina_actual <= 1) echo 'disabled'; ?>">
                            <a class="page-link bg-light text-dark border-secondary" href="?pagina=<?php echo $pagina_actual - 1; ?>">Anterior</a>
                        </li>

                        <!-- Páginas numeradas -->
                        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                            <li class="page-item <?php if ($pagina_actual == $i) echo 'active'; ?>">
                                <a class="page-link <?php echo ($pagina_actual == $i) ? 'bg-secondary text-white border-secondary' : 'bg-light text-dark border-secondary'; ?>" href="?pagina=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Página siguiente -->
                        <li class="page-item <?php if ($pagina_actual >= $total_paginas) echo 'disabled'; ?>">
                            <a class="page-link bg-light text-dark border-secondary" href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente</a>
                        </li>
                    </ul>
                </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $conn->close(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" 
    crossorigin="anonymous">
</script>
</body>
</html>
