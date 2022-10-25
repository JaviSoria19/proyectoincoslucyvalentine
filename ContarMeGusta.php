<?php


include 'ConectarBD.php';

$idPublicacion=$_GET['idPublicacion'];

$consulta="SELECT COUNT(idMeGusta) AS totalLikes FROM me_gusta WHERE idPublicacion =".$idPublicacion;

$resultado=$conexion->query($consulta);

while($fila=$resultado -> fetch_array()){
    $producto[] = array_map('utf8_encode',$fila);
}

echo json_encode($producto);
$resultado -> close();

?>