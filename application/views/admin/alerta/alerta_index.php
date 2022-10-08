<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <title> | Alertas.</title>
                        <h2><i class="fa fa-eye"></i> Alertas.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <p class="text-dark font-weight-bold font-13 m-b-30">Estimado administrador, aquí encontrará usted las alertas realizadas por todas las personas que están utilizando el sistema, recuerde que es su responsabilidad considerar la veracidad de las alertas, o en un mal caso podrían ser solamente falsas.</p>
                        <br>

                        <?php echo form_open_multipart('alerta/inicio_filtro');?>
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
                        <h2>Registros de alertas.</h2>
                        <table id="datatable-buttons" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Departamento</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Nro. Celular</th>
                        <th>Mapa</th>
                        <th>F. Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $indice=1;
                        foreach ($alertas->result() as $row)
                        {
                    ?>
                    <tr class="text-center">
                    <td><?php echo $row->nombreDepartamento; ?></td>
                    <td><?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->correo; ?></td>
                    <td><?php echo $row->numeroCelular; ?></td>
                    <td class="w-25" align="center"><div id="map<?php echo $indice; ?>" style="width: 320px; height:320px;"></div></td>
                    
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    </tr>
                    <?php
                    $indice++; 
                        } 
                    ?>
    <script type="text/javascript">
        function initMap() {
            <?php $indice=1; foreach ($alertas->result() as $rowmaps){ ?>
                <?php echo scriptGoogleMaps($indice,$rowmaps->latitud,$rowmaps->longitud); ?>
            <?php $indice++; } ?>
        }
    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?
      key=AIzaSyAOig1CSGUk1nF4phMflhvb50RCX22KZl0&callback=initMap&v=weekly"
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

