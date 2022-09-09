<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
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
                        <p class="text-muted font-13 m-b-30">
                            Usted agregará un nuevo usuario para que acceda al sistema, por favor llene los siguientes datos:
                        </p>
                        <?php 
                            echo form_open_multipart('usuarios/agregarbd');
                        ?>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="usuario">Empleado:</label>
                            <div class="col-md-3">
                                <select class="form-control" name="idempleado">
                                <?php
                                    foreach ($empleado->result() as $row)
                                    {
                                ?>
                                <option value="<?php echo $row->idEmpleado; ?>"><?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></option>
                                <?php        
                                    }
                                ?> </select> </div> <label
                                   class="col-form-label col-md-1
                                   label-align" for="login">Nombre de
                                   Usuario:</label> <div class="col-md-3">
                                   <input type="text" name="login"
                                   class="form-control has-feedback-left"
                                   value="<?php echo set_value
                                   ('login');?>"> <span class="fa fa-sign-in
                                   form-control-feedback left"
                                   aria-hidden="true"></span> <?php echo
                                   form_error('login'); ?> </div> <label
                                   class="col-form-label col-md-1
                                   label-align"
                                   for="password">Contraseña:</label> <div
                                   class="col-md-3"> <input type="password"
                                   name="password" class="form-control
                                   has-feedback-left" value="<?php echo
                                   set_value('password');?>"> <span class="fa
                                   fa-key form-control-feedback left"
                                   aria-hidden="true"></span> <?php echo
                                   form_error('password'); ?> </div> </div>
                                   <div class="item form-group has-feedback">
                                   <label class="col-form-label col-md-1
                                   label-align" for="login">Tipo:</label>
                                   <div class="col-md-3"> <select
                                   class="form-control" name="tipo"> <option
                                   value="admin"> Administrador </option>
                                   <option value="vendedor"> Vendedor
                                   </option> <option value="guest"> Invitado
                                   </option> </select> </div> </div> <button
                                   type="submit" class="btn btn-success"> <i
                                   class="fa fa-plus-circle"></i> Insertar
                                   </button> <?php echo form_close();
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->