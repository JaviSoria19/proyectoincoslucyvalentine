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
    if ($respuesta=='0'){
        return 'Nunca';
    }elseif ($respuesta=='1'){
        return 'A veces';
    }elseif ($respuesta=='2'){
        return 'Casi Siempre';
    }
}

function scriptGoogleMaps($i,$latitud,$longitud)
{
    echo '
    alerta'.$i.' = { lat: '.$latitud.', lng: '.$longitud.' };
    map'.$i.' = new google.maps.Map(document.getElementById("map'.$i.'"), {
        zoom: 15,
        center: alerta'.$i.',
        });
    marker'.$i.' = new google.maps.Marker({
        position: alerta'.$i.',
        map: map'.$i.',
        });
    ';
}

function scriptGoogleMapsAllIn_1($i,$latitud,$longitud)
{
    echo '
    alerta'.$i.' = { lat: '.$latitud.', lng: '.$longitud.' };
    ';
}
function scriptGoogleMapsAllIn_2($i,$latitud,$longitud)
{
    echo '
    marker'.$i.' = new google.maps.Marker({
        position: alerta'.$i.',
        map: map,
        });
    ';
}

function selectDenunciasEstado($estadoDenuncia)
{
    if ($estadoDenuncia=='Denuncia enviada') 
    {
        return '
            <option>Denuncia recibida</option>
            <option value = "Denuncia descartada">DESCARTAR DENUNCIA</option>
            <option disabled>Citada a brindar declaración</option>
            <option disabled>Denuncia en seguimiento</option>
            <option disabled>Denuncia finalizada</option>
            ';
    }
    elseif ($estadoDenuncia=='Denuncia recibida') 
    {
        return '
            <option>Citada a brindar declaración</option>
            <option disabled>Denuncia en seguimiento</option>
            <option disabled>Denuncia finalizada</option>
            ';
    }
    elseif ($estadoDenuncia=='Citada a brindar declaración') 
    {
        return '
            <option>Denuncia en seguimiento</option>
            <option disabled>Denuncia finalizada</option>
            ';    
    }elseif ($estadoDenuncia=='Denuncia en seguimiento') {
        return '
            <option>Denuncia finalizada</option>
            ';
    }
    else{
        return '
            <option disabled>La denuncia ha sido descartada</option>
        ';
    }
}
?>