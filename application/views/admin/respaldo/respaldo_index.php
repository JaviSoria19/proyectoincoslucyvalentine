<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-database"></i> Realizar respaldo de la Base de Datos.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
      <?php 
        switch ($msg) {
        case '1':
          $mensaje='<p style="text-shadow: none;" class="text-danger font-weight-bold">ERROR:CONTRASEÑA INCORRECTA</p>';
          break;
        default:
          $mensaje='';
          break;
        } 
      ?>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <h4 class="font-weight-bold text-dark"><u>PERMISO EXCLUSIVO DE ADMINISTRADOR</u></h4>
                                    <p class="font-weight-bold text-dark">ATENCIÓN: EL SIGUIENTE BOTÓN PERMITE EXPORTAR A UN ARCHIVO <u>.gz</u> TODA LA INFORMACIÓN QUE SE ENCUENTRA ACTUALMENTE DE LA BASE DE DATOS, SE RECOMIENDA REALIZARLO POR LO MENOS UNA VEZ A LA SEMANA PARA EVITAR LA MENOR PÉRDIDA DE DATOS POSIBLE.</p>
                                        <?php echo form_open_multipart('respaldo/exportar'); ?>
              <div class="col-md-6 form-group has-feedback">
                <input id="seguridad" type="password" class="form-control has-feedback-left"  name="seguridad" placeholder="Ingrese su contraseña para exportar los datos">
                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
              </div>
                
                                        <button type="submit" class="btn btn-success">
                                        <i class="fa fa-database"></i> EXPORTAR BASE DE DATOS
                                        </button>
                                        <br><br>
                <div class="rounded badge-light text-center">
                    <?php echo $mensaje; ?>
                </div>
                                        <?php echo form_close();?>
                                        ⠀<!--caracter en blanco-->
      
                                    <br><br>
                                </div><!-- Inicio Div card-box table-responsive -->
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->