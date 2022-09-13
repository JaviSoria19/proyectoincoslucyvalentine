<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Nueva publicación Oficial.</h2>
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
                        <br>
                        <?php 
                            echo form_open_multipart('publicacion/adminAgregarStaffbd');
                        ?>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="titulo">Título de la publicación:</label>
                            <div class="col-md-11">
                                <input type="text" name="titulo" class="form-control has-feedback-left"
                                value="<?php echo set_value('titulo');?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('titulo'); ?>
                            </div>
                        </div>

                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="contenido">Contenido:</label>
                            <div class="col-md-11">
                                <textarea class="form-control" name="contenido"></textarea>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Insertar
                            </button> 
                        <?php 
                            echo form_close();
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->