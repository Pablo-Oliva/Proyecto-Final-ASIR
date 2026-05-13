<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Procesando...</title>
</head>
<body>
    <h1>Procesando Registro</h1>
    <div class="caja caja-centro">
        <?php
        include 'conexion.php';

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $sql = "INSERT INTO usuarios (username, password) VALUES ('$user', '$pass')";
            
            if (mysqli_query($conexion, $sql)) { 
                print "<h2>¡Cuenta creada con éxito!</h2>";
                print "<br><a href='index.php'><button>Ir a Iniciar Sesión</button></a>";
            } else {
                print "<h2>Error al crear la cuenta en la BBDD.</h2>";
                print "<br><a href='registro.php'><button>Volver a intentar</button></a>";
            }
        }
        mysqli_close($conexion);
        ?>
    </div>
</body>
</html>
