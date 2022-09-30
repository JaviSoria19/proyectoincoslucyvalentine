<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
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
                                    foreach ($totalfases->result() as $rowtotalfases)
                                    {
                                    foreach ($totalf1p1->result() as $rowtotalf1p1)
                                    {
                                    foreach ($totalt1->result() as $rowtotalt1)
                                    {
                                    foreach ($totalt2->result() as $rowtotalt2)
                                    {
                                    foreach ($totalt3->result() as $rowtotalt3)
                                    {
                                ?> 
                                <div class="col-md-6 text-center">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Total de Test Realizados hasta la fecha: <?php echo $rowtotalfases->totalrealizados;?></h2>
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

                                <div class="col-md-6 text-center">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2 class="font-weight-bold text-dark">Respuestas de Test Fase 1, Pregunta 1: </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Frecuentemente</h2>
                                        </div>
                                        <div id="grafico_donut_total_t1p1" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                                </div>

                                <div class="card col-md-12 text-center">
                                    <h2 class="font-weight-bold text-dark">Respuestas de Test de Violencia - Fase 1: </h2>
                                    <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <h2 style="color:#FFFB00;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>Frecuentemente</h2>
                                    </div>
                                    <div id="grafico_bar_t1" style="width:100%; height:300px;"></div>
                                </div>
                                ⠀<!--caracter en blanco--><br>
                                <div class="card col-md-12 text-center">
                                    <h2 class="font-weight-bold text-dark">Respuestas de Test de Violencia - Fase 2: </h2>
                                    <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Frecuentemente</h2>
                                    </div>
                                    <div id="grafico_bar_t2" style="width:100%; height:300px;"></div>
                                </div>
                                ⠀<!--caracter en blanco--><br>
                                <div class="card col-md-12 text-center">
                                    <h2 class="font-weight-bold text-dark">Respuestas de Test de Violencia - Fase 3: </h2>
                                    <div class="item justify-content-center text-dark">
                                        <h2 style="color:#42FF00;">■</h2><h2>Nunca⠀</h2>
                                        <h2 style="color:#FF9300;">■</h2><h2>En ocasiones⠀</h2>
                                        <h2 style="color:#FF0000;">■</h2><h2>Frecuentemente</h2>
                                    </div>
                                    <div id="grafico_bar_t3" style="width:100%; height:300px;"></div>
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
            {label:"Nunca",value:<?php echo $rowtotalf1p1->totalfase1respuesta1opcion1;?>,color:'#42FF00'},
            {label:"En ocasiones",value:<?php echo $rowtotalf1p1->totalfase1respuesta1opcion2;?>,color:'#FFFB00'},
            {label:"Frecuente",value:<?php echo $rowtotalf1p1->totalfase1respuesta1opcion3;?>,color:'#FF9300'}
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
            labels: ['Nunca', 'En ocasiones', 'Frecuentemente'],
            barColors: ['#42FF00', '#FFFB00','#FF9300']
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
            labels: ['Nunca', 'En ocasiones', 'Frecuentemente'],
            barColors: ['#42FF00', '#FF9300','#FF0000']
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
            labels: ['Nunca', 'En ocasiones', 'Frecuentemente'],
            barColors: ['#42FF00', '#FF9300','#FF0000']
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