<?php
$conexion = mysqli_connect("X.X.X.X", "user", "pass", "proyecto_asir");

if (!$conexion) {
    print "No se pudo conectar con la BD: " . mysqli_connect_error();
    exit; 
}
?>
