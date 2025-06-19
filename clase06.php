<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style2.css">
    <title>Mi primer PHP</title>
</head>
<body>
    <?php
    // Agregar un comentario en PHP 
    // Manejo de variables 
    $nombre= "Carlos";
    $edad = 30;
    $nota = 85.5;
    $aprobado= true;

    // Imprimir 
    echo "<h1>Hola, $nombre</h1>";
    print("Tu edad es: $edad años<br>");
    echo "<p>";
    // Condicionales
    if($edad >= 18){
        echo "Eres mayor de edad.";
    } else {
        echo "Eres menor de edad."; 
    }
    echo "</p>";
    ?>
</body>
</html>