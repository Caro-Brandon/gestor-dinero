<?php
$conexion = mysqli_connect("localhost","root","","gestor_gastos");
 
 if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
 
 
?>