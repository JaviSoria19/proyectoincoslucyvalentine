<?php

//$conexion =mysqli_connect('localhost','root','perez','bdviolencia');
include 'ConectarBD.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    
$idUsuario=$_POST['idUsuario'];
$idCategoria=$_POST['idCategoria'];
$declaracion=$_POST['declaracion'];
$foto=$_POST['foto'];
$idUsuarioconcatenado= $idUsuario . date("_d_h_i_s");
$path="uploads/denuncia/$idUsuarioconcatenado.png";
$actualpath="https://luchacontralaviolencia.000webhostapp.com/$path";

$consulta="INSERT INTO denuncia (idUsuario,idCategoria,declaracion,foto) 
    VALUES('$idUsuario','$idCategoria','$declaracion','$actualpath')";
if(mysqli_query($conexion,$consulta)){
    file_put_contents($path, base64_decode($foto));
    $last_id = $conexion->insert_id;
    $consulta="INSERT INTO proceso_denuncia (idDenuncia,estado) VALUES('$last_id','Denuncia enviada')";
    if(mysqli_query($conexion,$consulta)){
    mysqli_close($conexion);
    }
}else{
    echo "error";
}


/*if($resultado){
    echo "registro correctamente";
}else{
    echo "error" ;
} */



}



?>

