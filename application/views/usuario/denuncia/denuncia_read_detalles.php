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
                        <?php 
                            echo form_open_multipart('denuncia/index');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a denuncias
                            </button>
                        <?php 
                            echo form_close();
                        ?>
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
                                         <h3>
                                        Tipo de Denuncia: <?php echo $row->descripcionCategoria;?>
                                        <br>
                                        Denunciante: <?php echo $row->nombres;?> <?php echo $row->primerApellido;?> <?php echo $row->segundoApellido;?>
                                        <br>
                                        Fecha: <?php echo formatearsoloFecha($row->fechaRegistro);?> a hrs. <?php echo formatearsoloHora($row->fechaRegistro);?> <br>
                                        Autoridad asignada al caso:
                                        <?php if ($row->autoridadAsignada==''): ?>
                                            Pendiente.
                                        <?php else: ?>
                                            <?php echo $row->autoridadAsignada;?>
                                        <?php endif ?>
                                        </h3>
                                        <h2><?php echo $row->declaracion;?></h2>
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

