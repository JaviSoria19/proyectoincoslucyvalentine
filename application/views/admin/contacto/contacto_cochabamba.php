<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <title> | Contactos.</title>
                        <h2><i class="fa fa-phone"></i> Contactos - Cochabamba</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                        <?php echo form_open_multipart('contacto/inicio'); ?>
                            <button type="submit" name="buttonContactos" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a contactos
                            </button>
                        <?php echo form_close(); ?>
                        <br>
                                    <p class="text-dark font-weight-bold font-13 m-b-30">
                                    </p>
            <table id="datatable" class="table table-striped table-dark table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Institución</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cb_institucion as $index => $value): ?>
                    <tr>
                    <td><?php echo $cb_institucion[$index]; ?></td>
                    <td class="text-center"><?php echo $cb_telefono[$index]; ?></td>
                    <td><?php echo $cb_direccion[$index]; ?></td>
                    <td class="text-center">Cochabamba,Cochabamba</td>
                    </tr> 
                    <?php endforeach ?>
                </tbody>
            </table>               
                                </div><!-- Inicio Div card-box table-responsive -->
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->