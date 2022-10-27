<?php
include 'ConectarBD.php';

if(!$conexion){
    echo "error de conexión";
}

try{
    $query="SELECT idDepartamento,nombreInstitucion,direccion,telefono
    FROM institucion
    WHERE estado=1
    ORDER BY idInstitucion DESC";

    $consulta=mysqli_query($conexion,$query);
    $servicios=[];
    $i=0;

    while($row=mysqli_fetch_assoc($consulta)){
        $servicios[$i]['idDepartamento']=$row['idDepartamento'];
        $servicios[$i]['nombreInstitucion']=$row['nombreInstitucion'];
        $servicios[$i]['direccion']=$row['direccion'];
        $servicios[$i]['telefono']=$row['telefono'];

        $i++;
    }
    echo json_encode($servicios);
}catch(\Throwable $th){
    var_dump($th);
}

?>