<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white rounded"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Test de Violencia - Fase 1</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php echo form_open_multipart('test/inicio'); ?>
                            <button type="submit"class="btn btn-outline-success">
                                <i class="fa fa-arrow-circle-left"></i> Volver
                            </button>
                        <?php echo form_close(); ?>
                        <br>
                        <?php echo form_open_multipart('test/agregarbd'); ?>
                        <input type="hidden" name="idtestnombre" value="1">
                        <div class="form-group">
                            <label class="font-weight-bold">¿Te amenaza o chantajea?</label><br>
                                <input type="radio" class="flat" name="r1" value="1" required/> Nunca<br><br>
                                <input type="radio" class="flat" name="r1" value="2" required/> En ocasiones<br><br>
                                <input type="radio" class="flat" name="r1" value="3" required/> Casi siempre<br><br>
                        </div><br>
                        <div class="form-group">
                            <label class="font-weight-bold">¿Te grita, se burla de ti, te humilla?</label><br>
                                <input type="radio" class="flat" name="r2" value="1" required/> Nunca<br><br>
                                <input type="radio" class="flat" name="r2" value="2" required/> En ocasiones<br><br>
                                <input type="radio" class="flat" name="r2" value="3" required/> Casi siempre<br><br>
                        </div><br>
                        <div class="form-group">
                            <label class="font-weight-bold">¿Te prohíbe decidir sobre tu dinero y tus bienes?</label><br>
                                <input type="radio" class="flat" name="r3" value="1" required/> Nunca<br><br>
                                <input type="radio" class="flat" name="r3" value="2" required/> En ocasiones<br><br>
                                <input type="radio" class="flat" name="r3" value="3" required/> Casi siempre<br><br>
                        </div><br>
                        <div class="form-group">
                            <label class="font-weight-bold">¿Controla tu hora de salida, de llegada, o uso del tiempo en general?</label><br>
                                <input type="radio" class="flat" name="r4" value="1" required/> Nunca<br><br>
                                <input type="radio" class="flat" name="r4" value="2" required/> En ocasiones<br><br>
                                <input type="radio" class="flat" name="r4" value="3" required/> Casi siempre<br><br>
                        </div><br>
                        <div class="form-group">
                            <label class="font-weight-bold">¿Controla tu forma de vestir?</label><br>
                                <input type="radio" class="flat" name="r5" value="1" required/> Nunca<br><br>
                                <input type="radio" class="flat" name="r5" value="2" required/> En ocasiones<br><br>
                                <input type="radio" class="flat" name="r5" value="3" required/> Casi siempre<br><br>
                        </div><br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Enviar
                            </button> 
                        </div>
                        <?php echo form_close(); ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->