<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-list-alt"></i> Pruebas de Violencia.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <br>
                        <?php
                            $i=1; 
                            foreach ($testDisponibles->result() as $row)
                            {
                        ?>
                        <div class="col-md-4 item justify-content-center">
                            <div class="card bg-lcv w-100">
                                <img class="card-img-top" src="<?php echo base_url();?>/uploads/test_fase_<?php echo $i; ?>.jpg">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-light font-weight-bold"><?php echo $row->nombre; ?></h5>
                                <?php echo form_open_multipart('test/agregar'); ?>
                                <input type="hidden" name="idtestnombre" value="<?php echo $row->idNombre;?>">
                                <button type="submit" class="btn btn-success">
                                <i class="fa fa-arrow-circle-o-right"></i> Comenzar
                                </button>
                                <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $i++;
                            } 
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

