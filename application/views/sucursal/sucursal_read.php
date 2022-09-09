<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-list"></i> Sucursales.
                        </h2>
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
                                        echo form_open_multipart('sucursal/agregar');
                                    ?>
                                        <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus-circle"></i> Insertar Sucursal
                                        </button>
                                    <?php 
                                        echo form_close();
                                    ?>
                                    <br>
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, las sucursales que usted está viendo a continuación se visualizarán al momento de realizar una compra o venta, si desea realizar un reporte, haga click en una de las siguientes opciones que está debajo:
                                    </p>

            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Sucursal</th>
                        <th>Dirección</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($sucursal->result() as $row)
                        {
                    ?>
                    <tr>
                    <td><?php echo $row->nombreSucursal; ?></td>
                    <td><?php echo $row->direccion; ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaActualizacion); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo form_open_multipart('sucursal/modificar');?>
                            <input type="hidden" name="idsucursal" value="<?php echo $row->idSucursal;?>">
                            <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="fa fa-edit"></i>
                            </button>
                            <?php echo form_close();?>
                            <input type="hidden" name="idsucursal" value="<?php echo $row->idSucursal;?>">
                            <button class="btn btn-outline-danger" data-toggle="tooltip"  onclick="return confirm_modalDeshabilitar(<?php echo $row->idSucursal; ?>)"  data-placement="top" title="Deshabilitar">
                            <i class="fa fa-toggle-off"></i>
                            </button>
                        </div>
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

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-list"></i> Lista de sucursales deshabilitadas.</h2>
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, las sucursales que usted está viendo a continuación ya no serán visibles cuando se desee crear una nueva cuenta.
                                    </p>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Sucursal</th>
                        <th>Dirección</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($sucursaldeshabilitados->result() as $rowdeshabilitados)
                        {
                    ?>
                    <tr>
                    <td><?php echo $rowdeshabilitados->nombreSucursal; ?></td>
                    <td><?php echo $rowdeshabilitados->direccion; ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($rowdeshabilitados->fechaRegistro); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($rowdeshabilitados->fechaActualizacion); ?></td>
                    <td class="text-center">
                            <?php echo form_open_multipart('sucursal/habilitarbd');?>
                                <input type="hidden"
                                name="idsucursal" 
                                value="<?php echo $rowdeshabilitados->idSucursal;?>">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

<!-- Modal -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de deshabilitarlo? Presione Deshabilitar
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete" type="submit" class="btn btn-outline-danger"><i class="fa fa-toggle-off"></i> Deshabilitar</a>
      </div>
    </div>
  </div>
</div>

<script>
     function confirm_modalDeshabilitar(id) 
        {
            var url = '<?php echo base_url() . "index.php/sucursal/deshabilitarbd/"; ?>';
            $("#url-delete").attr('href', url + id);
            // jQuery('#confirmar').modal('show', {backdrop: 'static'});
            $('#modalConfirmacion').modal('show');
        } 
</script>