<?php

include 'ConectarBD.php';
$correo=$_POST['correo'];
$contrasena=MD5($_POST['contrasena']);


/*
$correo="brenda.merida@gmail.com";
$contrasena="brenda123";
*/


$sentencia=$conexion->prepare("SELECT * FROM usuario WHERE correo=? AND contrasenha=? AND estado IN('1','2')");
$sentencia->bind_param('ss',$correo,$contrasena);
$sentencia->execute();

$resultado=$sentencia->get_result();
if($fila=$resultado->fetch_assoc()){
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}

$sentencia->close();
$conexion->close();

?>