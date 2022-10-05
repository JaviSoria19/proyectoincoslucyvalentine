<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Usuarios - Reportes.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                        <?php echo form_open_multipart('usuarios/reportes_filtro');?>
                        <h2>Realizar una búsqueda por fechas</h2>
                        <div class="item form-group col-md-12">
                            <div class="col-md-2 form-group">
                                <label>Inicio</label>
                                <input type="date" name="date_inicio" class="form-control">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Fin</label>
                                <input type="date" name="date_fin" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <br>
                            <div class="col-md-2 form-group">
                                <label>Filtrar</label>
                                <button type="submit" class="btn btn-primary form-control">
                                 <i class="fa fa-search"></i> Buscar!</button>
                            </div>
                        </div>
                        <?php echo form_close();?>
                                    <?php //inicio de los foreach
                                    foreach ($totalusuariosporsexo->result() as $rowtotalusuariosporsexo)
                                    {
                                    foreach ($totalusuariospordpto->result() as $rowtotalusuariospordpto)
                                    {
                                    ?>
                                    <div class="card col-md-12 text-center">
                                        <h2 class="font-weight-bold text-dark">Usuarios registrados por departamento:</h2>
                                        <div id="grafico_bar_total_por_depto" style="width:100%; height:300px;"></div>
                                    </div>
                                    ⠀<!--caracter en blanco--><br>
                                    <div class="col-md-12 text-center">
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