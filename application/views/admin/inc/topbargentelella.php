  <div class="top_nav">
    <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="<?php echo base_url(); ?>gentelella/javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <?php $fotoperfil=$this->session->userdata('foto');?>
              <img src="<?php echo $fotoperfil;?>" width="30px">
              <?php echo $this->session->userdata('correo')?>
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <?php echo form_open_multipart('usuarios/perfil'); ?>
                <button class="dropdown-item" type="submit">Perfil</button>
              <?php echo form_close(); ?>
              <?php echo form_open_multipart('usuarios/logout'); ?>
                <button class="dropdown-item" type="submit"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</button>
              <?php echo form_close(); ?>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>