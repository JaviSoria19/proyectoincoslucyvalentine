<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Actualizar marca.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('marca/index');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a marcas
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <p class="text-muted font-13 m-b-30">
                            Usted va a editar una marca de productos, por favor modifique el siguiente campo:
                        </p>
                        <?php            
                            foreach($infomarca->result() as $row)
                            {
                            echo form_open_multipart('marca/modificarbd');
                        ?>
                        <input type="hidden" name="idmarca" value="<?php echo $row->idMarca;?>">
                        <br>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="nombremarca">Marca:</label>
                            <div class="col-md-3">
                                <input type="text" name="nombremarca" value="<?php echo $row->nombreMarca;?>" class="form-control has-feedback-left">
                                <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombremarca'); ?>
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
         ¿Está seguro de realizar la modificación? Presione Modificar
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