<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Usuarios.</h2>
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
                                        echo form_open_multipart('usuarios/agregar');
                                    ?>
                                        <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus-circle"></i> Insertar Usuario
                                        </button>
                                    <?php 
                                        echo form_close();
                                    ?>
                                    <br>
                                    <p class="text-muted font-13 m-b-30">
                                        Actualmente hay <?php echo $usuario->num_rows(); ?>
                                        Usuarios<br>
                                        Estimado administrador, si un usuario se olvidó su contraseña usted puede modificarlo haciendo click en el botón "Editar" en la columna de "Acciones":
                                    </p>

            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Foto</th>
                        <th>Empleado</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Tipo</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($usuario->result() as $row)
                        {
                    ?>
                    <tr>
                    <td class="text-center">
                        <?php
                            $foto=$row->foto;
                            if($foto=="")
                            {
                        ?>
                        <i class="fa fa-image" data-toggle="tooltip" data-placement="top" title="Actualmente este usuario no cuenta con una imagen."></i>
                        <?php
                            }
                            else
                            {
                        ?>
                        <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" height="35px" class="mx-auto d-block">
                        <?php
                            }
                        ?>   
                    </td>
                    <td><?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->login; ?></td>
                    <td><?php echo $row->password; ?></td>
                    <td><?php echo ucfirst($row->tipo); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaActualizacion); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo form_open_multipart('usuarios/modificar');?>
                            <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                            <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="fa fa-edit"></i>
                            </button>
                            <?php echo form_close();?>
                            <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                            <button class="btn btn-outline-danger" data-toggle="tooltip"  onclick="return confirm_modalDeshabilitar(<?php echo $row->idUsuario; ?>)"  data-placement="top" title="Deshabilitar">
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
                        <h2><i class="fa fa-users"></i> Lista de usuarios deshabilitados.</h2>
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
                                        Estimado administrador, los usuarios que usted está viendo a continuación no podrán iniciar sesión si tratan de acceder al sistema.
                                    </p>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Foto</th>
                        <th>Sucursal</th>
                        <th>Empleado</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Tipo</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($usuariodeshabilitados->result() as $rowdeshabilitados)
                        {
                    ?>
                    <tr>
                    <td class="text-center">
                        <?php
                            $foto=$rowdeshabilitados->foto;
                            if($foto=="")
                            {
                        ?>
                        <i class="fa fa-image" data-toggle="tooltip" data-placement="top" title="Actualmente este producto no cuenta con una imagen."></i>
                        <?php
                            }
                            else
                            {
                        ?>
                        <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" height="35px" class="mx-auto d-block">
                        <?php
                            }
                        ?>   
                    </td>
                    <td><?php echo $rowdeshabilitados->nombreSucursal; ?></td>
                    <td><?php echo $rowdeshabilitados->nombres; ?> <?php echo $rowdeshabilitados->primerApellido; ?></td>
                    <td><?php echo $rowdeshabilitados->login; ?></td>
                    <td><?php echo $rowdeshabilitados->password; ?></td>
                    <td><?php echo $rowdeshabilitados->tipo; ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($rowdeshabilitados->fechaRegistro); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($rowdeshabilitados->fechaActualizacion); ?></td>
                    <td class="text-center">
                            <?php echo form_open_multipart('usuarios/habilitarbd');?>
                                <input type="hidden"
                                name="idusuario" 
                                value="<?php echo $rowdeshabilitados->idUsuario;?>">
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
            var url = '<?php echo base_url() . "index.php/usuarios/deshabilitarbd/"; ?>';
            $("#url-delete").attr('href', url + id);
            // jQuery('#confirmar').modal('show', {backdrop: 'static'});
            $('#modalConfirmacion').modal('show');
        } 
</script>