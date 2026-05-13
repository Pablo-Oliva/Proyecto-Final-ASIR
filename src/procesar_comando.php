<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Procesando Comando</title>
</head>
<body>
    
    <h1>Procesando petición</h1>

    <div>
        <?php
        if (isset($_POST["titulo"]) && isset($_POST["codigo"])) {
            
            include "conexion.php"; 

            $titulo = $_POST["titulo"];
            $categoria_id = $_POST["categoria_id"];
            $codigo_comando = $_POST["codigo"];
            $user_id = $_SESSION["user_id"];

            $sentencia_insert = "INSERT INTO comandos (user_id, categoria_id, titulo, codigo_comando) 
                                 VALUES ($user_id, $categoria_id, '$titulo', '$codigo_comando')";

            $resultado_comando = mysqli_query($conexion, $sentencia_insert);

            if ($resultado_comando) {
                print("<h2>¡Comando guardado correctamente!</h2>\n");
            } else {
                print("<h2>Error al guardar el comando.</h2>\n");
            }

            mysqli_close($conexion);

        } else {
            print("<h2>No se han recibido los datos del formulario.</h2>\n");
        }
        ?>
        
        <br><br>
        
        <form action="nuevo_comando.php" method="GET">
            <button type="submit">Añadir otro comando</button>
        </form>
        
        <br>
        
        <form action="dashboard.php" method="GET">
            <button type="submit" class="btn-secundario">Volver al menú principal</button>
        </form>
    </div>

</body>
</html>
