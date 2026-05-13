<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET["id"])) {
    include "conexion.php";
    $id = $_GET["id"];
    $user_id = $_SESSION["user_id"];

    $sql = "DELETE FROM comandos WHERE id = " . $id . " AND user_id = " . $user_id;
    mysqli_query($conexion, $sql);
    mysqli_close($conexion);
}

header("Location: dashboard.php");
exit;
?>
