<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-folder-open-o"></i> Detalles de la Denuncia.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php echo form_open_multipart('denuncia/index'); ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a denuncias
                            </button>
                        <?php echo form_close(); ?>
                        <br>
                        <?php            
                            foreach($infodenuncia->result() as $row)
                            {
                                $foto=$row->foto;
                                $audio=$row->audio;
                                $video=$row->video;
                        ?>
                            <div class="card bg-dark text-light justify text-justify">
                                <div class="card-body">

                                    <div class="col-md-6">
                                        <table class="table table-sm text-light h5">
                                            <thead></thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tipo de Denuncia:</td>
                                                    <td><?php echo $row->descripcionCategoria;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Denunciante:</td>
                                                    <td><?php echo $row->nombres;?> <?php echo $row->primerApellido;?> <?php echo $row->segundoApellido;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Fecha:</td>
                                                    <td><?php echo formatearsoloFecha($row->fechaRegistro);?> a hrs. <?php echo formatearsoloHora($row->fechaRegistro);?></td>
                                                </tr>
                                                <tr>
                                                    <td>Responsable designado por:</td>
                                                    <td>
                                                        <?php if ($row->autoridadAsignada==''): ?>
                                                        Pendiente.
                                                        <?php else: ?>
                                                            <?php echo $row->autoridadAsignada;?>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h2 class="font-italic">"<?php echo $row->declaracion;?>"</h2>
                                    </div>
                                    <div class="col-md-6 text-center align-self-center">
                                        <h3>Evidencias presentadas: </h3>
                                        <?php if ($foto!=''): ?>
                                            Click en la imagen para verla en la resolución enviada:
                                            <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" class="rounded w-50 mx-auto d-block"
                                            onclick="window.open(this.src, '_blank');">
                                            <br>
                                        <?php else: ?>
                                            La denunciante no ha presentado ninguna evidencia fotográfica.<br>
                                        <?php endif ?>

                                        <?php if ($row->audio!=''): ?>
                                            <audio controls>
                                              <source src="<?php echo base_url();?>/uploads/denuncia/<?php echo $audio;?>" type="audio/ogg">
                                              Su navegador no soporta archivos de audio.
                                            </audio>
                                            <br><br>
                                        <?php else: ?>
                                            La denunciante no ha presentado ninguna evidencia de audio.<br>
                                        <?php endif ?>
                                        <?php if ($row->video!=''): ?>
                                            <video controls class="w-50 rounded">
                                              <source src="<?php echo base_url();?>/uploads/denuncia/<?php echo $video;?>" type="video/mp4">
                                              <source src="movie.ogg" type="video/ogg">
                                              Su navegador no soporta archivos de video.
                                            </video>
                                        <?php else: ?>
                                            La denunciante no ha presentado video alguno.
                                        <?php endif ?>
                                    </div>

                                    <div class="card col-md-12 text-dark">
                                        <h2 class="font-weight-bold">Historial del caso</h2>
            <table class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Persona a cargo</th>
                        <th>Comentario.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($proceso->result() as $rowProceso) { ?>
                    <tr>
                        <td><?php echo $rowProceso->estado; ?></td>
                        <td><?php echo $rowProceso->fechaRegistro; ?></td>
                        <td><?php echo $rowProceso->idUsuarioResponsable; ?></td>
                        <td><?php echo $rowProceso->comentario; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
                                        <h2 class="font-weight-bold">Acciones:</h2>
                                        <?php echo form_open_multipart('proceso_denuncia/agregarbd'); ?>
                                        <input type="hidden" name="iddenuncia" value="<?php echo $row->idDenuncia;?>">
                                        <div class="item form-group has-feedback justify-content-center">
                                            <label class="col-form-label col-md-2 label-align" for="estado">Estado:</label>
                                            <div class="col-md-8">
                                               <select class="form-control" name="estado" required>
                                                    <option selected disabled value="">
                                                        Seleccione un nuevo estado...  
                                                    </option>
                                                    <?php echo selectDenunciasEstado($rowProceso->estado);?>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="item form-group has-feedback justify-content-center">
                                            <label class="col-form-label col-md-2 label-align" for="comentario">Comentario:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control has-feedback-left"  name="comentario" placeholder="...">
                                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                                <?php echo form_error('comentario');?>
                                            </div>
                                        </div>
                                        <?php if ($rowProceso->idUsuarioResponsable==""): ?>
                                            <div class="item form-group has-feedback justify-content-center">
                                            <label class="col-form-label col-md-2 label-align" for="idusuarioresponsable">Responsable:</label>
                                            <div class="col-md-8">
                                               <select class="form-control" name="idusuarioresponsable" required>
                                                    <option selected disabled value="">
                                                        Seleccione un usuario al cual asignar el caso...  
                                                    </option>
                                                    <?php
                                                        foreach ($listaautoridadpolicia->result() as $rowautoridadpolicia)
                                                        {
                                                    ?>
                                                    <option value="<?php echo $rowautoridadpolicia->nombres;?> <?php echo $rowautoridadpolicia->primerApellido;?>">
                                                        <?php echo $rowautoridadpolicia->nombres;?> 
                                                        <?php echo $rowautoridadpolicia->primerApellido;?> 
                                                        <?php echo $rowautoridadpolicia->segundoApellido;?> 
                                                        (<?php echo $rowautoridadpolicia->rol;?>)    
                                                    </option>
                                                    <?php        
                                                        }
                                                    ?>
                                                </select> 
                                            </div>
                                            </div>
                                        <?php else: ?>
                                            <input type="hidden" name="idusuarioresponsable" value="<?php echo $rowProceso->idUsuarioResponsable;?>">
                                        <?php endif ?>
                                        

                                        
                                            <button type="submit" name="buttonInsertProceso" class="btn btn-success">
                                            <i class="fa fa-arrow-circle-o-up"></i> Actualizar Caso de Violencia
                                            </button>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>

                            </div>
                        <?php 
                            }
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

