<div class="main_container">
  <div class="col-md-3 left_col bg-lcv">
    <div class="left_col scroll-view bg-lcv">
      <div class="navbar nav_title bg-lcv" style="border:0; ba" align="center">
        <a href="<?php echo base_url(); ?>index.php/usuarios/inicio" class="site_title"><i class="fa fa-female"></i> <span>Sistema LCV</span></a>
      </div>
      <div class="clearfix"></div>
            <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <?php
              $fotoperfil=$this->session->userdata('foto');
            ?>
              <img src="<?php echo $fotoperfil;?>" alt="..." class="img-circle profile_img">
          </div><!-- end div profile_pic -->
          <div class="profile_info">
            <span>
              <?php if ($this->session->userdata('sexo')=='M'):?>
                Bienvenido,
              <?php else: ?>
                Bienvenida,
              <?php endif ?>
            </span>
            <h2 class="overflow-hidden"><?php echo $this->session->userdata('correo')?> <?php echo formatearVerificado($this->session->userdata('estado')); ?></h2>
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
                      <a href="<?php echo base_url()."index.php/usuarios/inicio";?>">Usuarios</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()."index.php/usuarios/vetados";?>">Usuarios Vetados</a>
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
                      <a href="<?php echo base_url()."index.php/publicacion/indexStaff";?>">Publicaciones Oficiales</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()."index.php/publicacion/indexComunidad";?>">Comunidad</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-info"></i>Información
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="<?php echo base_url()."index.php/publicacion/indexInformacionEducativa";?>">Información Educativa</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()."index.php/publicacion/indexPautasdeSeguridad";?>">Pautas de Seguridad</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()."index.php/publicacion/indexPromociondeActitudesIgualitarias";?>">Promoción de Actitudes Igualitarias.</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-phone"></i>Contactos
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="<?php echo base_url()."index.php/institucion/inicio";?>">Instituciones</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>