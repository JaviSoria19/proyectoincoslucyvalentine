<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12"><!-- Inicio Div col-md-12 col-sm-12 -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-cubes"></i> Lista de productos deshabilitados.</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <div class="col-sm-12"><!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive"><!-- Inicio Div card-box table-responsive -->
                                    <?php 
                                        echo form_open_multipart('producto/index');
                                    ?>
                                    <button type="submit" name="buttonIndex" class="btn btn-outline-success">
                                    <i class="fa fa-arrow-circle-left"></i> Volver a productos
                                    </button>
                                    <?php 
                                        echo form_close();
                                    ?>
                                    <br>
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, los productos que usted está viendo a continuación no serán visibles al momento de realizar una compra o venta.
                                    </p>
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">  
  <thead>
    <tr class="text-center">
      <th scope="col">Foto</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Descripción</th>
      <th scope="col">Categoría</th>
      <th scope="col">Precio</th>
      <th scope="col">Color</th>
      <th scope="col">Stock</th>
      <th scope="col">Habilitar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($producto->result() as $row)
    {
        ?>
            <tr>
                <td>
                    <?php
                    $foto=$row->foto;
                    if($foto=="")
                    {
                        ?>
                        <i class="fa fa-image" data-toggle="tooltip" data-placement="top" title="Actualmente este producto no cuenta con una imagen."></i>
                        <?php
                    }
                    else
                    {
                        ?>
                        <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" height="35px" class="mx-auto d-block">
                        <?php
                    }
                    ?>                    
                </td>

                <td><?php echo $row->nombreMarca; ?></td>
                <td><?php echo $row->nombreProducto; ?></td>
                <td><?php echo $row->descripcion; ?></td>
                <td><?php echo $row->nombreCategoria; ?></td>
                <td><?php echo $row->precio; ?></td>
                <td><?php echo $row->color; ?></td>
                <td><?php echo $row->stock; ?></td>

                <td class="text-center">
                    <?php echo form_open_multipart('producto/habilitarbd');?>
                    <input type="hidden" name="idproducto" value="<?php echo $row->idProducto;?>">
                    <button class="btn btn-success">
                        <i class="fa fa-toggle-on"></i> Habilitar
                    </button>
                    <?php echo form_close();?>
                </td>
            </tr>
        <?php        
            }
        ?>

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