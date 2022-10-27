<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Insertar nueva institución.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php echo form_open_multipart('institucion/inicio'); ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                                <i class="fa fa-arrow-circle-left"></i> Volver a Contactos.
                            </button>
                        <?php echo form_close(); ?>
                        <br>
                        <p class="text-white font-13 m-b-30">
                            Usted agregará un nueva institución para que los usuarios puedan apersonarse o sino contactarse con ésta, por favor llene los siguientes datos:
                        </p>
                        <?php 
                            echo form_open_multipart('institucion/agregarbd');
                        ?>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="iddepartamento">Ciudad de la Institución:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="iddepartamento" required>
                                    <option selected disabled value="">
                                        Seleccione una Ciudad...   
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
                            <label class="col-form-label col-md-2 label-align" for="nombreinstitucion">Nombre de la Institución:</label>
                            <div class="col-md-6">
                                <input type="text" name="nombreinstitucion" class="form-control has-feedback-left"
                                value="<?php echo set_value('nombreinstitucion');?>">
                                <span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombreinstitucion'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="direccion">Dirección:</label>
                            <div class="col-md-6">
                                <input type="text" name="direccion" class="form-control has-feedback-left"
                                value="<?php echo set_value('direccion');?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('direccion'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="telefono">Teléfono / Nro. Celular:</label>
                            <div class="col-md-6">
                                <input type="text" name="telefono" class="form-control has-feedback-left"
                                value="<?php echo set_value('telefono');?>">
                                <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('telefono'); ?>
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