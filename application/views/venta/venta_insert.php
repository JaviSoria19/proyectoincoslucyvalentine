<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Insertar nuevo producto.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('producto/index');
                        ?>
                        <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a productos
                        </button>
                        <?php 
                            echo form_close();
                        ?>
                        <br>
                        <p class="text-muted font-13 m-b-30">
                            Usted va a insertar un nuevo producto, por favor llene el siguiente campo:
                        </p>
                        <?php 
                            echo form_open_multipart('producto/agregarbd');
                        ?>
                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="marca">Marca:</label>
                            <div class="col-md-3">
                                <select class="form-control" name="idmarca">
                                <?php
                                    foreach ($marca->result() as $rowMarca)
                                    {
                                ?>
                                <option value="<?php echo $rowMarca->idMarca; ?>">
                                    <?php echo $rowMarca->nombreMarca; ?>    
                                </option>
                                <?php        
                                    }
                                ?>
                                </select> 
                            </div>

                            <label class="col-form-label col-md-1 label-align" for="nombreproducto">Modelo:</label>
                            <div class="col-md-3">
                                <input type="text" name="nombreproducto" class="form-control has-feedback-left"
                                value="<?php echo set_value('nombreproducto');?>">
                                <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombreproducto'); ?>
                            </div>

                            <label class="col-form-label col-md-1 label-align" for="idcategoria">Categoría:</label>
                            <div class="col-md-3">
                                <select class="form-control" name="idcategoria">
                                <?php
                                    foreach ($categoria->result() as $rowCategoria)
                                    {
                                ?>
                                <option value="<?php echo $rowCategoria->idCategoria; ?>">
                                    <?php echo $rowCategoria->nombreCategoria; ?>    
                                </option>
                                <?php        
                                    }
                                ?>
                                </select> 
                            </div>

                        </div>
        
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="precio">Precio (Bs.):</label>
                            <div class="col-md-3">
                                <input type="text" name="precio" class="form-control has-feedback-left"
                                value="<?php echo set_value('precio');?>">
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('precio'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="color">Color:</label>
                            <div class="col-md-3">
                                <input type="text" name="color" class="form-control has-feedback-left"
                                value="<?php echo set_value('color');?>">
                                <span class="fa fa-paint-brush form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('color'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="stock">Stock:</label>
                            <div class="col-md-3">
                                <input type="text" name="stock" class="form-control has-feedback-left"
                                value="<?php echo set_value('stock');?>">
                                <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('stock'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="descripcion">Descripción:</label>
                            <div class="col-md-3">
                                <textarea name="descripcion" class="form-control has-feedback-left"></textarea>
                                <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('descripcion'); ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus-circle"></i> Insertar
                        </button>
                        <?php 
                            echo form_close();
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->