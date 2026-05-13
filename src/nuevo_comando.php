<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

include "conexion.php";

if (isset($_POST["nombre_nueva_cat"]) && $_POST["nombre_nueva_cat"] != "") {
    $nueva_cat = $_POST["nombre_nueva_cat"];
    $sql_ins_cat = "INSERT INTO categorias (nombre) VALUES ('$nueva_cat')";
    mysqli_query($conexion, $sql_ins_cat);
}

$sql_categorias = "SELECT * FROM categorias ORDER BY nombre ASC";
$res_cats = mysqli_query($conexion, $sql_categorias);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Añadir Comando</title>
</head>
<body>
    <h1> AÑADIR NUEVO COMANDO </h1>

    <div>
        <h2 class="titulo-form-sm"> ¿No está tu categoría? Añádela </h2>
        <form action="nuevo_comando.php" method="post">
            <label for="nombre_nueva_cat" class="etiqueta-form-centro">Nueva Categoría:</label>
            <input type="text" name="nombre_nueva_cat" id="nombre_nueva_cat" class="entrada-form">
            
            <input type="submit" value="Añadir">
        </form>
    </div>

    <div>
        <form action="procesar_comando.php" method="post">
            <label for="titulo" class="etiqueta-form-centro">Nombre del comando:</label>
            <input type="text" name="titulo" id="titulo" required class="entrada-form">

            <label for="categoria_id" class="etiqueta-form-centro">Categoría:</label>
            <select name="categoria_id" id="categoria_id" class="entrada-form">
                <?php
                while ($cat = mysqli_fetch_assoc($res_cats)) {
                    print("<option value=\"" . $cat["id"] . "\">" . $cat["nombre"] . "</option>\n");
                }
                ?>
            </select>

            <label for="codigo" class="etiqueta-form-centro">Código del script:</label>
            <textarea name="codigo" id="codigo" rows="5" required class="area-form"></textarea>

            <input type="submit" value="Guardar Comando">
        </form>
        <br>
        <form action="dashboard.php" method="get">
            <input type="submit" value="Volver al menú">
        </form>
    </div>
</body>
</html>
<?php mysqli_close($conexion); ?>
