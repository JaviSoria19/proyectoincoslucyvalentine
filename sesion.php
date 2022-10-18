<?php
//$conexion =mysqli_connect('localhost','root','perez','bdviolencia');
include 'ConectarBD.php';

$json=array();
if(isset($_GET["correo"]) &&  isset($_GET["contrasenha"])){
    $correo=$_GET['correo'];
    $contrasenha=MD5($_GET['contrasenha']);

    $consulta="SELECT * FROM usuario WHERE correo='{$correo}' AND contrasenha='{$contrasenha}'";
    $resultado = mysqli_query($conexion,$consulta);

    if($consulta){
        if($reg=mysqli_fetch_array($resultado)){
            $result['idUsuario']=$reg['idUsuario'];
            $result['nombres']=$reg['nombres'];
            $result['primerApellido']=$reg['primerApellido'];
            $result['numeroCI']=$reg['numeroCI'];
            $result['foto']=($reg['foto']);
            $result['correo']=$reg['correo'];
            $json['datos'][]=$result;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }else{
        $results["nombres"]='';
        $json['datos'][]=$results;
        echo json_encode($json);
    }

}else{
    $results["nombres"]='';
        $json['datos'][]=$results;
        echo json_encode($json);
}
?>