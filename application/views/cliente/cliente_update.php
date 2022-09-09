<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Actualizar datos del cliente.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('cliente/index');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a clientes
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <br>
                        <p class="text-muted font-13 m-b-30">
                            Usted está por actualizar los datos de un cliente, por favor llene el siguiente campo:
                        </p>
                        <?php            
                            foreach($infocliente->result() as $row)
                            {
                            echo form_open_multipart('cliente/modificarbd');
                        ?>
                        <input type="hidden" name="idcliente" value="<?php echo $row->idCliente;?>">
                        <br>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="nombres">Nombres:</label>
                            <div class="col-md-3">
                                <input type="text" name="nombres" value="<?php echo $row->nombres;?>"
                                class="form-control has-feedback-left" required>
                                <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="primerapellido">Primer Ap:</label>
                            <div class="col-md-3">
                                <input type="text" name="primerapellido" value="<?php echo $row->primerApellido;?>"
                                class="form-control has-feedback-left" required>
                                <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="segundoapellido">Segundo Ap:</label>
                            <div class="col-md-3">
                                <input type="text" name="segundoapellido" value="<?php echo $row->segundoApellido;?>"
                                class="form-control has-feedback-left">
                                <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="numerocelular">Nro. Celular:</label>
                            <div class="col-md-3">
                                <input type="text" name="numerocelular" value="<?php echo $row->numeroCelular;?>" class="form-control has-feedback-left">
                                <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="numeroci">Nro. Carnet:</label>
                            <div class="col-md-3">
                                <input type="text" name="numeroci" value="<?php echo $row->numeroCI;?>" class="form-control has-feedback-left">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
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