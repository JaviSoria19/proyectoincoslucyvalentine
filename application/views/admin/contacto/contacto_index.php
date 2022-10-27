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
                                    <?php if ($this->session->userdata('rol')=='admin'): ?>
                                        <p class="font-weight-bold text-dark"><u>Permiso de Administrador:</u></p>
                        <div class="btn-group">
                        <?php echo form_open_multipart('institucion/agregar'); ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-success">
                                <i class="fa fa-plus-circle"></i> Registrar nueva institución.
                            </button>
                        <?php echo form_close(); ?>
                        ⠀<!--Caracter en blanco-->
                        <?php echo form_open_multipart('institucion/deshabilitados'); ?>
                                <button type="submit" name="buttonContactos" class="btn btn-outline-warning">
                            <i class="fa fa-eye"></i> Contactos deshabilitados.
                            </button>
                        <?php echo form_close(); ?>
                        </div>
                        ⠀<!--caracter en blanco--><br><br>
                                    <?php endif ?>
                                    <p class="text-dark font-weight-bold font-13 m-b-30">
                                        <?php echo retornarSaludoPerGenero($this->session->userdata('sexo'),2); ?> aquí puedes encontrar los puntos a donde acudir en caso de violencia, por favor selecciona un departamento para desplegar la información.
                                    </p>
                                        
                                    <div class="col-md-4 text-center font-weight-bold text-dark">
                                        <a href="<?php echo base_url()."index.php/institucion/Cochabamba";?>">
                                            <img class="w-75 cbba" src="<?php echo base_url();?>/uploads/departamentos/cochabamba.png">
                                            <p>Cochabamba</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center font-weight-bold text-dark">
                                        <a href="<?php echo base_url()."index.php/institucion/La_Paz";?>">
                                            <img class="w-75 lp" src="<?php echo base_url();?>/uploads/departamentos/la_paz.png">
                                            <p>La Paz</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center font-weight-bold text-dark">
                                        <a href="<?php echo base_url()."index.php/institucion/Santa_Cruz";?>">
                                            <img class="w-75 sc" src="<?php echo base_url();?>/uploads/departamentos/santa_cruz.png">
                                            <p>Santa Cruz</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center font-weight-bold text-dark">
                                        <a href="<?php echo base_url()."index.php/institucion/Tarija";?>">
                                            <img class="w-75 lp" src="<?php echo base_url();?>/uploads/departamentos/tarija.png">
                                            <p>Tarija</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center font-weight-bold text-dark">
                                        <a href="<?php echo base_url()."index.php/institucion/Pando";?>">
                                            <img class="w-75 sc" src="<?php echo base_url();?>/uploads/departamentos/pando.png">
                                            <p>Pando</p>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center font-weight-bold text-dark">
                                        <a href="<?php echo base_url()."index.php/institucion/Potosi";?>">
                                            <img class="w-75 lp" src="<?php echo base_url();?>/uploads/departamentos/potosi.png">
                                            <p>Potosí</p>
                                        </a>
                                    </div>
                                    
                                    
                                </div><!-- Inicio Div card-box table-responsive -->
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->