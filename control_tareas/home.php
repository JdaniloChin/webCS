<?php 
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <title>Inicio</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row min-vh-100">
  <aside class="col-md-3 bg-dark text-white p-4">
        <h4 class="mb-4">Menú</h4>
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link text-white" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Usuarios</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Reportes</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Configuración</a></li>
        </ul>
        <form action="include/logout.php" method="post" class="mt-4">
          <button type="submit" class="btn btn-danger w-100">Cerrar sesión</button>
        </form>
      </aside>
      <main class="col-md-9 p-4">
    <?php
      echo "<H1 clasa='text-center'>Bienvenido - " . $_SESSION['nombre'] . "</H1>"; 
    ?>
    </main>
    </div>
  </div>
</body>
</html>