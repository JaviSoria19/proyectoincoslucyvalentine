<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <title> | Contactos.</title>
                        <h2><i class="fa fa-phone"></i> Contactos.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                        <div class="btn-group">
                            <?php echo form_open_multipart('institucion/inicio'); ?>
                                <button type="submit" name="buttonContactos" class="btn btn-outline-success">
                                <i class="fa fa-arrow-circle-left"></i> Volver a contactos
                                </button>
                            <?php echo form_close(); ?>
                        </div>
                        
                        <br>
                                    <p class="text-dark font-weight-bold font-13 m-b-30">
                                    </p>
            <table id="datatable" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Institución</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Departamento</th>
                        <?php if ($this->session->userdata('rol')=='admin'): ?>
                        <th>Fecha Registro</th>
                        <th>Fecha Actualización</th>    
                        <th>Acciones</th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($institucion->result() as $row): ?>
                    <tr>
                        <td><?php echo $row->nombreInstitucion?></td>
                        <td class="text-center"><?php echo $row->telefono;?></td>
                        <td><?php echo $row->direccion;?></td>
                        <td class="text-center"><?php echo $row->nombreDepartamento;?></td>

                        <?php if ($this->session->userdata('rol')=='admin'): ?>
                        <td class="text-center"><?php echo formatearsoloFecha($row->fechaRegistro);?></td>
                        <td class="text-center"><?php echo formatearFechaMasHora($row->fechaActualizacion);?></td>
                        <td class="text-center"> 
                            <div class="btn-group">
                                <?php echo form_open_multipart('institucion/modificar');?>
                                    <input type="hidden" name="idinstitucion" value="<?php echo $row->idInstitucion;?>">
                                    <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fa fa-edit"></i>
                                    </button>
                                <?php echo form_close();?>
                                <button class="btn btn-outline-warning" data-toggle="tooltip"  onclick="return confirm_modal_deshabilitar(<?php echo $row->idInstitucion; ?>)"  data-placement="top" title="Deshabilitar">
                                <i class="fa fa-toggle-off"></i>
                                </button>
                            </div>
                        </td>
                        <?php endif ?>

                    </tr> 
                    <?php endforeach ?>
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
      <div class="modal-header alert-warning">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-weight-bold text-dark">
        Atención: Esta acción conlleva a que ningún usuario podrá visualizar esta institución nuevamente...<br>
        ¿Está seguro de deshabilitar esta institución? Presione Deshabilitar.
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete" type="submit" class="btn btn-outline-warning"><i class="fa fa-toggle-off"></i> Si, Deshabilitar</a>
      </div>
    </div>
  </div>
</div>
<script>
     function confirm_modal_deshabilitar(id) 
        {
            var url = '<?php echo base_url() . "index.php/institucion/deshabilitarbd/"; ?>';
            $("#url-delete").attr('href', url + id);
            // jQuery('#confirmar').modal('show', {backdrop: 'static'});
            $('#modalConfirmacion').modal('show');
        } 
</script>