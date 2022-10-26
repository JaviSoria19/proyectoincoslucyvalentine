<?php
include 'ConectarBD.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $idUsuario=$_POST['idUsuario'];
    $idPublicacion=$_POST['idPublicacion'];
    $comentario=$_POST['comentario'];

    $consulta="INSERT INTO comentario (idUsuario,idPublicacion,comentario) VALUES('$idUsuario','$idPublicacion','$comentario')";

    if(mysqli_query($conexion,$consulta)){
        echo "Se subio exitosamente";
        mysqli_close($conexion);
    }else{
        echo "error";
    }

}


?>