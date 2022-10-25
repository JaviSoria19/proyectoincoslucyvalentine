<?php
//$conexion =mysqli_connect('localhost','root','perez','bdviolencia');
include 'ConectarBD.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $idPublicacion=$_POST['idPublicacion'];
    $idUsuario=$_POST['idUsuario'];

    $consulta="INSERT INTO me_gusta (idMeGusta,idPublicacion,idUsuario) VALUES(NULL,'$idPublicacion','$idUsuario')";

    if(mysqli_query($conexion,$consulta)){
        echo "Se subio exitosamente";
    }else{
        echo "error";
    }

}


?>