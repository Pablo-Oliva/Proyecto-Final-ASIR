<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Acceso al Repositorio</title>
</head>
<body>

    <h1>REPOSITORIO DE COMANDOS</h1>

    <div class="contenedor-formulario">
        <h2 class="titulo-form">Iniciar Sesión</h2>
        
        <form action="procesar_login.php" method="POST">
            <label for="username" class="etiqueta-form">Usuario:</label>
            <input type="text" id="username" name="username" required class="entrada-form">

            <label for="password" class="etiqueta-form">Contraseña:</label>
            <input type="password" id="password" name="password" required class="entrada-form-pass">

            <button type="submit" class="btn-principal">Entrar</button>
        </form>
        
        <br>
        
        <div class="contenedor-enlace">
            <p class="texto-enlace">¿No tienes una cuenta en el sistema?</p>
            <form action="registro.php" method="GET">
                <button type="submit" class="btn-secundario">Registrarse</button>
            </form>
        </div>
    </div>

</body>
</html>
