<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php

include_once '../db/conexion.php';

$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
    $stmt = $conn->prepare("SELECT * FROM ordenes_servicio WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();

        echo "<div class='container py-5'>";
        echo "  <div class='card border bg-light text-dark mx-auto' style='max-width: 720px;'>";
        echo "    <div class='card-header bg-secondary text-white'>";
        echo "      <h5 class='mb-0'>Orden de Servicio # " . htmlspecialchars($row['id']) . "</h5>";
        echo "    </div>";
        echo "    <div class='card-body'>";
        echo "      <div class='mb-3'><strong>Cliente:</strong> " . htmlspecialchars($row['nombre_cliente']) . "</div>";
        echo "      <div class='mb-3'><strong>Contacto:</strong> " . htmlspecialchars($row['dato_contacto']) . "</div>";
        echo "      <div class='mb-3'><strong>Tipo de dispositivo:</strong> " . htmlspecialchars($row['tipo_dispositivo']) . "</div>";
        echo "      <div class='mb-3'><strong>Marca:</strong> " . htmlspecialchars($row['marca']) . "</div>";
        echo "      <div class='mb-3'><strong>Modelo:</strong> " . htmlspecialchars($row['modelo']) . "</div>";
        echo "      <div class='mb-3'><strong>Diagnóstico técnico:</strong><br><span class='text-muted'>" . nl2br(htmlspecialchars($row['diagnostico_tecnico'])) . "</span></div>";
        echo "      <div class='mb-3'><strong>Técnico encargado:</strong> " . htmlspecialchars($row['tecnico_encargado']) . "</div>";
        echo "      <div class='mb-3'><strong>Estado:</strong> " . htmlspecialchars($row['estado']) . "</div>";
        echo "      <div class='mb-3'><strong>Fecha de ingreso:</strong> " . htmlspecialchars($row['fecha_ingreso']) . "</div>";
        echo "      <div class='mb-3'><strong>Fecha de entrega:</strong> " . htmlspecialchars($row['fecha_entrega']) . "</div>";

        echo "    </div>";
        echo "    <div class='card-footer text-end bg-white'>";
        echo "      <a href='actualizar_datos.php' class='btn btn-sm btn-outline-secondary'>Actualizar datos</a>";
        echo "      <a href='index.php' class='btn btn-sm btn-outline-secondary'>Volver al listado</a>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
    } else {
        echo "<div class='container py-5'>";
        echo "  <div class='alert alert-warning text-center'>No se encontró la orden de servicio solicitada.</div>";
        echo "</div>";
    }
} else {
    echo "<div class='container py-5'>";
    echo "  <div class='alert alert-danger text-center'>ID inválido o no proporcionado.</div>";
    echo "</div>";
}
?>