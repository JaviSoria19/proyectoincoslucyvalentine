<?php
$conexion = new mysqli(
    "localhost",
    "id19614392_username",
    "YVX=|A6=LxMrh<M#",
    "id19614392_bdviolencia"
);
if($conexion->connect_error){
    die("La conexión falló".$conexion->connect_error);
}
