<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">CRUD de Usuarios</h2>
    <button class="btn btn-success mb-3" id="btnAgregar" data-bs-toggle="modal" data-bs-target="#usuarioModal">Agregar Usuario</button>
    <table class="table table-bordered" id="tablaUsuarios">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Fecha Nacimiento</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se agregan los usuarios dinámicamente -->
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="usuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formUsuario">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="usuarioModalLabel">Agregar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="usuarioIndex">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="fecha_nam" class="form-label">Fecha nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nam" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="./javascript/usuario.js"></script>
</body>
</html>