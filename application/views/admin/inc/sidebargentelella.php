<div class="main_container">
  <div class="col-md-3 left_col">
    <div class="left_col scroll-view bg-dark">
      <div class="navbar nav_title bg-dark" style="border:0;">
        <a href="<?php echo base_url(); ?>index.php/usuarios/inicio" class="site_title"><i class="fa fa-female"></i> <span>LCV</span></a>
      </div>
      <div class="clearfix"></div>
            <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <?php
              $fotoperfil=$this->session->userdata('foto');
            ?>
              <img src="<?php echo base_url();?>/uploads/<?php echo $fotoperfil;?>" alt="..." class="img-circle profile_img">
          </div><!-- end div profile_pic -->
          <div class="profile_info">
            <span>Bienvenido,</span>
            <h2><?php echo $this->session->userdata('nombreusuario')?></h2>
          </div><!-- end div profile_info -->
        </div><!-- end div profile clearfix -->
          <!-- /menu profile quick info -->
        <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li>
                  <a>
                    <i class="fa fa-users"></i>Usuarios
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('usuarios/inicio');?>
                          <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">
                            Usuarios
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-newspaper-o"></i>Publicaciones
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                        <?php echo form_open_multipart('publicacion/indexStaff');?>
                          <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">
                            Publicaciones Oficiales
                          </button>
                        <?php echo form_close();?>
                    </li>
                    <li>
                        <?php echo form_open_multipart('publicacion/indexComunidad');?>
                          <button type="submit" class="col-md-11 btn btn-dark" style="background-color: transparent; border: none;">
                            Comunidad
                          </button>
                        <?php echo form_close();?>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">