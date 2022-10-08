<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Mi Perfil.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <div class="btn-group">
                                        <?php echo form_open_multipart('usuarios/inicio'); ?>
                                        <button type="submit" class="btn btn-success">
                                        <i class="fa fa-home"></i> Volver a Inicio
                                        </button>
                                        <?php echo form_close();?>
                                        ⠀<!--caracter en blanco-->
                                        <?php echo form_open_multipart('usuarios/modificar'); ?>
                                        <input type="hidden" name="idusuario" value="<?php echo $this->session->userdata('idusuario'); ?>">
                                        <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-edit"></i> Editar perfil
                                        </button>
                                        <?php echo form_close();?>
                                    </div>
                                    <br><br>
                                    <?php            
                                        foreach($infousuario->result() as $row)
                                        {
                                    ?>
                                    <div class="item"><!--inicio div class item-->
                                    <div class="col-md-4 align-self-center">
                                        <?php
                                            $fotoperfil=$this->session->userdata('foto');
                                        ?>
                                            <img src="<?php echo $fotoperfil;?>" class="rounded mx-auto d-block w-100">                                        
                                    </div>
                                    <div class="card col-md-8 bg-dark text-light">
                                        <div class="card-body">
                                            <h1><i class="fa fa-list-alt" data-toggle="tooltip" data-placement="top" title="Nombre"></i> <?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?> 
                                            <?php echo formatearVerificado($row->estado);?>
                                        </h1>
                                            <h3><i class="fa fa-star" data-toggle="tooltip" data-placement="top" title="Cargo"></i> <?php echo ucfirst($row->rol); ?></h3>
                                            <h3><i class="fa fa-calendar" data-toggle="tooltip" data-placement="top" title="Fecha de Ingreso"></i> <?php echo formatearsoloFecha($row->fechaRegistro); ?></h3>
                                            <h3>
                                                <?php if ($row->sexo=='M')
                                                    {
                                                        echo '<i class="fa fa-male" data-toggle="tooltip" data-placement="top" title="Género"></i> ';
                                                    }
                                                    else
                                                    {
                                                        echo '<i class="fa fa-female" data-toggle="tooltip" data-placement="top" title="Género"></i> ';
                                                    }
                                                ?>
                                                <?php echo formatearGenero($row->sexo); ?>
                                            </h3>
                                            <h3><i class="fa fa-list-alt" data-toggle="tooltip" data-placement="top" title="C.I."></i> <?php echo ucfirst($row->numeroCI); ?></h3>
                                            <h3><i class="fa fa-mobile-phone" data-toggle="tooltip" data-placement="top" title="Celular"></i> <?php echo ucfirst($row->numeroCelular); ?></h3>
                                            <h3><i class="fa fa-envelope-o" data-toggle="tooltip" data-placement="top" title="Correo"></i> <?php echo $row->correo; ?></h3>
                                        </div>
                                    </div>
                                    </div><!--fin div class item-->
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