<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-newspaper-o"></i> Publicaciones Oficiales.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('publicacion/indexStaff');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a publicaciones
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <br>
                        <?php            
                            foreach($infopublicacion->result() as $row)
                            {

                                $foto=$row->fotoPublicacion;
                        ?>
                            <div class="col-md-12 bg-dark text-light rounded">
                                <h1 class="font-weight-bold"><?php echo $row->titulo;?></h1>
                            <p class="font-weight-bold font-13 m-b-30">
                                Publicado por 
                                <?php echo $row->nombreUsuario;?> 
                                <?php echo formatearVerificado($row->estadoUsuario); ?> el 
                                <?php echo formatearFechaMasHora($row->fechaRegistro);?>
                            </p>
                            <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" class="rounded mx-auto d-block img-thumbnail">
                            <h2 class="text-justify"><?php echo $row->contenido;?></h2>
                            </div>
                        <?php 
                            }
                        ?>

                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
    <div class="col-md-12 bg-dark rounded text-light">
        <h1 class="font-weight-bold">Comentarios</h1>
        <?php if ($this->session->userdata('estado')=='1'): ?>
            <p class="text-warning font-weight-bold">Si desea comentar en alguna pubicación debe ser un usuario verificado, para ello debe subir una fotografía LEGIBLE de su Cédula de Identidad y posteriormente será revisado por un administrador.</p>
        <?php endif ?>
        <?php if ($this->session->userdata('estado')=='2'): ?>
            <?php 
            echo form_open_multipart('comentario/agregarbd');
        ?>
            <input type="hidden" name="idpublicacion" value="<?php echo $row->idPublicacion;?>">
            <textarea name="comentario" class="form-control rounded" required></textarea>
            <br>
            <button type="submit" name="buttonComentar" class="btn btn-primary">
                <i class="fa fa-comment-o"></i> Comentar
            </button>
            <button type="reset" class="btn btn-secondary">
                <i class="fa fa-times"></i> Cancelar
            </button>
        <?php 
            echo form_close();
        ?>
        <?php endif ?>
        
        <br>
        <?php 
            foreach($infocomentarios->result() as $row)
            {                         
        ?>
            <div class="card">
                <div class="card-body text-dark">
                    <div class="card-title">
                        <h5><?php echo $row->nombreUsuario;?> <?php echo formatearVerificado($row->estadoUsuario); ?> el <?php echo formatearFechaMasHora($row->fechaRegistro);?></h5>
                    </div>
                    <p class="card-text text-justify"><?php echo $row->comentario;?></p>   
                </div>
            </div>
            <br>
        <?php 
            }
        ?>
    </div>

</div><!-- Fin Right Col Role Main -->

