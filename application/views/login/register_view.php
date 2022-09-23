<div class="login_wrapper">
  <div id="register" class="animate form login_form">
          <section class="login_content">
            <?php 
              echo form_open_multipart
              (
                'Usuarios/agregarbd',
                array
                (
                  'id'=>'formlogin',
                  'class'=>'from-control'
                )
              );
            ?>
              <h1 style="text-shadow: none;">Registrarse</h1>
              <div class="content-center">
                <img class="img-fluid rounded w-50" src="<?php echo base_url()?>img/lucyvalentine.png">
              </div>
              <br>
              <h2 style="text-shadow: none;">Datos personales</h2><br>
              <div class="col-md-12">
                <label style="text-shadow: none;">Ciudad Actual:</label>
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
              ⠀<br>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="nombres" placeholder="Ingrese sus nombres">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                  <?php echo form_error('nombres');?>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="primerapellido" placeholder="Primer apellido">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                <?php echo form_error('primerapellido');?>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="segundoapellido" placeholder="Segundo apellido (opcional)">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                <?php echo form_error('segundoapellido');?>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="numerocelular" placeholder="Numero de Celular">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                <?php echo form_error('numerocelular');?>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="numeroci" placeholder="Nro. Cédula de Identidad">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                <?php echo form_error('numeroci');?>
              </div>
              <label style="text-shadow: none;">Género:</label>
              <p>
                      Masculino:
                      <input type="radio" class="flat" name="sexo" value="M" /> Femenino:
                      <input type="radio" class="flat" name="sexo" value="F" checked="" required />
              </p>
              <br>
              <h2 style="text-shadow: none;">Datos de usuario</h2><br>
              <div class="col-md-12 form-group has-feedback">
                <input type="email" class="form-control has-feedback-left"  name="correo" placeholder="Correo" required>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                <?php echo form_error('correo');?>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left"  name="contrasenha" placeholder="Contraseña">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                <?php echo form_error('contrasenha');?>
              </div>

              <div>
                <button class="col btn btn-success" type="submit">
                  <i class="fa fa-sign-in"></i> Registrarse
                </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <span class="badge badge-light">¿Ya tiene una cuenta?
                  <a href="<?php echo base_url()."index.php/usuarios/index";?>"> Iniciar sesión </a>
                </span>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1 style="text-shadow: none;"><i class="fa fa-female"></i> Sistema Lucy Valentine</h1>
                  <p style="text-shadow: none;">©2022 Todos los derechos Reservados.</p>
                </div>
              </div>
            <?php 
              echo form_close();
            ?>
          </section>
  </div>
</div>
      