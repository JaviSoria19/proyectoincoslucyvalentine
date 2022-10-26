<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark rounded text-light"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Usuarios - Reportes.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                        <?php echo form_open_multipart('usuarios/reportes_filtro');?>
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
                                    <?php //inicio de los foreach
                                    foreach ($totalusuariosporsexo->result() as $rowtotalusuariosporsexo)
                                    {
                                    foreach ($totalusuariospordpto->result() as $rowtotalusuariospordpto)
                                    {
                                    ?>
                                    <div class="card col-md-12 text-center" id='exportarBar'>
                                        <h2 class="font-weight-bold text-dark">Usuarios registrados por departamento:</h2>
                                        <div id="grafico_bar_total_por_depto" style="width:100%; height:300px;"></div>
                                    </div>
                                    <div class="col-md-12" align="center">
                                        <br>
                                        <button id="saveBarPDF" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF
                                        </button>
                                        <button id="saveBarIMG" class="btn btn-info"><i class="fa fa-file-photo-o"></i> JPG
                                        </button> 
                                    </div>
                                    ⠀<!--caracter en blanco--><br>
                                    <div class="col-md-12 text-center">
                                        <div class="x_panel rounded">
                                            <div class="x_title">
                                                <h2 class="font-weight-bold text-dark">Total de Usuarios Registrados: <?php echo $rowtotalusuariosporsexo->totalu;?>, según el género: </h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content2">
                                                <div class="item justify-content-center text-dark">
                                                    <h2 style="color:#00FFEC;">■</h2><h2>Varones⠀</h2>
                                                    <h2 style="color:#E800FF;">■</h2><h2>Mujeres⠀</h2>
                                                </div>
                                            <div id="grafico_donut_total_por_sexo" style="width:100%; height:300px;"></div>
                                            </div>
                                        </div>
                                    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        Morris.Donut({
            element:'grafico_donut_total_por_sexo',
            data:[
            {label:"Varones",value:<?php echo $rowtotalusuariosporsexo->totalm;?>,color:'#00FFEC'},
            {label:"Mujeres",value:<?php echo $rowtotalusuariosporsexo->totalf;?>,color:'#E800FF'}
            ]
        });
        Morris.Bar({
            element: 'grafico_bar_total_por_depto',
            data: [
                { y: 'Beni', 
                    a:<?php echo $rowtotalusuariospordpto->totalBN;?>},
                { y: 'Chuquisaca', 
                    a:<?php echo $rowtotalusuariospordpto->totalCH;?>},
                { y: 'Cochabamba', 
                    a:<?php echo $rowtotalusuariospordpto->totalCO;?>},
                { y: 'La Paz', 
                    a:<?php echo $rowtotalusuariospordpto->totalLP;?>},
                { y: 'Oruro', 
                    a:<?php echo $rowtotalusuariospordpto->totalOR;?>},
                { y: 'Pando', 
                    a:<?php echo $rowtotalusuariospordpto->totalPD;?>},
                { y: 'Potosí', 
                    a:<?php echo $rowtotalusuariospordpto->totalPT;?>},
                { y: 'Santa Cruz', 
                    a:<?php echo $rowtotalusuariospordpto->totalSC;?>},
                { y: 'Tarija',
                    a:<?php echo $rowtotalusuariospordpto->totalTJ;?>}
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Usuarios'],
            hideHover: 'auto'
        });
    </script>
                                    <?php //fin de los foreach
                                    }}
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

<!--SCRIPTS PARA PDF & IMAGEN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>
<script type="text/javascript">
    $("#saveBarPDF").click(function() {
    html2canvas(document.getElementById('exportarBar')).then(canvas => {
        var w = document.getElementById("exportarBar").offsetWidth;
        var h = document.getElementById("exportarBar").offsetHeight;

        var img = canvas.toDataURL("image/jpeg", 1);

        var doc = new jsPDF('L', 'pt', [w, h]);
        doc.addImage(img, 'JPEG', 0, 0, w, h);
        doc.save('UsuariosRegistradosPorDepartamento_<?php echo date('d_m_Y_H_i_s'); ?>.pdf');
    }).catch(function(e) {
        console.log(e.message);
    });
})
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
<script type="text/javascript">
    $("#saveBarIMG").click(function() {
    html2canvas(document.querySelector("#exportarBar")).then(canvas => {
        canvas.toBlob(function(blob) {
          window.saveAs(blob, 'UsuariosRegistradosPorDepartamento_<?php echo date('d_m_Y_H_i_s'); ?>.jpg');
        });
        });
})
</script>
