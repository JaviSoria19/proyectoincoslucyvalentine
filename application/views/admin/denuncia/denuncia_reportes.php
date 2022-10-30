<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white rounded"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Denuncias - Reportes.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->

                        <?php echo form_open_multipart('denuncia/reportes_filtro');?>
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
                                    foreach ($totaldenunciaporcategoria->result() as $rowtotaldenunciaporcategoria)
                                    {
                                    foreach ($totaldenunciaporprocesodenuncia->result() as $rowtotaldenunciaporprocesodenuncia)
                                    {
                                    ?>
                                    <br><br>
                                    <h2>Estadísticas: </h2>
                                    <div class="card col-md-12 text-center" id='exportarBar'>
                                        <h2 class="font-weight-bold text-dark">Denuncias registradas por categoría:</h2>
                                        <div id="grafico_bar_total_por_categoria" style="width:100%; height:300px;"></div>
                                    </div>
                                    <div class="col-md-12" align="center">
                                        <br>
                                        <button id="saveBarPDF" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF
                                        </button>
                                        <button id="saveBarIMG" class="btn btn-info"><i class="fa fa-file-photo-o"></i> JPG
                                        </button>
                                        <br><br>
                                    </div>
                                    <div class="card col-md-12 text-center" id='exportarBar2'>
                                        <h2 class="font-weight-bold text-dark">Denuncias según el proceso:</h2>
                                        <div id="grafico_bar_total_por_proceso_denuncia" style="width:100%; height:300px;"></div>
                                    </div>
                                    <div class="col-md-12" align="center">
                                        <br>
                                        <button id="saveBarPDF2" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF
                                        </button>
                                        <button id="saveBarIMG2" class="btn btn-info"><i class="fa fa-file-photo-o"></i> JPG
                                        </button>
                                        <br><br>
                                    </div>

                                <div class="col-md-4 text-center">
                                <div class="x_panel rounded">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">De los cuales:</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#A4A4A4;">■</h2><h2>Denuncias descartadas⠀</h2>
                                        <h2 style="color:#EA00AE;">■</h2><h2>Denuncias finalizadas⠀</h2>
                                        </div>
                                        <div id="grafico_donut_d0_d5" style="width:100%; height:300px;"></div>
                                        <div class="justify-content-center text-dark">
                                        <h2 style="color:#A4A4A4;">■ <?php echo $rowtotaldenunciaporprocesodenuncia->d0;?></h2>
                                        <h2 style="color:#EA00AE;">■ <?php echo $rowtotaldenunciaporprocesodenuncia->d5;?></h2>
                                        </div>
                                    </div>
                                </div>
                                </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        Morris.Bar({
            element: 'grafico_bar_total_por_categoria',
            data: [
                { y: 'Tipos de Violencia', 
                    a:<?php echo $rowtotaldenunciaporcategoria->v1;?>,
                    b:<?php echo $rowtotaldenunciaporcategoria->v2;?>,
                    c:<?php echo $rowtotaldenunciaporcategoria->v3;?>,
                    d:<?php echo $rowtotaldenunciaporcategoria->v4;?>,
                    e:<?php echo $rowtotaldenunciaporcategoria->v5;?>,
                    f:<?php echo $rowtotaldenunciaporcategoria->v6;?>
                }
            ],
            xkey: 'y',
            ykeys: ['a','b','c','d','e','f'],
            labels: ['Violencia Física','Violencia Psicológica','Violencia Económica','Violencia Sexual','Violencia Emocional','Otro'],
            barColors: ['#800000','#380062','#FF8F00','#FF0000','#004162','#808080']
        });
        Morris.Bar({
            element: 'grafico_bar_total_por_proceso_denuncia',
            data: [
                { y: 'Procesos',
                    a:<?php echo ($rowtotaldenunciaporprocesodenuncia->d1-$rowtotaldenunciaporprocesodenuncia->d2-$rowtotaldenunciaporprocesodenuncia->d0);?>,
                    b:<?php echo ($rowtotaldenunciaporprocesodenuncia->d2-$rowtotaldenunciaporprocesodenuncia->d3);?>,
                    c:<?php echo ($rowtotaldenunciaporprocesodenuncia->d3-$rowtotaldenunciaporprocesodenuncia->d4);?>,
                    d:<?php echo ($rowtotaldenunciaporprocesodenuncia->d4-$rowtotaldenunciaporprocesodenuncia->d5);?>
                }
            ],
            xkey: 'y',
            ykeys: ['a','b','c','d'],
            labels: ['Denuncias enviadas','Denuncias recepcionadas','Citadas a brindar declaración','Denuncias en seguimiento'],
            barColors: ['#f1c40f','#aeff00','#00ffc1','#0059ff']
        });
        Morris.Donut({
            element:'grafico_donut_d0_d5',
            data:[
            {label:"Denuncias descartadas",value:<?php echo $rowtotaldenunciaporprocesodenuncia->d0;?>,color:'#A4A4A4'},
            {label:"Denuncias finalizadas",value:<?php echo $rowtotaldenunciaporprocesodenuncia->d5;?>,color:'#EA00AE'}
            ]
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
        doc.save('DenunciasRegistradasPorCategoria_<?php echo date('d_m_Y_H_i_s'); ?>.pdf');
    }).catch(function(e) {
        console.log(e.message);
    });
})
</script>
<script type="text/javascript">
    $("#saveBarPDF2").click(function() {
    html2canvas(document.getElementById('exportarBar2')).then(canvas => {
        var w = document.getElementById("exportarBar2").offsetWidth;
        var h = document.getElementById("exportarBar2").offsetHeight;

        var img = canvas.toDataURL("image/jpeg", 1);

        var doc = new jsPDF('L', 'pt', [w, h]);
        doc.addImage(img, 'JPEG', 0, 0, w, h);
        doc.save('DenunciasPorProceso_<?php echo date('d_m_Y_H_i_s'); ?>.pdf');
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
          window.saveAs(blob, 'DenunciasRegistradasPorCategoria_<?php echo date('d_m_Y_H_i_s'); ?>.jpg');
        });
        });
})
</script>
<script type="text/javascript">
    $("#saveBarIMG2").click(function() {
    html2canvas(document.querySelector("#exportarBar2")).then(canvas => {
        canvas.toBlob(function(blob) {
          window.saveAs(blob, 'DenunciasPorProceso_<?php echo date('d_m_Y_H_i_s'); ?>.jpg');
        });
        });
})
</script>

