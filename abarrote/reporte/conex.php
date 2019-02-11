<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "12345678"; 
$basededatos = "bdhorariovilcanota";
// CREAMOS LA CONEXIÓN
$conexion= new mysqli($servidor, $usuario, $contrasena, $basededatos);
$conexion1=mysqli_connect($servidor,$usuario,$contrasena, $basededatos);
if (mysqli_connect_error())
{ 
    echo "CONEXIÓN FALLIDA...";
}
?>