<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12"><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white rounded"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-list-alt"></i> Test - Reportes.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                        <?php echo form_open_multipart('test/reportes_filtro');?>
                        <h2>Realizar una búsqueda por fechas y por Test</h2>
                        <div class="item form-group col-md-12">
                            <div class="col-md-2 form-group">
                                <label>Inicio</label>
                                <input type="date" name="date_inicio" class="form-control">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Fin</label>
                                <input type="date" name="date_fin" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Test</label>
                                <select class="form-control" name="numerotest" required>
                                    <option selected disabled value="">
                                        Seleccione un test para las donas; Test de Violencia actual: <?php echo $numeroTest;?>
                                    </option>
                                    <option value="1">Test de Violencia - Fase 1</option>
                                    <option value="2">Test de Violencia - Fase 2</option>
                                    <option value="3">Test de Violencia - Fase 3</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Departamento</label>
                                <select class="form-control" name="iddepartamento" required>
                                    <option selected disabled value="">
                                        Seleccione un departamento.
                                    </option>
                                    <option value="0">TODOS LOS DPTOS.</option>
                                    <?php foreach ($departamento->result() as $rowDep): ?>
                                        <option value="<?php echo $rowDep->idDepartamento ?>"><?php echo $rowDep->nombreDepartamento ?></option>
                                    <?php endforeach ?>
                                </select>
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
                                    foreach ($totalfases->result() as $rowtotalfases)
                                    {
                                    foreach ($totaldonuts->result() as $rowtotaldonuts)
                                    {
                                    foreach ($totalt1->result() as $rowtotalt1)
                                    {
                                    foreach ($totalt2->result() as $rowtotalt2)
                                    {
                                    foreach ($totalt3->result() as $rowtotalt3)
                                    {
                                ?> 
                                <div class="col-md-4 text-center">
                                <div class="x_panel rounded">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Total Realizados hasta la fecha: <?php echo $rowtotalfases->totalrealizados;?></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#FFFB00;">■</h2><h2>Fase 1⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Fase 2⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Fase 3</h2>
                                        </div>
                                        <div id="grafico_donut_total_test" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-4 text-center">
                                <div class="x_panel rounded">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Respuestas de Test Fase <?php echo $numeroTest; ?>, Pregunta 1: </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <?php if ($numeroTest==3||$numeroTest==2): ?>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Casi siempre</h2>
                                        <?php else: ?>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Casi siempre</h2>  
                                        <?php endif ?>
                                        </div>
                                        <div id="grafico_donut_total_t1p1" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4 text-center">
                                <div class="x_panel rounded">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Respuestas de Test Fase <?php echo $numeroTest; ?>, Pregunta 2: </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <?php if ($numeroTest==3||$numeroTest==2): ?>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Casi siempre</h2>
                                        <?php else: ?>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Casi siempre</h2>  
                                        <?php endif ?>
                                        </div>
                                        <div id="grafico_donut_total_t1p2" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                                </div>
                                ⠀<!--caracter en blanco--><br>
                                <div class="col-md-4 text-center">
                                <div class="x_panel rounded">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Respuestas de Test Fase <?php echo $numeroTest; ?>, Pregunta 3: </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <?php if ($numeroTest==3||$numeroTest==2): ?>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Casi siempre</h2>
                                        <?php else: ?>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Casi siempre</h2>  
                                        <?php endif ?>
                                        </div>
                                        <div id="grafico_donut_total_t1p3" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4 text-center">
                                <div class="x_panel rounded">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Respuestas de Test Fase <?php echo $numeroTest; ?>, Pregunta 4: </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <?php if ($numeroTest==3||$numeroTest==2): ?>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Casi siempre</h2>
                                        <?php else: ?>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Casi siempre</h2>  
                                        <?php endif ?>
                                        </div>
                                        <div id="grafico_donut_total_t1p4" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4 text-center">
                                <div class="x_panel rounded">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Respuestas de Test Fase <?php echo $numeroTest; ?>, Pregunta 5: </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <?php if ($numeroTest==3||$numeroTest==2): ?>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Casi siempre</h2>
                                        <?php else: ?>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Casi siempre</h2>  
                                        <?php endif ?>
                                        </div>
                                        <div id="grafico_donut_total_t1p5" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                                </div>
                                ⠀<!--caracter en blanco--><br>
                                <div class="card col-md-12 text-center" id='exportarBar1'>
                                    <h2 class="font-weight-bold text-dark">Respuestas de Test de Violencia - Fase 1: </h2>
                                    <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Casi siempre</h2>
                                    </div>
                                    <div id="grafico_bar_t1" style="width:100%; height:300px;"></div>
                                </div>
                                    <div class="col-md-12" align="center">
                                        <br>
                                        <button id="saveBarPDF1" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF
                                        </button>
                                        <button id="saveBarIMG1" class="btn btn-info"><i class="fa fa-file-photo-o"></i> JPG
                                        </button> 
                                    </div>
                                ⠀<!--caracter en blanco--><br>
                                <div class="card col-md-12 text-center" id='exportarBar2'>
                                    <h2 class="font-weight-bold text-dark">Respuestas de Test de Violencia - Fase 2: </h2>
                                    <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Casi siempre</h2>
                                    </div>
                                    <div id="grafico_bar_t2" style="width:100%; height:300px;"></div>
                                </div>
                                    <div class="col-md-12" align="center">
                                        <br>
                                        <button id="saveBarPDF2" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF
                                        </button>
                                        <button id="saveBarIMG2" class="btn btn-info"><i class="fa fa-file-photo-o"></i> JPG
                                        </button> 
                                    </div>
                                ⠀<!--caracter en blanco--><br>
                                <div class="card col-md-12 text-center" id='exportarBar3'>
                                    <h2 class="font-weight-bold text-dark">Respuestas de Test de Violencia - Fase 3: </h2>
                                    <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Casi siempre</h2>
                                    </div>
                                    <div id="grafico_bar_t3" style="width:100%; height:300px;"></div>
                                </div>  
                                    <div class="col-md-12" align="center">
                                        <br>
                                        <button id="saveBarPDF3" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF
                                        </button>
                                        <button id="saveBarIMG3" class="btn btn-info"><i class="fa fa-file-photo-o"></i> JPG
                                        </button> 
                                    </div>    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        Morris.Donut({
            element:'grafico_donut_total_test',
            data:[
            {label:"Fase 1",value:<?php echo $rowtotalfases->totalfase1;?>,color:'#FFFB00'},
            {label:"Fase 2",value:<?php echo $rowtotalfases->totalfase2;?>,color:'#FF9300'},
            {label:"Fase 3",value:<?php echo $rowtotalfases->totalfase3;?>,color:'#FF0000'}
            ]
        });
        Morris.Donut({
            element:'grafico_donut_total_t1p1',
            data:[
            {label:"Nunca",value:<?php echo $rowtotaldonuts->totalr1o1;?>,color:'#42FF00'},
            {label:"En ocasiones",value:<?php echo $rowtotaldonuts->totalr1o2;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF9300'
                <?php else: ?>
                color:'#FFFB00'
                <?php endif ?>
                },
            {label:"Casi siempre",value:<?php echo $rowtotaldonuts->totalr1o3;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF0000'
                <?php else: ?>
                color:'#FF9300'
                <?php endif ?>
                }
            ]
        });
        Morris.Donut({
            element:'grafico_donut_total_t1p2',
            data:[
            {label:"Nunca",value:<?php echo $rowtotaldonuts->totalr2o1;?>,color:'#42FF00'},
            {label:"En ocasiones",value:<?php echo $rowtotaldonuts->totalr2o2;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF9300'
                <?php else: ?>
                color:'#FFFB00'
                <?php endif ?>
                },
            {label:"Casi siempre",value:<?php echo $rowtotaldonuts->totalr2o3;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF0000'
                <?php else: ?>
                color:'#FF9300'
                <?php endif ?>
                }
            ]
        });
        Morris.Donut({
            element:'grafico_donut_total_t1p3',
            data:[
            {label:"Nunca",value:<?php echo $rowtotaldonuts->totalr3o1;?>,color:'#42FF00'},
            {label:"En ocasiones",value:<?php echo $rowtotaldonuts->totalr3o2;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF9300'
                <?php else: ?>
                color:'#FFFB00'
                <?php endif ?>
                },
            {label:"Casi siempre",value:<?php echo $rowtotaldonuts->totalr3o3;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF0000'
                <?php else: ?>
                color:'#FF9300'
                <?php endif ?>
                }
            ]
        });
        Morris.Donut({
            element:'grafico_donut_total_t1p4',
            data:[
            {label:"Nunca",value:<?php echo $rowtotaldonuts->totalr4o1;?>,color:'#42FF00'},
            {label:"En ocasiones",value:<?php echo $rowtotaldonuts->totalr4o2;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF9300'
                <?php else: ?>
                color:'#FFFB00'
                <?php endif ?>
                },
            {label:"Casi siempre",value:<?php echo $rowtotaldonuts->totalr4o3;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF0000'
                <?php else: ?>
                color:'#FF9300'
                <?php endif ?>
                }
            ]
        });
        Morris.Donut({
            element:'grafico_donut_total_t1p5',
            data:[
            {label:"Nunca",value:<?php echo $rowtotaldonuts->totalr5o1;?>,color:'#42FF00'},
            {label:"En ocasiones",value:<?php echo $rowtotaldonuts->totalr5o2;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF9300'
                <?php else: ?>
                color:'#FFFB00'
                <?php endif ?>
                },
            {label:"Casi siempre",value:<?php echo $rowtotaldonuts->totalr5o3;?>,
                <?php if ($numeroTest==3||$numeroTest==2): ?>
                color:'#FF0000'
                <?php else: ?>
                color:'#FF9300'
                <?php endif ?>
                }
            ]
        });
        Morris.Bar({
            element: 'grafico_bar_t1',
            data: [
                { y: 'Pregunta 1', 
                    a:<?php echo $rowtotalt1->totalt1r1o1;?>, 
                    b:<?php echo $rowtotalt1->totalt1r1o2;?>, 
                    c:<?php echo $rowtotalt1->totalt1r1o3;?> },
                { y: 'Pregunta 2', 
                    a:<?php echo $rowtotalt1->totalt1r2o1;?>, 
                    b:<?php echo $rowtotalt1->totalt1r2o2;?>, 
                    c:<?php echo $rowtotalt1->totalt1r2o3;?> },
                { y: 'Pregunta 3', 
                    a:<?php echo $rowtotalt1->totalt1r3o1;?>, 
                    b:<?php echo $rowtotalt1->totalt1r3o2;?>, 
                    c:<?php echo $rowtotalt1->totalt1r3o3;?> },
                { y: 'Pregunta 4', 
                    a:<?php echo $rowtotalt1->totalt1r4o1;?>, 
                    b:<?php echo $rowtotalt1->totalt1r4o2;?>, 
                    c:<?php echo $rowtotalt1->totalt1r4o3;?> },
                { y: 'Pregunta 5', 
                    a:<?php echo $rowtotalt1->totalt1r5o1;?>, 
                    b:<?php echo $rowtotalt1->totalt1r5o2;?>, 
                    c:<?php echo $rowtotalt1->totalt1r5o3;?> }
            ],
            xkey: 'y',
            ykeys: ['a', 'b', 'c'],
            labels: ['Nunca', 'En ocasiones', 'Casi siempre'],
            barColors: ['#42FF00', '#FFFB00','#FF9300'],
            hideHover: 'auto'
        });

        Morris.Bar({
            element: 'grafico_bar_t2',
            data: [
                { y: 'Pregunta 1', 
                    a:<?php echo $rowtotalt2->totalt2r1o1;?>, 
                    b:<?php echo $rowtotalt2->totalt2r1o2;?>, 
                    c:<?php echo $rowtotalt2->totalt2r1o3;?> },
                { y: 'Pregunta 2', 
                    a:<?php echo $rowtotalt2->totalt2r2o1;?>, 
                    b:<?php echo $rowtotalt2->totalt2r2o2;?>, 
                    c:<?php echo $rowtotalt2->totalt2r2o3;?> },
                { y: 'Pregunta 3', 
                    a:<?php echo $rowtotalt2->totalt2r3o1;?>, 
                    b:<?php echo $rowtotalt2->totalt2r3o2;?>, 
                    c:<?php echo $rowtotalt2->totalt2r3o3;?> },
                { y: 'Pregunta 4', 
                    a:<?php echo $rowtotalt2->totalt2r4o1;?>, 
                    b:<?php echo $rowtotalt2->totalt2r4o2;?>, 
                    c:<?php echo $rowtotalt2->totalt2r4o3;?> },
                { y: 'Pregunta 5', 
                    a:<?php echo $rowtotalt2->totalt2r5o1;?>, 
                    b:<?php echo $rowtotalt2->totalt2r5o2;?>, 
                    c:<?php echo $rowtotalt2->totalt2r5o3;?> }
            ],
            xkey: 'y',
            ykeys: ['a', 'b', 'c'],
            labels: ['Nunca', 'En ocasiones', 'Casi siempre'],
            barColors: ['#42FF00', '#FF9300','#FF0000'],
            hideHover: 'auto'
        });

        Morris.Bar({
            element: 'grafico_bar_t3',
            data: [
                { y: 'Pregunta 1', 
                    a:<?php echo $rowtotalt3->totalt3r1o1;?>, 
                    b:<?php echo $rowtotalt3->totalt3r1o2;?>, 
                    c:<?php echo $rowtotalt3->totalt3r1o3;?> },
                { y: 'Pregunta 2', 
                    a:<?php echo $rowtotalt3->totalt3r2o1;?>, 
                    b:<?php echo $rowtotalt3->totalt3r2o2;?>, 
                    c:<?php echo $rowtotalt3->totalt3r2o3;?> },
                { y: 'Pregunta 3', 
                    a:<?php echo $rowtotalt3->totalt3r3o1;?>, 
                    b:<?php echo $rowtotalt3->totalt3r3o2;?>, 
                    c:<?php echo $rowtotalt3->totalt3r3o3;?> },
                { y: 'Pregunta 4', 
                    a:<?php echo $rowtotalt3->totalt3r4o1;?>, 
                    b:<?php echo $rowtotalt3->totalt3r4o2;?>, 
                    c:<?php echo $rowtotalt3->totalt3r4o3;?> },
                { y: 'Pregunta 5', 
                    a:<?php echo $rowtotalt3->totalt3r5o1;?>, 
                    b:<?php echo $rowtotalt3->totalt3r5o2;?>, 
                    c:<?php echo $rowtotalt3->totalt3r5o3;?> }
            ],
            xkey: 'y',
            ykeys: ['a', 'b', 'c'],
            labels: ['Nunca', 'En ocasiones', 'Casi siempre'],
            barColors: ['#42FF00', '#FF9300','#FF0000'],
            hideHover: 'auto'
        });
    </script>
                                <?php //fin de los foreach
                                    }}}}}
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
    $("#saveBarPDF1").click(function() {
    html2canvas(document.getElementById('exportarBar1')).then(canvas => {
        var w = document.getElementById("exportarBar1").offsetWidth;
        var h = document.getElementById("exportarBar1").offsetHeight;

        var img = canvas.toDataURL("image/jpeg", 1);

        var doc = new jsPDF('L', 'pt', [w, h]);
        doc.addImage(img, 'JPEG', 0, 0, w, h);
        doc.save('RespuestasTestViolencia_Fase1_<?php echo date('d_m_Y_H_i_s'); ?>.pdf');
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
        doc.save('RespuestasTestViolencia_Fase2_<?php echo date('d_m_Y_H_i_s'); ?>.pdf');
    }).catch(function(e) {
        console.log(e.message);
    });
})
</script>
<script type="text/javascript">
    $("#saveBarPDF3").click(function() {
    html2canvas(document.getElementById('exportarBar3')).then(canvas => {
        var w = document.getElementById("exportarBar3").offsetWidth;
        var h = document.getElementById("exportarBar3").offsetHeight;

        var img = canvas.toDataURL("image/jpeg", 1);

        var doc = new jsPDF('L', 'pt', [w, h]);
        doc.addImage(img, 'JPEG', 0, 0, w, h);
        doc.save('RespuestasTestViolencia_Fase3_<?php echo date('d_m_Y_H_i_s'); ?>.pdf');
    }).catch(function(e) {
        console.log(e.message);
    });
})
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>

<script type="text/javascript">
    $("#saveBarIMG1").click(function() {
    html2canvas(document.querySelector("#exportarBar1")).then(canvas => {
        canvas.toBlob(function(blob) {
          window.saveAs(blob, 'RespuestasTestViolencia_Fase1_<?php echo date('d_m_Y_H_i_s'); ?>.jpg');
        });
        });
})
</script>
<script type="text/javascript">
    $("#saveBarIMG2").click(function() {
    html2canvas(document.querySelector("#exportarBar2")).then(canvas => {
        canvas.toBlob(function(blob) {
          window.saveAs(blob, 'RespuestasTestViolencia_Fase2_<?php echo date('d_m_Y_H_i_s'); ?>.jpg');
        });
        });
})
</script>
<script type="text/javascript">
    $("#saveBarIMG3").click(function() {
    html2canvas(document.querySelector("#exportarBar3")).then(canvas => {
        canvas.toBlob(function(blob) {
          window.saveAs(blob, 'RespuestasTestViolencia_Fase3_<?php echo date('d_m_Y_H_i_s'); ?>.jpg');
        });
        });
})
</script>