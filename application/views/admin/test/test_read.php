<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-list-alt"></i> Test Registrados.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                <?php //inicio de los foreach
                                    foreach ($totalfases->result() as $rowtotalfases)
                                    {
                                    foreach ($totalf1p1->result() as $rowtotalf1p1)
                                    {
                                ?> 
                                <div class="col-md-4 text-center">
                                    <h2 class="font-weight-bold text-dark">Total de Test Realizados hasta la fecha: <?php echo $rowtotalfases->totalrealizados;?></h2>
                                    <div id="grafico_total_test" style="width:100%; height:300px;"></div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h2 class="font-weight-bold text-dark">Respuestas de Test Fase 1, Pregunta 1: </h2>
                                    <div id="grafico_total_t1p1" style="width:100%; height:300px;"></div>
                                </div>
                                    
                                   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
                new Morris.Donut({
                    element:'grafico_total_test',
                    data:[
                    {label:"Fase 1",value:<?php echo $rowtotalfases->totalfase1;?>,color:'#FFFB00'},
                    {label:"Fase 2",value:<?php echo $rowtotalfases->totalfase2;?>,color:'#FF9300'},
                    {label:"Fase 3",value:<?php echo $rowtotalfases->totalfase3;?>,color:'#FF0000'}
                    ]
                });
    </script>
    <script>
                new Morris.Donut({
                    element:'grafico_total_t1p1',
                    data:[
                    {label:"Nunca",value:<?php echo $rowtotalf1p1->totalfase1respuesta1opcion1;?>,color:'#42FF00'},
                    {label:"A veces",value:<?php echo $rowtotalf1p1->totalfase1respuesta1opcion2;?>,color:'#FFFB00'},
                    {label:"Frecuente",value:<?php echo $rowtotalf1p1->totalfase1respuesta1opcion3;?>,color:'#FF9300'}
                    ]
                });
    </script>
                                <?php //fin de los foreach
                                    }}
                                ?>
            <table id="datatable-buttons" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Usuario</th>
                        <th>Test</th>
                        <th>R. 1</th>
                        <th>R. 2</th>
                        <th>R. 3</th>
                        <th>R. 4</th>
                        <th>R. 5</th>
                        <th>Resultado</th>
                        <th>F. Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($test->result() as $row)
                        {
                    ?>
                    <tr>
                    <td><?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo formatearRespuesta($row->respuesta1);?></td>
                    <td><?php echo formatearRespuesta($row->respuesta2);?></td>
                    <td><?php echo formatearRespuesta($row->respuesta3);?></td>
                    <td><?php echo formatearRespuesta($row->respuesta4);?></td>
                    <td><?php echo formatearRespuesta($row->respuesta5);?></td>
                    <td><?php echo $row->resultado; ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
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