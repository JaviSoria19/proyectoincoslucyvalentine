<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <title> | Denuncias.</title>
                        <h2><i class="fa fa-exclamation-triangle"></i> Denuncias.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <div class="btn-group">
                                        <?php echo form_open_multipart('denuncia/descartados');?>
                                        <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-eye"></i> Denuncias descartadas.
                                        </button>
                                        <?php echo form_close();?>
                                    </div>
                                    <br><br>
                                    <p class="text-dark font-weight-bold font-13 m-b-30">
                                        <?php echo retornarSaludoPerGenero($_SESSION['sexo'],3) ?> <?php echo formatearRol($this->session->userdata('rol')); ?>, aquí se encuentra las denuncias que se asignaron a su persona y por ende quedan bajo su responsabilidad
                                    </p>

                        <?php echo form_open_multipart('denuncia/asignados_filtro');?>
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

            <table id="datatable-buttons" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Evidencia</th>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Nro. C.I.</th>
                        <th>Nro. Celular</th>
                        <th>Género</th>
                        <th>Tipo de Denuncia</th>
                        <th>F. Denuncia</th>
                        <th>Proceso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($denuncia->result() as $row)
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
                    <td><?php echo $row->nombreDepartamento; ?></td>
                    <td><?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></td>
                    <td><?php echo $row->numeroCI; ?></td>
                    <td><?php echo $row->numeroCelular; ?></td>
                    <td><?php echo formatearGenero($row->sexo); ?></td>
                    <td><?php echo $row->descripcionCategoria; ?></td>
                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                    <td><?php echo formatearUltimoProcesoDenuncia($row->ultimoEstado); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <?php echo form_open_multipart('denuncia/visualizar_detalles');?>
                            <input type="hidden" name="iddenuncia" value="<?php echo $row->idDenuncia;?>">
                            <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver Denuncia">
                            <i class="fa fa-eye"></i>
                            </button>
                            <?php echo form_close();?>
                            <?php if ($row->ultimoEstado=='Denuncia enviada'): ?>
                                <button class="btn btn-outline-warning" data-toggle="tooltip"  onclick="return confirm_modal_verificar(<?php echo $row->idDenuncia; ?>)"  data-placement="top" title="Descartar denuncia">
                                <i class="fa fa-trash"></i>
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
      <div class="modal-header alert-warning">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-weight-bold text-dark">
         ¿Está seguro de descartar esta denuncia? Presione Confirmar.
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete" type="submit" class="btn btn-outline-warning"><i class="fa fa-trash"></i> Si, descartar</a>
      </div>
    </div>
  </div>
</div>
<script>
     function confirm_modal_verificar(id) 
        {
            var url = '<?php echo base_url() . "index.php/denuncia/deshabilitarbd/"; ?>';
            $("#url-delete").attr('href', url + id);
            // jQuery('#confirmar').modal('show', {backdrop: 'static'});
            $('#modalConfirmacion').modal('show');
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