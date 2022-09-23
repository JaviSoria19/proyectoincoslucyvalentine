<?php 

function formatearSoloFecha($fecha)
{
    /*2022-06-17 03:10:41*/
    if ($fecha) {
        $dia=substr($fecha,8,2);
        $mes=substr($fecha,5,2);
        $anio=substr($fecha,0,4);
        //$hora=substr($fecha,11,5);
        $fechaformateada=$dia.'/'.$mes.'/'.$anio;
        return $fechaformateada;
    }
    else{
        return '-';
    } 
}

function formatearSoloHora($fecha)//nota: si el valor es nulo saldrá error.
{
    /*2022-06-17 03:10:41*/
    if ($fecha) {
        $hora=substr($fecha,11,5);
        $fechaformateada=$hora;
        return $fechaformateada;
    }
    else{
        return '-';
    }
    
}

function formatearFechaMasHora($fecha)
{
    /*2022-06-17 03:10:41*/
    if ($fecha) {
        /*si el valor recibido tiene datos:*/
        $dia=substr($fecha,8,2);
        $mes=substr($fecha,5,2);
        $anio=substr($fecha,0,4);
        $hora=substr($fecha,11,5);
        $fechaformateada=$dia.'/'.$mes.'/'.$anio.' '.$hora;
        return $fechaformateada; 
    }
    else{
        /*caso contrario en que el valor recibido es NULL:*/
        return '-';
    }
}
function formatearGenero($genero)
{
    if ($genero=='M') 
    {
        return 'Masculino';
    }
    else{
        return 'Femenino';
    } 
}
function formatearEstado($estado)
{
    if ($estado=='1') 
    {
        return '<span class="badge badge-warning">No Verificado</span>';
    }
    elseif ($estado=='2') {
        return '<span class="badge badge-success">Verificado</span>';
    }else{
        return '<span class="badge badge-warning">Deshabilitado</span>';
    } 
}
function formatearVerificado($estado)
{
    if ($estado=='2') 
    {
        return '<i class="fa fa-check-circle" data-toggle="tooltip" data-placement="top" title="Perfil Verificado"></i>';
    }
}
function formatearRespuesta($respuesta)
{
    if ($respuesta=='1'){
        return 'Nunca';
    }elseif ($respuesta=='2'){
        return 'A veces';
    }elseif ($respuesta=='3'){
        return 'Casi Siempre';
    }
}

function alertaCIExistente(){
    echo '<script language="javascript">';
    echo 'alert("Estimado Usuario, ¡el número de carnet que ingresó ha sido registrado en sistema previamente!")';
    echo '</script>';
}
?>