<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Staff.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <div class="btn-group">
                                    <?php 
                                        echo form_open_multipart('usuarios/inicio');
                                    ?>
                                        <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-eye"></i> Usuarios no verificados
                                        </button>
                                    <?php 
                                        echo form_close();
                                    ?>
                                    ⠀<!--caracter en blanco-->
                                    <?php 
                                        echo form_open_multipart('usuarios/adminAgregar');
                                    ?>
                                        <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus-circle"></i> Insertar Usuario de Staff
                                        </button>
                                    <?php 
                                        echo form_close();
                                    ?>
                                    </div>
                                    
                                    <br><br>
                                    <p class="text-dark font-weight-bold font-13 m-b-30">
                                        Actualmente contamos con <?php echo $usuario->num_rows(); ?>
                                        usuarios activos que forman parte del staff!<br>
                                        Estimado administrador, recuerde verificar todas las medidas de seguridad de una Cédula de Identidad para validar a un usuario.
                                    </p>
                        <?php echo form_open_multipart('usuarios/adminVerStaff_filtro');?>
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
            <table id="datatable-buttons" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Foto</th>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Nro. C.I.</th>
                        <th>Nro. Celular</th>
                        <th>Género</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>F. Registro</th>
                        <th>F. Modificación</th>
                        <th>Estado</th>
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
                        <img src="<?php echo $row->foto;?>" height="35px" class="rounded mx-auto d-block gallery-item" alt="<?php echo $row->numeroCI; ?>">
                    </td>
                    <td><?php echo $row->nombreDepartamento; ?></td>
                    <td><?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->numeroCI; ?></td>
                    <td><?php echo $row->numeroCelular; ?></td>
                    <td><?php echo formatearGenero($row->sexo); ?></td>
                    <td><?php echo $row->correo; ?></td>
                    <td><?php echo ucfirst($row->rol); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaActualizacion); ?></td>
                    <td class="text-center"><?php echo formatearEstado($row->estado);?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo form_open_multipart('usuarios/modificar');?>
                            <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                            <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="fa fa-edit"></i>
                            </button>
                            <?php echo form_close();?>
                            <?php if ($row->estado=='1'): ?>
                                <button class="btn btn-outline-success" data-toggle="tooltip"  onclick="return confirm_modal_verificar(<?php echo $row->idUsuario; ?>)"  data-placement="top" title="Verificar">
                                <i class="fa fa-toggle-on"></i>
                                </button>
                            <?php else: ?>
                                <button class="btn btn-outline-warning" data-toggle="tooltip"  onclick="return confirm_modal_deshacer_verificar(<?php echo $row->idUsuario; ?>)"  data-placement="top" title="Quitar Verificado">
                                <i class="fa fa-toggle-off"></i>
                                </button>
                            <?php endif ?>
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
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

<!-- Modal -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-success">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de verificar este perfil? Presione Verificar.
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete" type="submit" class="btn btn-outline-success"><i class="fa fa-toggle-on"></i> Si, Verificar</a>
      </div>
    </div>
  </div>
</div>
<script>
     function confirm_modal_verificar(id) 
        {
            var url = '<?php echo base_url() . "index.php/usuarios/verificarstaffbd/"; ?>';
            $("#url-delete").attr('href', url + id);
            // jQuery('#confirmar').modal('show', {backdrop: 'static'});
            $('#modalConfirmacion').modal('show');
        } 
</script>

<!-- Modal -->
<div class="modal fade" id="modalDeshacer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-warning">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de quitar el atributo verificado de este perfil? Presione Confirmar.
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete-two" type="submit" class="btn btn-outline-warning"><i class="fa fa-toggle-off"></i> Si, Confirmar</a>
      </div>
    </div>
  </div>
</div>
<script>
     function confirm_modal_deshacer_verificar(id) 
        {
            var url = '<?php echo base_url() . "index.php/usuarios/undoverificarstaffbd/"; ?>';
            $("#url-delete-two").attr('href', url + id);
            $('#modalDeshacer').modal('show');
        } 
</script>

<div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">FOTO SUBIDA POR EL USUARIO:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
         <img src="<?php echo base_url();?>/uploads/user.png" class="modal-img rounded w-75">
      </div>
    </div>
  </div>
</div>