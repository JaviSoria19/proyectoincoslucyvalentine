<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-eye"></i> Mis alertas.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <p class="font-weight-bold text-dark">Aquí encontrarás las alertas que realizaste desde la aplicación móvil, las alertas son un mecanismo de auxilio que permite a la mujer realizar simultáneamente las siguientes acciones:<br>
                        ● Envíar tú ubicación a una base de datos de la FELCV.<br>  
                        ● Mandar un mensaje SMS a un máximo de 5 contactos que hayas seleccionado previamente, el cual contiene tu ubicación del momento en que apretaste el botón de alerta y un texto de auxilio.<br>
                        ● Llamar al número de la Fuerza Especial de Lucha Contra la Violencia.
                        </p>
                        <br>
                        <?php if ($historial->num_rows()==0): ?>
                            <div class="alert alert-info text-light">
                                <h2 class="font-weight-bold">
                                    <i class="fa fa-inbox"></i> Vaya, al parecer no realizaste ninguna alerta en la aplicación móvil.</h2>
                            </div>
                        <?php endif ?>
                        <table id="datatable" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Departamento</th>
                        <th>Ubicación</th>
                        <th>F. Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $indice=1;
                        foreach ($historial->result() as $row)
                        {
                    ?>
                    <tr class="text-center">
                    <td><?php echo $row->nombreDepartamento; ?></td>
                    <td class="w-25" align="center"><div id="map<?php echo $indice; ?>" style="width: 320px; height:320px;"></div></td>
                    <td><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    </tr>
                    <?php 
                        $indice++;
                        } 
                    ?>
    <script type="text/javascript">
        function initMap() {
            <?php $indice=1; foreach ($historial->result() as $rowmaps){ ?>
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

