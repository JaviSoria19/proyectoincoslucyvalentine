<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12"><!-- Inicio Div col-md-12 col-sm-12 -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-suitcase"></i> Lista de empleados deshabilitados.</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <?php 
                                        echo form_open_multipart('empleado/index');
                                    ?>
                                    <button type="submit" name="buttonIndex" class="btn btn-outline-success">
                                    <i class="fa fa-arrow-circle-left"></i> Volver a empleados
                                    </button>
                                    <?php 
                                        echo form_close();
                                    ?>
                                    <br>
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, los empleados que usted está viendo a continuación ya no trabajan en el punto de venta.
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">  
  <thead>
    <tr class="text-center">
                                                <th>Nombre</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Nro. Celular</th>
                                                <th>Nro. Carnet</th>
                                                <th>Género</th>
                                                <th>Fecha de ingreso</th>
                                                <th>Modificado</th>
                                                <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($empleado->result() as $row)
    {
        ?>
            <tr>
                                                <td><?php echo $row->nombres; ?></td>
                                                <td><?php echo $row->primerApellido; ?></td>
                                                <td><?php echo $row->segundoApellido; ?></td>
                                                <td><?php echo $row->numeroCelular; ?></td>
                                                <td><?php echo $row->numeroCI; ?></td>
                                                <td><?php echo $row->sexo; ?></td>
                                                <td><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                                                <td><?php echo formatearFechaMasHora($row->fechaActualizacion); ?></td>

                <td class="text-center">
                    <?php echo form_open_multipart('empleado/habilitarbd');?>
                    <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado;?>">
                    <button class="btn btn-success">
                        <i class="fa fa-toggle-on"></i> Habilitar
                    </button>
                    <?php echo form_close();?>
                </td>
            </tr>
        <?php        
            }
        ?>

  </tbody>
</table>
        
                                </div><!-- Inicio Div card-box table-responsive -->
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->