<?php
//$conexion =mysqli_connect('localhost','root','perez','bdviolencia');
include 'ConectarBD.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $idUsuario=$_POST['idUsuario'];
    $latitud=$_POST['latitud'];
    $longitud=$_POST['longitud'];

    $consulta="INSERT INTO alerta (idUsuario,latitud,longitud) VALUES('$idUsuario','$latitud','$longitud')";

    if(mysqli_query($conexion,$consulta)){
        echo "La alerta se subió exitosamente";
    }else{
        echo "error";
    }

}


?>