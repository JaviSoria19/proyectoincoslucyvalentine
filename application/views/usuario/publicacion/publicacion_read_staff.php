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
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <div class="btn-group">
                                        <?php echo form_open_multipart('publicacion/indexComunidad');?>
                                        <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-newspaper-o"></i> Ir a Comunidad
                                        </button>
                                        <?php echo form_close();?>
                                    </div>
                                    <br>
                                    
                                    <br>
                                    <p class="text-dark font-weight-bold font-13 m-b-30">
                                        <?php echo retornarSaludoPerGenero($this->session->userdata('sexo'),2); ?> AQUÍ PUEDE ENCONTRAR INFORMACIÓN OFICIAL BRINDADA POR LA DEFENSORÍA Y LA FUERZA POLICIAL DEL PAÍS.
                                    </p>

                    <?php
                        foreach ($publicacion->result() as $row)
                        {
                            $foto=$row->fotoPublicacion;
                    ?>
                    <div class="item bg-dark rounded">
                        <div class="col-md-2 bg-dark rounded align-self-center">
                            <img src="<?php echo $foto;?>" class="rounded mx-auto d-block w-100">
                        </div>
                        <div class="card col-md-10 bg-dark">
                            <div class="card-body text-light">
                                <h3 class="font-weight-bold"><?php echo $row->titulo;?></h3><br>
                                <p style="display: block; white-space: nowrap;width: 90%;overflow: hidden;text-overflow: ellipsis; text-align: justify;">
                                    <?php echo $row->contenido;?>        
                                </p>
                                <p class="font-weight-bold">Publicado por <?php echo $row->correo;?> <?php echo formatearVerificado($row->estadoUsuario);?> el <?php echo formatearsoloFecha($row->fechaRegistro);?></p>
    <?php 
        $likes = $this->db->query("SELECT COUNT(idMeGusta) AS totalLikes FROM me_gusta WHERE idPublicacion = '.$row->idPublicacion.'");
        foreach ($likes->result() as $rowLikes)
        {
    ?>
    <i class="fa fa-thumbs-up"></i> <?php echo $rowLikes->totalLikes; ?>
    <?php 
        }
    ?>
                                <br><br>
                                <div class="btn-group">
                                    <?php echo form_open_multipart('publicacion/visualizar_post');?>
                                        <input type="hidden" name="idpublicacion" value="<?php echo $row->idPublicacion;?>">
                                        <button class="btn btn-primary">
                                            Ver Publicación
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    <?php echo form_close();?>
                                    ⠀<!--caracter ASCII en blanco-->
    <?php
        $idu = $this->session->userdata('idusuario');
        $botonLike = $this->db->query("SELECT COUNT(idMeGusta) AS totalLikesbtn FROM me_gusta WHERE idPublicacion = '.$row->idPublicacion.' AND idUsuario = $idu");
        foreach ($botonLike->result() as $rowbtn)
        {
            $rowbtn->totalLikesbtn;
        }
    ?>
    <?php if ($rowbtn->totalLikesbtn==0): ?>
                                <?php echo form_open_multipart('like/agregarbd');?>
                                    <input type="hidden" name="idpublicacion" value="<?php echo $row->idPublicacion;?>">
                                    <input type="hidden" name="tipo" value="<?php echo $row->tipo;?>">
                                    <button class="btn btn-primary">
                                        Me Gusta
                                    <i class="fa fa-thumbs-up"></i>
                                    </button>
                                <?php echo form_close();?>
    <?php else: ?>
                                <?php echo form_open_multipart('like/agregarbd');?>
                                    <input type="hidden" name="idpublicacion" value="<?php echo $row->idPublicacion;?>">
                                    <input type="hidden" name="tipo" value="<?php echo $row->tipo;?>">
                                    <button class="btn btn-primary" disabled>
                                        Me Gusta
                                    <i class="fa fa-thumbs-up"></i>
                                    </button>
                                <?php echo form_close();?>
    <?php endif ?> 
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    <br>
                    <?php 
                        } 
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