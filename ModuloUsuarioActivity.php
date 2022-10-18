<?php
//$conexion =mysqli_connect('localhost','root','perez','bdviolencia');
include 'ConectarBD.php';

if($_SERVER['REQUEST_METHOD']=='POST'){


$idDepartamento=$_POST['idDepartamento'];
$nombres=$_POST['nombres'];
$primerApellido=$_POST['primerApellido'];
$segundoApellido=$_POST['segundoApellido'];
$telefono=$_POST['telefono'];
$ci=$_POST['ci'];
$sexo=$_POST['sexo'];
$contrasena=MD5($_POST['contrasena']);
$foto=$_POST['foto'];
$correo=$_POST['correo'];
$rol=$_POST['rol'];


$path="uploads/$ci.png";
$actualpath="https://luchacontralaviolencia.000webhostapp.com/$path";
/*$idDepartamento=2;
$nombres='Juana';
$primerApellido='Huanca';
$segundoApellido='Tola';
$telefono='63995652';
$ci='2345654';
$sexo='F';
$nombreUsuario='juana';
$contrasena='1234';
$correo='juana@gmail.com';
$rol='usuario';*/

$consulta="INSERT INTO usuario (idUsuario,idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,contrasenha,foto,correo,rol) VALUES(NULL,'$idDepartamento','$nombres','$primerApellido','$segundoApellido','$telefono','$ci','$sexo','$contrasena','$actualpath','$correo','$rol')";
/*$resultado =mysqli_query($conexion,$consulta);
mysqli_close($conexion);*/


if(mysqli_query($conexion,$consulta)){
    file_put_contents($path, base64_decode($foto));

    echo "Se subio exitosamente";
    mysqli_close($conexion);
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


