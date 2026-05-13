<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

include "conexion.php";
$user_id = $_SESSION["user_id"];

if (isset($_POST["id"]) && isset($_POST["titulo"])) {
    $id_editar = $_POST["id"];
    $titulo_nuevo = $_POST["titulo"];
    $cat_nueva = $_POST["categoria_id"];
    $cod_nuevo = $_POST["codigo"];

    $sql_update = "UPDATE comandos SET 
                   titulo = '$titulo_nuevo', 
                   categoria_id = $cat_nueva, 
                   codigo_comando = '$cod_nuevo' 
                   WHERE id = $id_editar AND user_id = $user_id";
    
    if (mysqli_query($conexion, $sql_update)) {
        header("Location: dashboard.php");
        exit;
    }
}

$id = 0;
$titulo = "";
$codigo_comando = "";
$categoria_id = 1;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql_busqueda = "SELECT titulo, codigo_comando, categoria_id 
                     FROM comandos 
                     WHERE id = " . $id . " AND user_id = " . $user_id;
    
    $resultado = mysqli_query($conexion, $sql_busqueda);
    if ($resultado && $registro = mysqli_fetch_assoc($resultado)) {
        $titulo = $registro["titulo"];
        $codigo_comando = $registro["codigo_comando"];
        $categoria_id = $registro["categoria_id"];
    }
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
    <title>Editar Comando</title>
</head>
<body>
    <h1> EDITAR COMANDO </h1>

    <div class="contenedor-formulario">
        <form action="editar_comando.php" method="post">
            <input type="hidden" name="id" value="<?php print($id); ?>">
            
            <label for="titulo" class="etiqueta-form">Título del Comando:</label>
            <input type="text" name="titulo" id="titulo" required value="<?php print($titulo); ?>" class="entrada-form">

            <label for="categoria_id" class="etiqueta-form">Categoría:</label>
            <select name="categoria_id" id="categoria_id" class="entrada-form">
                <?php
                while ($cat = mysqli_fetch_assoc($res_cats)) {
                    $seleccionado = ($cat["id"] == $categoria_id) ? "selected" : "";
                    print("<option value=\"" . $cat["id"] . "\" $seleccionado>" . $cat["nombre"] . "</option>\n");
                }
                ?>
            </select>

            <label for="codigo" class="etiqueta-form">Código del Script:</label>
            <textarea name="codigo" id="codigo" rows="5" required class="area-form"><?php print($codigo_comando); ?></textarea>

            <button type="submit" class="btn-principal">Guardar Cambios</button>
        </form>
        
        <form action="dashboard.php" method="get" class="form-sin-margen">
            <button type="submit" class="btn-secundario">Cancelar</button>
        </form>
    </div>
</body>
</html>
<?php mysqli_close($conexion); ?>
