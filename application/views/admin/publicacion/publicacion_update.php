<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white rounded"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Actualizar publicación.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('publicacion/indexStaff');
                        ?>
                            <button type="submit" name="buttonIndexStaff" class="btn btn-outline-success">
                                <i class="fa fa-arrow-circle-left"></i> Volver a Publicaciones Oficiales.
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <?php            
                            foreach($infopublicacion->result() as $row)
                            {
                            echo form_open_multipart('publicacion/modificarbd');
                        ?>
                        <input type="hidden" name="idpublicacion" value="<?php echo $row->idPublicacion;?>">
                        <br>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="titulo">Título de la publicación:</label>
                            <div class="col-md-11">
                                <input type="text" name="titulo" class="form-control has-feedback-left"
                                value="<?php echo $row->titulo;?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('titulo'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="contenido">Contenido:</label>
                            <div class="col-md-11">
                                <textarea class="form-control" name="contenido"><?php echo $row->contenido;?></textarea>
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