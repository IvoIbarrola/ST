<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Orden de Servicio</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
        crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="mb-4 text-center">Actualizar Orden de Servicio</h3>

                <form action="procesar_actualizacion.php" method="POST">
                    <!-- Cliente -->
                    <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="cliente" name="cliente" value="Sofía Díaz" required>
                    </div>

                    <!-- Contacto -->
                    <div class="mb-3">
                        <label for="contacto" class="form-label">Contacto</label>
                        <input type="email" class="form-control" id="contacto" name="contacto" value="sofiad@hotmail.com" required>
                    </div>

                    <!-- Tipo de dispositivo -->
                    <div class="mb-3">
                        <label for="tipo_dispositivo" class="form-label">Tipo de dispositivo</label>
                        <input type="text" class="form-control" id="tipo_dispositivo" name="tipo_dispositivo" value="PC de escritorio" required>
                    </div>

                    <!-- Marca y Modelo -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" value="ASUS" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" value="ROG Strix" required>
                        </div>
                    </div>

                    <!-- Diagnóstico técnico -->
                    <div class="mb-3">
                        <label for="diagnostico" class="form-label">Diagnóstico técnico</label>
                        <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" required>Fallo en tarjeta gráfica.</textarea>
                    </div>

                    <!-- Técnico encargado -->
                    <div class="mb-3">
                        <label for="tecnico" class="form-label">Técnico encargado</label>
                        <input type="text" class="form-control" id="tecnico" name="tecnico" value="Técnico C" required>
                    </div>

                    <!-- Estado -->
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="Pendiente" selected>Pendiente</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Finalizado">Finalizado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>

                    <!-- Fechas -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="2025-05-10" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha_entrega" class="form-label">Fecha de entrega</label>
                            <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" value="2025-05-15" required>
                        </div>
                    </div>

                    <!-- Botón de envío -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
        crossorigin="anonymous">
    </script>
</body>

</html>