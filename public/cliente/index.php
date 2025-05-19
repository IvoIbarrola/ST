<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>ST - Seguimiento</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous"
    />
  </head>
  <body class="container-fluid text-center bg-light">
    <form class="m-5" action="" method="post">
      <h1>Seguimiento de dispositivos</h1>
      <input
        class="mt-5 form-control"
        type="text"
        name="search"
        placeholder="Ingrese ID de dispositivo, Correo electrónico o numero de telefono"
        required
      />
      <input class="btn" type="submit" value="Buscar" />
    </form>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $search = $_POST['search'];

        // Parámetros de conexión (asegúrese de que estas variables estén definidas correctamente)
        $host = 'db';
        $dbname = 'st-db';  // Nombre de la base de datos corregido
        $username_db = 'usuario';          // Defina esta variable correctamente
        $password_db = 'contraseña';       // Defina esta variable correctamente

        // Conexión a la base de datos
        $conn = new mysqli($host, $username_db, $password_db, $dbname);

        $sql = "SELECT * FROM ordenes_servicio WHERE id = '$search' OR dato_contacto = '$search'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<h5 class='card-header'>Orden de Servicio</h5>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>ID: " . htmlspecialchars($row['id']) . "</h5>";
                echo "<p class='card-text'>Cliente: " . htmlspecialchars($row['nombre_cliente']) . "</p>";
                echo "<p class='card-text'>Diagnostico: " . htmlspecialchars($row['diagnostico_tecnico']) . "</p>";
                echo "<p class='card-text'>Estado: " . htmlspecialchars($row['estado']) . "</p>";
                echo "<p class='card-text'>Fecha: " . htmlspecialchars($row['fecha_ingreso']) . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    }

    ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
