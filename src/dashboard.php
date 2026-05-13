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
    <title>Mis Comandos</title>
</head>
<body>
    <h1> MIS COMANDOS GUARDADOS </h1>

    <?php
        include "conexion.php";
        $user_id = $_SESSION["user_id"];

        $sql = "SELECT comandos.id, comandos.titulo, categorias.nombre AS categoria, comandos.codigo_comando 
                FROM comandos 
                JOIN categorias ON comandos.categoria_id = categorias.id 
                WHERE comandos.user_id = " . $user_id;
                
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            while ($registro = mysqli_fetch_assoc($resultado)) {
                print("<div>\n");
                print("<table class=\"tabla-comandos\">\n");
                print("<tr>\n");
                
                // 1. IZQUIERDA: Título y Script
                print("<td class=\"celda-comando\">\n");
                print("<h2 class=\"titulo-comando\">".$registro["titulo"]."</h2>\n");
                print("<p class=\"caja-script\">\n");
                print("<span class=\"btn-copiar\" onclick=\"copiarHTTP('cmd_" . $registro["id"] . "')\">📋 Copiar</span>\n");
                print("<span id=\"cmd_" . $registro["id"] . "\" class=\"texto-script\">" . $registro["codigo_comando"] . "</span>\n");
                print("</p>\n");
                print("</td>\n");
                
                // 2. CENTRO: Categoría
                print("<td class=\"celda-categoria\">\n");
                print("<span> ".$registro["categoria"]." </span>\n");
                print("</td>\n");
                
                // 3. DERECHA: Botón Borrar
                print("<td class=\"celda-acciones\">\n");
                print("<form action=\"borrar_comando.php\" method=\"get\" onsubmit=\"return confirm('¿Estás seguro de que quieres borrar este comando?');\">\n");
                print("<input type=\"hidden\" name=\"id\" value=\"".$registro["id"]."\">\n");
                print("<input type=\"submit\" value=\"Borrar\" class=\"btn-borrar\">\n");
                print("</form>\n");
                print("</td>\n");

                // 4. DERECHA: Botón Editar
                print("<td class=\"celda-acciones\">\n");
                print("<form action=\"editar_comando.php\" method=\"get\">\n");
                print("<input type=\"hidden\" name=\"id\" value=\"".$registro["id"]."\">\n");
                print("<input type=\"submit\" value=\"Editar\">\n");
                print("</form>\n");
                print("</td>\n");

                print("</tr>\n");
                print("</table>\n");
                print("</div>\n");
            }
        } else {
            print("<div>\n");
            print("<h2> No hay comandos registrados </h2>\n");
            print("</div>\n");
        }

        mysqli_close($conexion);
    ?>

    <div>
        <form action="nuevo_comando.php" method="get">
            <input type="submit" value="Añadir Comando">
        </form>
        <br>
        <form action="index.php" method="get">
            <input type="submit" value="Cerrar Sesión">
        </form>
    </div>

    <div class="footer-ip">
	<p class="texto-ip">
            Instancia atendiendo la petición (IP Privada AWS): 
            <?php print($_SERVER['SERVER_ADDR']); ?>
        </p>
    </div>

    <script>
    function copiarHTTP(id) {
        var texto = document.getElementById(id).innerText;
        var elementoTemp = document.createElement("textarea");
        elementoTemp.value = texto;
        document.body.appendChild(elementoTemp);
        elementoTemp.select();
        document.execCommand("copy");
        document.body.removeChild(elementoTemp);
    }
    </script>
</body>
</html>
