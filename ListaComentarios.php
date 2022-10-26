<?php
include 'ConectarBD.php';

if(!$conexion){
    echo "error de conexión";
}

try{

    $query="SELECT CO.idComentario,CO.idUsuario,CO.idPublicacion,USU.correo,CO.comentario,DATE_FORMAT(CO.fechaRegistro,'%d/%m/%Y a las %r') AS fechaRegistro
    FROM comentario CO
    INNER JOIN usuario USU ON USU.idUsuario=CO.idUsuario
    ORDER BY CO.idComentario DESC";

    $consulta=mysqli_query($conexion,$query);
    $servicios=[];
    $i=0;

    while($row=mysqli_fetch_assoc($consulta)){
        $servicios[$i]['idComentario']=$row['idComentario'];
        $servicios[$i]['idUsuario']=$row['idUsuario'];
        $servicios[$i]['idPublicacion']=$row['idPublicacion'];
        $servicios[$i]['correo']=$row['correo'];
        $servicios[$i]['comentario']=$row['comentario'];
        $servicios[$i]['fechaRegistro']=$row['fechaRegistro'];

        $i++;
    }
    echo json_encode($servicios);
}catch(\Throwable $th){
    var_dump($th);
}

?>