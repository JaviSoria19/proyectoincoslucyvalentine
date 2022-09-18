<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Modificar perfil.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('usuarios/index');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a inicio
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <p class="font-13 m-b-30">
                            Actualizar datos personales:
                        </p>
                        <?php            
                            foreach($infousuario->result() as $row)
                            {
                            echo form_open_multipart('usuarios/modificarbd');
                        ?>
                        <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                        <br>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="iddepartamento">Ciudad Actual:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="iddepartamento" required>
                                    <option selected disabled value="">
                                        Ciudad Actual: <?php echo $row->nombreDepartamento;?> 
                                    </option>
                                    <?php
                                        foreach ($departamento->result() as $rowDep)
                                        {
                                    ?>
                                    <option value="<?php echo $rowDep->idDepartamento;?>">
                                        <?php echo $rowDep->nombreDepartamento;?>    
                                    </option>
                                    <?php        
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="nombres">Nombre(s):</label>
                            <div class="col-md-6">
                                <input type="text" name="nombres" class="form-control has-feedback-left"
                                value="<?php echo $row->nombres;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombres'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="primerapellido">Primer Apellido:</label>
                            <div class="col-md-6">
                                <input type="text" name="primerapellido" class="form-control has-feedback-left"
                                value="<?php echo $row->primerApellido;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('primerapellido'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="segundoapellido">Segundo Apellido (opcional):</label>
                            <div class="col-md-6">
                                <input type="text" name="segundoapellido" class="form-control has-feedback-left"
                                value="<?php echo $row->segundoApellido;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('segundoapellido'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="numerocelular">Nro. Celular:</label>
                            <div class="col-md-6">
                                <input type="text" name="numerocelular" class="form-control has-feedback-left"
                                value="<?php echo $row->numeroCelular;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('numerocelular'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="numeroci">Nro. Cédula de Identidad:</label>
                            <div class="col-md-6">
                                <input type="text" name="numeroci" class="form-control has-feedback-left"
                                value="<?php echo $row->numeroCI;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('numeroci'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="correo">Correo:</label>
                            <div class="col-md-6">
                                <input type="text" name="correo" class="form-control has-feedback-left"
                                value="<?php echo $row->correo;?>">
                                <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('correo'); ?>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalConfirmacion">
                            <i class="fa fa-edit"></i> Modificar
                        </button>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-warning">
        <h5 class="modal-title font-weight-bold">CONFIRMAR CAMBIOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de haber ingresado los datos correctamente? Presione Modificar
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Modificar</button>
      </div>
    </div>
  </div>
</div>

                        <?php
                            form_close();
                            }
                        ?>