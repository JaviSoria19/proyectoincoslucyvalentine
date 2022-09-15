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
                        ?>
                            <div class="card bg-dark text-light justify text-justify">
                                <div class="card-body">

                                    <div class="col-md-6">
                                         <h3>
                                        Tipo de Denuncia: <?php echo $row->descripcionCategoria;?>
                                        <br>
                                        Denunciante: <?php echo $row->nombres;?> <?php echo $row->primerApellido;?> <?php echo $row->segundoApellido;?>
                                        <br>
                                        Fecha: <?php echo formatearsoloFecha($row->fechaRegistro);?> a hrs. <?php echo formatearsoloHora($row->fechaRegistro);?>
                                        </h3>
                                        <h2><?php echo $row->declaracion;?></h2>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <h3>Evidencias presentadas: </h3>
                                        <?php if ($foto!=''): ?>
                                            Click en la imagen para verla en la resolución enviada:
                                            <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" class="rounded w-50 mx-auto d-block"
                                            onclick="window.open(this.src, '_blank');">
                                            <br>
                                        <?php endif ?>
                                        <?php if ($foto==''): ?>
                                            La denunciante no ha presentado ninguna evidencia fotográfica.<br>
                                        <?php endif ?>

                                        <?php if ($row->audio!=''): ?>
                                            <audio controls>
                                              <source src="horse.ogg" type="audio/ogg">
                                              <source src="horse.mp3" type="audio/mpeg">
                                              Su navegador no soporta archivos de audio.
                                            </audio>
                                        <?php endif ?>
                                        <?php if ($row->audio==''): ?>
                                            La denunciante no ha presentado ninguna evidencia de audio.<br>
                                        <?php endif ?>

                                        <?php if ($row->video!=''): ?>
                                            <video controls>
                                              <source src="movie.mp4" type="video/mp4">
                                              <source src="movie.ogg" type="video/ogg">
                                              Su navegador no soporta archivos de video.
                                            </video>
                                        <?php endif ?>
                                        <?php if ($row->video==''): ?>
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

