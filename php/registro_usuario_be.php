<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    //encriptamiento de contraseña
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) 
                    VALUE('$nombre_completo', '$correo', '$usuario', '$contrasena')";


    //Verificar que el correo no se repita en la bd


    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya está registrado, intenta con otro diferente");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }
   
            
            




    //Verificar que el usuario no se repita en la bd

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya está registrado, intenta con otro diferente");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }



    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../login.php";
            </script>
        ';
    }else{
        echo '
        alert("Intentalo de nuevo, usuario no almacenado");
        window.location = "../login.php";
        ';
    }


    mysqli_close($conexion);

?>