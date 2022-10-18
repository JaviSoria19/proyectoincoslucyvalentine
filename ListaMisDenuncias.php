<?php

include 'ConectarBD.php';

if(!$conexion){
    echo "error de conexión";
}

try{

    $query="SELECT DE.idDenuncia,DC.descripcionCategoria,CONCAT(USU.nombres,' ',USU.primerApellido) AS nombres,DE.declaracion,(SELECT estado FROM proceso_denuncia WHERE idDenuncia = DE.idDenuncia ORDER BY idProceso DESC LIMIT 1) AS estado,DE.idUsuario,DATE_FORMAT(DE.fechaRegistro,'%d/%m/%Y') AS fechaRegistro,DE.foto
    FROM usuario USU
    INNER JOIN denuncia DE ON USU.idUsuario=DE.idUsuario
    INNER JOIN denuncia_categoria DC ON DC.idCategoria=DE.idcategoria
    WHERE DE.estado = 1";

    $consulta=mysqli_query($conexion,$query);
    $servicios=[];
    $i=0;

    while($row=mysqli_fetch_assoc($consulta)){
        $servicios[$i]['idDenuncia']=$row['idDenuncia'];
        $servicios[$i]['nombres']=$row['nombres'];
        $servicios[$i]['descripcionCategoria']=$row['descripcionCategoria'];
        $servicios[$i]['declaracion']=$row['declaracion'];
        $servicios[$i]['estado']=$row['estado'];
        $servicios[$i]['idUsuario']=$row['idUsuario'];
        $servicios[$i]['fechaRegistro']=$row['fechaRegistro'];
        $servicios[$i]['foto']=$row['foto'];

        $i++;
    }
    echo json_encode($servicios);
}catch(\Throwable $th){
    var_dump($th);
}

?>