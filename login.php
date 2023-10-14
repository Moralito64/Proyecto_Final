<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: leo.php");
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y registro</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    
    <main>

        <!--Creamos un contenedor o div que tenga todo lo que vamos agregar, en este caso, mas divisiones-->

        <div class="contenedor__todo">

            <!--Creamos la parte donde nos indica que hacer, indica el login o el registrer-->

            <div class="caja_trasera">

                <div class="caja_trasera-login">
                    
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>

                </div>

                <div class="caja_trasera-registrer">
                    
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate para iniciar sesión</p>
                    <button id="btn__registrarse">Registrate</button>

                </div>

            </div>

            
            <!--Aqui creamos el fomulario de Login y Registrer-->

            <div class="contenedor__login-register">

                <!--LOGIN-->

                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">

                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo electronico" name="correo"> 
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Entrar</button>

                </form>

                <!--REGISTRER-->

                <form id="registroForm" action="php/registro_usuario_be.php" method="POST" class="formulario__register">

                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name = "nombre_completo">
                    <input id="correo" type="text" placeholder="Correo electronico" name = "correo">
                    <input type="text" placeholder="Usuario" name = "usuario">
                    <input id="contrasena" type="password" placeholder="Contraseña" name = "contrasena">
                    <button>Registrarse</button>

                </form>

                <!--Validar correo electrónico y contraseña de mas de 5 caracteres-->

                <script>
                document.getElementById('registroForm').addEventListener('submit', function (event) {
                const correoInput = document.getElementById('correo');
                const correoValue = correoInput.value;
                const contrasenaInput = document.getElementById('contrasena');
                const contrasenaValue = contrasenaInput.value;

                if (!isValidEmail(correoValue)) {
                alert('Por favor, ingrese un correo electrónico válido que termine en @gmail.com u otra dirección válida.');
                event.preventDefault(); // Evitar que se envíe el formulario si el correo no es válido
                }
                

                if (contrasenaValue.length <= 5) {
                alert('La contraseña debe tener más de 5 caracteres.');
                event.preventDefault(); // Evitar que se envíe el formulario si la contraseña no es válida
                }
                });

                function isValidEmail(email) {
                // Patrón para verificar que el correo termine en @gmail.com o cualquier otra dirección válida
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                return emailPattern.test(email);
                }
                </script>

            </div>

        </div>

    </main>

    <script src="assets/js/script.js"></script>

</body>
</html>