<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Insertar nuevo usuario.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('usuarios/inicio');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                                <i class="fa fa-arrow-circle-left"></i> Volver a usuarios.
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <br>
                        <p class="text-white font-13 m-b-30">
                            Usted agregará un nuevo usuario del STAFF para que acceda al sistema, por favor llene los siguientes datos:
                        </p>
                        <?php 
                            echo form_open_multipart('usuarios/adminAgregarbd');
                        ?>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="iddepartamento">Ciudad Actual:</label>
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
                            <label class="col-form-label col-md-2 label-align" for="nombres">Nombre(s):</label>
                            <div class="col-md-6">
                                <input type="text" name="nombres" class="form-control has-feedback-left"
                                value="<?php echo set_value('nombres');?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombres'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="primerapellido">Primer Apellido:</label>
                            <div class="col-md-6">
                                <input type="text" name="primerapellido" class="form-control has-feedback-left"
                                value="<?php echo set_value('primerapellido');?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('primerapellido'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="segundoapellido">Segundo Apellido:</label>
                            <div class="col-md-6">
                                <input type="text" name="segundoapellido" class="form-control has-feedback-left"
                                value="<?php echo set_value('segundoapellido');?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('segundoapellido'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="numerocelular">Nro. Celular:</label>
                            <div class="col-md-6">
                                <input type="text" name="numerocelular" class="form-control has-feedback-left"
                                value="<?php echo set_value('numerocelular');?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('numerocelular'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="numeroci">Nro. C.I.:</label>
                            <div class="col-md-6">
                                <input type="text" name="numeroci" class="form-control has-feedback-left"
                                value="<?php echo set_value('numeroci');?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('numeroci'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="sexo">Género:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="sexo" required>
                                    <option selected disabled value="">
                                        Seleccione un Género...   
                                    </option>
                                    <option value="M">
                                        Masculino
                                    </option>
                                    <option value="F">
                                        Femenino
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="correo">Correo:</label>
                            <div class="col-md-6">
                                <input type="email" name="correo" class="form-control has-feedback-left" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('correo'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="nombreusuario">Usuario:</label>
                            <div class="col-md-6">
                                <input type="text" name="nombreusuario" class="form-control has-feedback-left"
                                value="<?php echo set_value('nombreusuario');?>">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombreusuario'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="contrasenha">Contraseña:</label>
                            <div class="col-md-6">
                                <input type="text" name="contrasenha" class="form-control has-feedback-left"
                                value="<?php echo set_value('contrasenha');?>">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('contrasenha'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback justify-content-center">
                            <label class="col-form-label col-md-2 label-align" for="rol">Cargo:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="rol" required>
                                    <option selected disabled value="">
                                        Seleccione un Cargo...   
                                    </option>
                                    <option value="admin">
                                        Administrador
                                    </option>
                                    <option value="policia">
                                        Policia
                                    </option>
                                    <option value="autoridad">
                                        Autoridad
                                    </option>
                                </select>
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