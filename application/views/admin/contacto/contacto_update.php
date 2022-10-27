<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Modificar institución.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('institucion/inicio');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <p class="font-13 m-b-30">
                            Actualizar datos de la institución:
                        </p>
                        <?php            
                            foreach($infoinstitucion->result() as $row)
                            {
                            echo form_open_multipart('institucion/modificarbd');
                        ?>
                        <input type="hidden" name="idinstitucion" value="<?php echo $row->idInstitucion;?>">
                        <br>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="iddepartamento">Ciudad:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="iddepartamento" required>
                                    <option selected value="<?php echo $row->idDepartamento;?>">
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
                            <label class="col-form-label col-md-2 label-align" for="nombreinstitucion">Nombre de la institución:</label>
                            <div class="col-md-6">
                                <input type="text" name="nombreinstitucion" class="form-control has-feedback-left"
                                value="<?php echo $row->nombreInstitucion;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombreinstitucion'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="direccion">Dirección:</label>
                            <div class="col-md-6">
                                <input type="text" name="direccion" class="form-control has-feedback-left"
                                value="<?php echo $row->direccion;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('direccion'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="telefono">Teléfono:</label>
                            <div class="col-md-6">
                                <input type="text" name="telefono" class="form-control has-feedback-left"
                                value="<?php echo $row->telefono;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('telefono'); ?>
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