<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">
      <?php 
        switch ($msg) {
        case '1':
          $mensaje='<p style="text-shadow: none;" class="text-success font-weight-bold">Gracias por usar el sistema!</p>';
          break;
        case '2':
          $mensaje='<p style="text-shadow: none;" class="text-danger font-weight-bold">Usuario o contraseña no válidos.</p>';
          break;
        case '3':
          $mensaje='<p style="text-shadow: none;" class="text-danger font-weight-bold">Acceso no válido, primero inicie sesión</p>';
          break;
        default:
          $mensaje='';
          break;
        } 
      ?>
      
      <?php 
        echo form_open_multipart(
          'Usuarios/validar',
          array(
            'id'=>'formlogin',
            'class'=>'from-control'
          )
        );
      ?>
      <h1 style="text-shadow: none;">Iniciar Sesión</h1>
      <div class="content-center">
        <img class="img-fluid rounded w-50" src="<?php echo base_url()?>img/lucyvalentine.jpg">
      </div>
      <br>
      <div class="rounded badge-light">
        <?php echo $mensaje; ?>
      </div>
      <div class="col-md-12 form-group has-feedback">
        <input type="text" class="form-control has-feedback-left"  name="login" placeholder="Correo" required>
        <span class="fa fa-at form-control-feedback left" aria-hidden="true">
        </span>
      </div>
      <div class="col-md-10 form-group has-feedback">
        <span class="fa fa-key form-control-feedback left" aria-hidden="true">
        </span>
        <input id="contrasenha" type="password" class="form-control has-feedback-left"  name="password" placeholder="Contraseña" required>   
      </div>
        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>       
      <div>
        <button class="col btn btn-success" type="submit">
          <i class="fa fa-sign-in"></i> Ingresar
        </button>
      </div>
      <div class="clearfix"></div>
      <div class="separator">
                <span class="badge badge-light">¿No tiene una cuenta?
                  <a href="<?php echo base_url()."index.php/usuarios/agregar";?>"> Registrarse </a>
                </span>

                <div class="clearfix"></div>
                <br />
        <div class="clearfix"></div>
        <div>
        <h1 style="text-shadow: none;"><i class="fa fa-female"></i> Sistema Lucy Valentine</h1>
          <p  style="text-shadow: none;">©2022 Todos los derechos Reservados.</p>
        </div>
      </div>
      <?php 
        echo form_close();
      ?>
    </section>
  </div>

</div>
      