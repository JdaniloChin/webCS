<?php 
session_start();

require_once("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fecha_nam = $_POST['fechanam'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['pass_confirm'];

    //Validar datos
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-danger'>Correo invalido</div>";
    }elseif($password !== $confirm) {
        echo "<div class='alert alert-danger'>Contraseñas no coinciden</div>";
    } else {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;

        $stmt = $mysqli->prepare("insert into usuarios (Nombre,Email,Fecha_Nacimiento,Contrasenia) Values (?,?,?,?)");

        $hash = password_hash($password,PASSWORD_DEFAULT);

        //s= string i=integer d=double/decmal b=blob (binario)
        $stmt->bind_param("ssss",$nombre,$email,$fecha_nam,$hash);
        $stmt->execute();

        if( $stmt->sqlstate == '00000'){
            echo "<div class='alert alert-success'>Usuario registrado correctamente</div>";
        }elseif ($stmt->sqlstate > 0){
             echo "<div class='alert alert-warning'>Advertencia al insertar " .$stmt->sqlstate. "</div>";
        }else {
            echo "<div class='alert alert-danger'>Error al insertar " .$stmt->sqlstate. "</div>";
        }
        $stmt->close();
        $mysqli->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <title>Formulario con post</title>
</head>
<body class="bg-light">
   <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg w-100" style="max-width: 400px">
            <h3 class="card-title text-center mb-4">Información de usuario</h3>
            <form id="registro" method="post">
                <div class=" mb-3">
                    <label class="form-label" for="nombre">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="fechanam">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fechanam" name="fechanam" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="password">Contraeña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class=" mb-3">
                    <label class="form-label" for="pass_confirm">Confirmar contraseña:</label>
                    <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form> 
        </div>
       
</body>
</html>