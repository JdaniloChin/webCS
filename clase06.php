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
    $nota1 = 85.5;
    $nota2 = 60.4;
    $nota3 = 70.8;
    $nota4 = 40.3;

    $aprobado= true;

    // Imprimir 
    echo "<header>";
    echo "<h1>Hola, $nombre</h1>";
    print("Tu edad es: $edad años<br>");
    echo "</header>";
    echo "<section><p>";
    // Condicionales
    if($edad >= 18){
        echo "Eres mayor de edad.";
    } else {
        echo "Eres menor de edad."; 
    }
    echo "</p></section>";

    // Operadores aritméticos
    $suma =0;
    $arr_notas = array($nota1, $nota2, $nota3, $nota4);
    for($i =0; $i < count($arr_notas); $i++){
        $suma += $arr_notas[$i];
    }
    $promedio = 0;
    $promedio = $suma / count($arr_notas);

    if($promedio < 70){
        $aprobado = false;
    }
    echo "<section>";
    echo "<p>Tu promedio es: $promedio</p>";    
    if($aprobado){
        echo "<p>¡Felicidades! Has aprobado.</p>";
    } else {
        echo "<p>Lo siento, no has aprobado.</p>";
    }
    echo "</section>";
    ?>
</body>
</html>