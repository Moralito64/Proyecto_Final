<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo'
            <script>
                alert("Debes iniciar sesion");
                window.location = "login.php";
            </script>
        ';        
        session_destroy();
        die();
    }

    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dragon ball > one piece </title>
</head>
<body>
        <p> aqui va tu parte xd <p>
        <a href="php/cerrar_sesion.php">Cerrar Sesion</a>
</body>
</html>