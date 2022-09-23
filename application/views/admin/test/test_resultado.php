<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white rounded"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>RESULTADO</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php echo form_open_multipart('test/inicio'); ?>
                            <button type="submit"class="btn btn-outline-success">
                                <i class="fa fa-arrow-circle-left"></i> Volver
                            </button>
                        <?php echo form_close(); ?>
                        <h2><?php echo $mensaje ?></h2>
                        <p>Gracias por realizar el test! Recuerda que ésto tiene un propósito y es brindar conciencia sobre la violencia, nunca es tarde para reaccionar y poner un ALTO!</p>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->