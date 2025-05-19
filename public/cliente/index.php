<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ST - Seguimiento</title>

  <!-- Bootstrap CSS -->
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
    <label class="mt-5" for="">Ingrese ID de dispositivo, Correo electrónico o número de teléfono:</label>
    <input
      class="form-control"
      type="text"
      name="search"
      placeholder="ID, Correo o Teléfono"
      required
    />
    <input class="btn btn-dark mt-3" type="submit" value="Buscar" />
  </form>

  <?php 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = $_POST['search'];

    // Parámetros de conexión
    $host = 'db';
    $dbname = 'st-db';
    $username_db = 'usuario';
    $password_db = 'contraseña';

    // Conexión a la base de datos
    $conn = new mysqli($host, $username_db, $password_db, $dbname);

    // Verificación de conexión
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL con medidas básicas de seguridad
    $search_escaped = $conn->real_escape_string($search);
    $sql = "SELECT * FROM ordenes_servicio 
            WHERE id = '$search_escaped' 
               OR dato_contacto = '$search_escaped'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3 mx-auto' style='max-width: 600px;'>";
        echo "  <h5 class='card-header'>Orden de Servicio</h5>";
        echo "  <div class='card-body'>";
        echo "    <h5 class='card-title'>ID: " . htmlspecialchars($row['id']) . "</h5>";
        echo "    <p class='card-text'>Cliente: " . htmlspecialchars($row['nombre_cliente']) . "</p>";
        echo "    <p class='card-text'>Diagnóstico: " . htmlspecialchars($row['diagnostico_tecnico']) . "</p>";
        echo "    <p class='card-text'>Estado: " . htmlspecialchars($row['estado']) . "</p>";
        echo "    <p class='card-text'>Fecha: " . htmlspecialchars($row['fecha_ingreso']) . "</p>";
        echo "nota: añadir fecha de entrega</p>";
        echo "  </div>";
        echo "</div>";
      }
    } else {
      echo "<p class='text-muted'>No se encontraron resultados.</p>";
    }

    $conn->close();
  }
  ?>

  <!-- Bootstrap JS -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"
  ></script>
</body>
</html>
