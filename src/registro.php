<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Registro de Administrador</title>
</head>
<body>

    <h1>REGISTRO DE USUARIO</h1>

    <div class="contenedor-formulario">
        <h2 class="titulo-form">Nueva Cuenta</h2>
        
        <form action="procesar_registro.php" method="POST">
            <label for="username" class="etiqueta-form">Elige un nombre de Usuario:</label>
            <input type="text" id="username" name="username" required class="entrada-form">

            <label for="password" class="etiqueta-form">Elige una Contraseña:</label>
            <input type="password" id="password" name="password" required class="entrada-form-pass">

            <button type="submit" class="btn-principal">Registrar Cuenta</button>
        </form>
        
        <br>
        
        <div class="contenedor-enlace">
            <form action="index.php" method="GET">
                <button type="submit" class="btn-secundario">Volver al inicio de sesión</button>
            </form>
        </div>
    </div>

</body>
</html>
