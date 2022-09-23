<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-list-eye"></i> Mis alertas.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <p>Aquí encontrarás las alertas que realizaste.</p>
                        <br>
                        <table id="datatable" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Departamento</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>F. Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($historial->result() as $row)
                        {
                    ?>
                    <tr>
                    <td><?php echo $row->nombreDepartamento; ?></td>
                    <td><?php echo $row->latitud; ?></td>
                    <td><?php echo $row->longitud; ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    </tr>
                    <?php 
                        } 
                    ?>
                </tbody>
            </table>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

