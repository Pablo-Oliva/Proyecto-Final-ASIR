<?php
session_start();
include 'conexion.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $consulta = "SELECT id, username FROM usuarios WHERE username='$username' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 1) { 
        $registro = mysqli_fetch_assoc($resultado);
        
        $_SESSION['user_id'] = $registro['id'];
        $_SESSION['username'] = $registro['username'];
        
        header("Location: dashboard.php"); 
        exit;
    } else {
        print "<!DOCTYPE html><html lang='es'><head><link rel='stylesheet' href='estilo.css'></head><body>";
        print "<h1>Error</h1><div class='caja caja-centro'>";
        print "<h2>Usuario o contraseña incorrectos.</h2>";
        print "<br><a href='index.php'><button>Volver a intentar</button></a>";
        print "</div></body></html>";
    }
}
mysqli_close($conexion);
?>
