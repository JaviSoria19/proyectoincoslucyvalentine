<?php
//$conexion =mysqli_connect('localhost','root','perez','bdviolencia');
include 'ConectarBD.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


$idUsuario=$_POST['idUsuario'];
$idNombre=$_POST['idNombre'];
$respuesta1=$_POST['respuesta1'];
$respuesta2=$_POST['respuesta2'];
$respuesta3=$_POST['respuesta3'];
$respuesta4=$_POST['respuesta4'];
$respuesta5=$_POST['respuesta5'];
$resultado=$_POST['resultado'];



$consulta="INSERT INTO test (idTest,idUsuario,idNombre,respuesta1,respuesta2,respuesta3,respuesta4,respuesta5,resultado) VALUES(NULL,'$idUsuario','$idNombre','$respuesta1','$respuesta2','$respuesta3','$respuesta4','$respuesta5','$resultado')";


if(mysqli_query($conexion,$consulta)){
    echo "Se subió exitosamente";
    mysqli_close($conexion);
}else{
    echo "Error";
}

}
