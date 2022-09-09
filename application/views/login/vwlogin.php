<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">
      <?php 
        echo form_open_multipart(
          'Usuarios/validar',
          array(
            'id'=>'formlogin',
            'class'=>'from-control'
          )
        );
      ?>
      <h1>Iniciar Sesión</h1>
      <div class="content-center">
        <img class="img-fluid rounded w-50" src="<?php echo base_url()?>img/sisgesoria.png">
      </div>
      <br>
      <div class="col-md-12 form-group has-feedback">
        <input type="text" class="form-control has-feedback-left"  name="login" placeholder="Ingrese su usuario" required>
        <span class="fa fa-user form-control-feedback left" aria-hidden="true">
        </span>
      </div>
      <div class="col-md-12 form-group has-feedback">
        <span class="fa fa-key form-control-feedback left" aria-hidden="true">
        </span>
        <input type="password" class="form-control has-feedback-left"  name="password" placeholder="Ingrese su contraseña" required>
      </div>
      <div>
        <button class="col btn btn-success" type="submit">
          <i class="fa fa-sign-in"></i> Ingresar
        </button>
      </div>
      <div class="clearfix"></div>
      <div class="separator">
        <p class="change_link">¿No tiene una cuenta?
                  <a href="#signup" class="to_register"> Registrarse </a>
                </p>

                <div class="clearfix"></div>
                <br />
        <div class="clearfix"></div>
        <div>
        <h1><i class="fa fa-female"></i> Sistema Lucy Valentine</h1>
          <p>©2022 All Rights Reserved. Gentelella Alela! is a Bootstrap template.</p>
        </div>
      </div>
      <?php 
        echo form_close();
      ?>
    </section>
  </div>

  <div id="register" class="animate form registration_form">
          <section class="login_content">
            <?php 
              echo form_open_multipart
              (
                'Usuarios/registrar',
                array
                (
                  'id'=>'formlogin',
                  'class'=>'from-control'
                )
              );
            ?>
              <h1>Registrarse</h1>
              <div class="content-center">
                <img class="img-fluid rounded w-50" src="<?php echo base_url()?>img/sisgesoria.png">
              </div>
              <br>
              <h2>Datos personales</h2><br>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="nombres" placeholder="Ingrese sus nombres" required>
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="primerapellido" placeholder="Primer apellido" required>
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="segundoapellido" placeholder="Segundo apellido (opcional)">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="numerocelular" placeholder="Numero de Celular">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="numeroci" placeholder="Nro. Cédula de Identidad">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="numeroci" placeholder="Nro. Cédula de Identidad">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
              </div>
              <label>Género:</label>
              <p>
                      Masculino:
                      <input type="radio" class="flat" name="sexo" value="M" /> Femenino:
                      <input type="radio" class="flat" name="sexo" value="F" checked="" required />
              </p>
              <br>
              <h2>Datos de usuario</h2><br>
              <div class="col-md-12 form-group has-feedback">
                <input type="email" class="form-control has-feedback-left"  name="correo" placeholder="Correo">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="nombreusuario" placeholder="Nombre de Usuario">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left"  name="password" placeholder="Contraseña">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div>
                <button class="col btn btn-success" type="submit">
                  <i class="fa fa-sign-in"></i> Registrarse
                </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Ya tiene una cuenta?
                  <a href="#signin" class="to_register"> Iniciar Sesión </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-female"></i> Sistema Lucy Valentine</h1>
                  <p>©2022 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            <?php 
              echo form_close();
            ?>
          </section>
        </div>

</div>
      