<?php


include 'ConectarBD.php';

if(!$conexion){
    echo "error de conexión";
}

try{
    $query="SELECT idPublicacion,titulo,contenido,tipo,fotoPublicacion
    FROM publicacion ORDER BY fechaRegistro ASC";

    $consulta=mysqli_query($conexion,$query);
    $servicios=[];
    $i=0;

    while($row=mysqli_fetch_assoc($consulta)){
        $servicios[$i]['idPublicacion']=$row['idPublicacion'];
        $servicios[$i]['titulo']=$row['titulo'];
        $servicios[$i]['contenido']=nl2br($row['contenido']);
        $servicios[$i]['tipo']=$row['tipo'];
        $servicios[$i]['fotoPublicacion']=$row['fotoPublicacion'];

        $i++;
    }
    echo json_encode($servicios);
}catch(\Throwable $th){
    var_dump($th);
}

?>