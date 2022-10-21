<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark rounded text-light"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-eye"></i> Alertas - Reportes.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <p class="font-weight-bold font-13 m-b-30">Estimado <?php echo formatearRol($this->session->userdata('rol')); ?>, aquí encontrará usted las alertas realizadas por todas las personas que están utilizando el sistema pero con la diferencia que los marcadores están centralizados en un solo mapa, el punto por defecto que usted está viendo es el centro de la ciudad de Cochabamba.</p>
                        <br>

                        <?php echo form_open_multipart('alerta/reportes_filtro');?>
                        <h2>Realizar una búsqueda por fechas</h2>
                        <div class="item form-group col-md-12">
                            <div class="col-md-2 form-group">
                                <label>Inicio</label>
                                <input type="date" name="date_inicio" class="form-control">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Fin</label>
                                <input type="date" name="date_fin" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <br>
                            <div class="col-md-2 form-group">
                                <label>Filtrar</label>
                                <button type="submit" class="btn btn-primary form-control">
                                 <i class="fa fa-search"></i> Buscar!</button>
                            </div>
                        </div>
                        <?php echo form_close();?>

                        <div class="col-md-12">
                            <div id="map_all_in" style="width: 100%; height:500px;"></div>
                        </div>
                        
    <script type="text/javascript">
        function initMapAllIn() {
            ciudadCochabamba = { lat: -17.3938600, lng: -66.1569445 };
            <?php $indice=1; foreach ($alertas->result() as $rowmaps){ ?>
            <?php echo scriptGoogleMapsAllIn_1($indice,$rowmaps->latitud,$rowmaps->longitud); ?>
            <?php $indice++; } ?>
            map = new google.maps.Map(document.getElementById("map_all_in"), {
            zoom: 13,
            center: ciudadCochabamba,
            });
            <?php $indice=1; foreach ($alertas->result() as $rowmaps){ ?>
            <?php echo scriptGoogleMapsAllIn_2($indice,$rowmaps->latitud,$rowmaps->longitud); ?>
            <?php $indice++; } ?>
        }
    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?
      key=AIzaSyAOig1CSGUk1nF4phMflhvb50RCX22KZl0&callback=initMapAllIn&v=weekly"
      defer>   
    </script>
                </tbody>
            </table>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

