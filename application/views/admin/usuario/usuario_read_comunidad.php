<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Usuarios pendientes de verificación.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <?php //inicio de los foreach
                                    foreach ($totalusuariosporsexo->result() as $rowtotalusuariosporsexo)
                                    {
                                    foreach ($totalusuariospordpto->result() as $rowtotalusuariospordpto)
                                    {
                                    ?> 
                                    <div class="item btn-group">
                                    <?php echo form_open_multipart('usuarios/adminVerStaff'); ?>
                                        <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-eye"></i> Ver usuarios del Staff
                                        </button>
                                    <?php echo form_close(); ?> 
                                    </div>
                                    <br><br>
                                    <p class="text-dark font-13 m-b-30">
                                        Actualmente <?php echo $usuario->num_rows(); ?>
                                        usuarios están pendientes para ser verificados en sistema!<br>
                                        Estimado administrador, recuerde verificar todas las medidas de seguridad de una Cédula de Identidad para validar a un usuario.
                                    </p>
                                    <h2>Estadísticas: </h2>
                                    <div class="card col-md-12 text-center">
                                        <h2 class="font-weight-bold text-dark">Usuarios registrados por departamento:</h2>
                                        <div class="item justify-content-center text-dark">
                                            <h2 style="color:#42FF00;">■</h2><h2>A</h2>
                                            <h2 style="color:#FFFB00;">■</h2><h2>B⠀</h2>
                                            <h2 style="color:#FF9300;">■</h2><h2>C</h2>
                                        </div>
                                        <div id="grafico_bar_total_por_depto" style="width:100%; height:300px;"></div>
                                    </div>
                                    ⠀<!--caracter en blanco--><br>
                                    <div class="col-md-6 text-center">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2 class="font-weight-bold text-dark">Total de Usuarios Registrados: <?php echo $rowtotalusuariosporsexo->totalu;?>, según el género: </h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content2">
                                                <div class="item justify-content-center text-dark">
                                                    <h2 style="color:#00FFEC;">■</h2><h2>Varones⠀</h2>
                                                    <h2 style="color:#E800FF;">■</h2><h2>Mujeres⠀</h2>
                                                </div>
                                            <div id="grafico_donut_total_por_sexo" style="width:100%; height:300px;"></div>
                                            </div>
                                        </div>
                                    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        Morris.Donut({
            element:'grafico_donut_total_por_sexo',
            data:[
            {label:"Varones",value:<?php echo $rowtotalusuariosporsexo->totalm;?>,color:'#00FFEC'},
            {label:"Mujeres",value:<?php echo $rowtotalusuariosporsexo->totalf;?>,color:'#E800FF'}
            ]
        });
        Morris.Bar({
            element: 'grafico_bar_total_por_depto',
            data: [
                { y: 'Beni', 
                    a:<?php echo $rowtotalusuariospordpto->totalBN;?>},
                { y: 'Chuquisaca', 
                    a:<?php echo $rowtotalusuariospordpto->totalCH;?>},
                { y: 'Cochabamba', 
                    a:<?php echo $rowtotalusuariospordpto->totalCO;?>},
                { y: 'La Paz', 
                    a:<?php echo $rowtotalusuariospordpto->totalLP;?>},
                { y: 'Oruro', 
                    a:<?php echo $rowtotalusuariospordpto->totalOR;?>},
                { y: 'Pando', 
                    a:<?php echo $rowtotalusuariospordpto->totalPD;?>},
                { y: 'Potosí', 
                    a:<?php echo $rowtotalusuariospordpto->totalPT;?>},
                { y: 'Santa Cruz', 
                    a:<?php echo $rowtotalusuariospordpto->totalSC;?>},
                { y: 'Tarija',
                    a:<?php echo $rowtotalusuariospordpto->totalTJ;?>}
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Usuarios'],
        });
    </script>
                                    <?php //fin de los foreach
                                    }}
                                    ?> 
                                    

            <table id="datatable-buttons" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Foto</th>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Nro. C.I.</th>
                        <th>Nro. Celular</th>
                        <th>Género</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>F. Registro</th>
                        <th>F. Modificación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($usuario->result() as $row)
                        {
                    ?>
                    <tr>
                    <td class="text-center">
                        <?php
                            $foto=$row->foto;
                        ?>
                        <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" height="35px" class="rounded mx-auto d-block gallery-item" alt="<?php echo $row->numeroCI; ?>">
                    </td>
                    <td><?php echo $row->nombreDepartamento; ?></td>
                    <td><?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->numeroCI; ?></td>
                    <td><?php echo $row->numeroCelular; ?></td>
                    <td><?php echo formatearGenero($row->sexo); ?></td>
                    <td><?php echo $row->correo; ?></td>
                    <td><?php echo ucfirst($row->rol); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaActualizacion); ?></td>
                    <td class="text-center"><?php echo formatearEstado($row->estado);?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo form_open_multipart('usuarios/modificar');?>
                            <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                            <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="fa fa-edit"></i>
                            </button>
                            <?php echo form_close();?>
                            <?php if ($row->estado=='1'): ?>
                                <button class="btn btn-outline-success" data-toggle="tooltip"  onclick="return confirm_modal_verificar(<?php echo $row->idUsuario; ?>)"  data-placement="top" title="Verificar">
                                <i class="fa fa-toggle-on"></i>
                                </button>
                            <?php else: ?>
                                <button class="btn btn-outline-warning" data-toggle="tooltip"  onclick="return confirm_modal_deshacer_verificar(<?php echo $row->idUsuario; ?>)"  data-placement="top" title="Quitar Verificado">
                                <i class="fa fa-toggle-off"></i>
                                </button>
                            <?php endif ?>
                        </div>
                    </td>
                    </tr>
                    <?php 
                        } 
                    ?>
                </tbody>
            </table>                  
                                </div><!-- Inicio Div card-box table-responsive -->
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

<!-- Modal -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-success">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de verificar este perfil? Presione Verificar.
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete" type="submit" class="btn btn-outline-success"><i class="fa fa-toggle-on"></i> Verificar</a>
      </div>
    </div>
  </div>
</div>
<script>
     function confirm_modal_verificar(id) 
        {
            var url = '<?php echo base_url() . "index.php/usuarios/verificarbd/"; ?>';
            $("#url-delete").attr('href', url + id);
            // jQuery('#confirmar').modal('show', {backdrop: 'static'});
            $('#modalConfirmacion').modal('show');
        } 
</script>

<!-- Modal -->
<div class="modal fade" id="modalDeshacer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-warning">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de quitar el atributo verificado de este perfil? Presione Confirmar.
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete-two" type="submit" class="btn btn-outline-warning"><i class="fa fa-toggle-off"></i> Confirmar</a>
      </div>
    </div>
  </div>
</div>
<script>
     function confirm_modal_deshacer_verificar(id) 
        {
            var url = '<?php echo base_url() . "index.php/usuarios/undoverificarbd/"; ?>';
            $("#url-delete-two").attr('href', url + id);
            $('#modalDeshacer').modal('show');
        } 
</script>

<div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">FOTO SUBIDA POR EL USUARIO:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
         <img src="<?php echo base_url();?>/uploads/user.png" class="modal-img img-thumbnail">
      </div>
    </div>
  </div>
</div>