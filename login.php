<?php
include_once("modelo/conexion.php");
$conexion = new conexion(); 
if($conexion->conectar()){
    echo "Conexión exitosa :D";
}
?>