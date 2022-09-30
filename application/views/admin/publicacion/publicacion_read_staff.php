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
                                    <?php 
                                        echo form_open_multipart('publicacion/agregar');
                                    ?>
                                        <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus-circle"></i> Nueva Publicación Oficial
                                        </button>
                                    <?php 
                                        echo form_close();
                                    ?>
                                    <br>
                                    <p class="text-dark font-weight-bold font-13 m-b-30">
                                        BIENVENIDO! AQUÍ PUEDE ENCONTRAR INFORMACIÓN OFICIAL BRINDADA POR LA DEFENSORÍA Y LA FUERZA POLICIAL DEL PAÍS.
                                    </p>


                        <?php echo form_open_multipart('publicacion/indexStaff_filtro');?>
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

                    <?php
                        foreach ($publicacion->result() as $row)
                        {
                            $foto=$row->fotoPublicacion;
                    ?>
                    <div class="item bg-dark rounded">
                        <div class="col-md-2 bg-dark rounded align-self-center">
                            <img src="<?php echo $row->fotoPublicacion;?>" class="rounded mx-auto d-block rounded w-100">
                        </div>
                        <div class="card col-md-10 bg-dark">
                            <div class="card-body text-light">
                                <h3 class="font-weight-bold"><?php echo $row->titulo;?></h3><br>
                                <p style="display: block; white-space: nowrap;width: 90%;overflow: hidden;text-overflow: ellipsis; text-align: justify;">
                                    <?php echo $row->contenido;?>        
                                </p>
                                <p class="font-weight-bold">Publicado por <?php echo $row->correo;?> <?php echo formatearVerificado($row->estadoUsuario);?> el <?php echo formatearsoloFecha($row->fechaRegistro);?></p>
                                <?php echo form_open_multipart('publicacion/visualizar_post');?>
                                    <input type="hidden" name="idpublicacion" value="<?php echo $row->idPublicacion;?>">
                                    <button class="btn btn-primary">
                                        Ver Publicación
                                    <i class="fa fa-eye"></i>
                                    </button>
                                <?php echo form_close();?>
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