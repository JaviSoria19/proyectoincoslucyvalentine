<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-exclamation-triangle"></i> Mis denuncias.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <p class="text-dark font-weight-bold">
                                        <?php echo retornarSaludoPerGenero($this->session->userdata('sexo'),2); ?> aquí puedes encontrar las denuncias que realizaste dentro de la aplicación móvil.<br>
                                        Si deseas realizar una denuncia puedes hacier cualquiera de las siguientes opciones:<br>
                                        ● Descargar la aplicación móvil Sistema Lucy Valentine.<br>
                                        ● Apersonarte a SLIM.<br>
                                        ● Apersonarte a la FELCV.
                                    </p>
                                    <?php if ($historial->num_rows()==0): ?>
                                        <div class="alert alert-info text-light">
                                            <h2 class="font-weight-bold">
                                                <i class="fa fa-inbox"></i> Vaya, al parecer no realizaste ninguna denuncia en la aplicación móvil.</h2>
                                        </div>
                                    <?php endif ?>
            <table id="datatable" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Evidencia</th>
                        <th>Tipo de Denuncia</th>
                        <th>Declaración</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($historial->result() as $row)
                        {
                    ?>
                    <tr>
                    <td class="text-center">
                        <?php
                            $foto=$row->foto;
                            if($foto=="")
                            {
                        ?>
                            <i class="fa fa-image" data-toggle="tooltip" data-placement="top" title="Actualmente esta denuncia no cuenta con evidencia fotográfica."></i>
                        <?php
                            }
                            else
                            {
                        ?>
                        <img src="<?php echo $foto;?>" height="35px" class="rounded mx-auto d-block gallery-item">
                        <?php
                            }
                        ?>
                    </td>
                    <td><?php echo $row->descripcionCategoria; ?></td>
                    <td><?php echo $row->declaracion; ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo form_open_multipart('denuncia/visualizar_detalles');?>
                            <input type="hidden" name="iddenuncia" value="<?php echo $row->idDenuncia;?>">
                            <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver Denuncia">
                            <i class="fa fa-eye"></i>
                            </button>
                            <?php echo form_close();?>
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
         <img src="<?php echo base_url();?>/uploads/user.png" class="modal-img rounded w-75">
      </div>
    </div>
  </div>
</div>