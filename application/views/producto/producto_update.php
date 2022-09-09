<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Actualizar datos del producto.</h2>
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
                            Usted está por editar un producto, por favor llene el siguiente campo:
                        </p>
                        <?php            
                            foreach($infoproducto->result() as $row)
                            {
                            echo form_open_multipart('producto/modificarbd');
                        ?>
                        <input type="hidden" name="idproducto" value="<?php echo $row->idProducto;?>">
                        <br>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="marca">Marca:</label>
                            <div class="col-md-3">
                                <select class="form-control" name="idmarca">
                                    <option value="<?php echo $row->idMarca; ?>">
                                        <?php echo $row->nombreMarca; ?>
                                    </option>
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
                                <input type="text" name="nombreproducto" value="<?php echo $row->nombreProducto;?>"
                                class="form-control has-feedback-left">
                                <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombreproducto'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="idcategoria">Categoría:</label>
                            <div class="col-md-3">
                                <select class="form-control" name="idcategoria">
                                <option value="<?php echo $row->idCategoria; ?>">
                                    <?php echo $row->nombreCategoria; ?>
                                </option>
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
                                <input type="text" name="precio" placeholder="Precio" 
                                value="<?php echo $row->precio;?>" class="form-control has-feedback-left">
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('precio'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="color">Color:</label>
                            <div class="col-md-3">
                                <input type="text" name="color" placeholder="Color" 
                                value="<?php echo $row->color;?>" class="form-control has-feedback-left">
                                <span class="fa fa-paint-brush form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('color'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="stock">Stock:</label>
                            <div class="col-md-3">
                                <input type="text" name="stock" placeholder="Stock" 
                                value="<?php echo $row->stock;?>" class="form-control has-feedback-left">
                                <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('stock'); ?>
                            </div>
                        </div>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="descripcion">Descripción:</label>
                            <div class="col-md-3">
                                <textarea name="descripcion" placeholder="Descripción"
                                class="form-control has-feedback-left"><?php echo $row->descripcion;?></textarea>
                                <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('descripcion'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align">Foto:</label>
                            <div class="col-md-3">
                                <input type="file" name="userfile" class="form-control has-feedback-left">
                                <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            
                        </div>


                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalConfirmacion">
                            <i class="fa fa-edit"></i> Modificar
                        </button>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->


<!-- Modal -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-warning">
        <h5 class="modal-title font-weight-bold">CONFIRMAR CAMBIOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de realizar la modificación? Presione Modificar
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Modificar</button>
      </div>
    </div>
  </div>
</div>

                        <?php
                            form_close();
                            }
                        ?>