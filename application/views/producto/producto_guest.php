<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-xl"><!-- Inicio Div col-xl -->
        <h1>Lista de Productos Habilitados.</h1>
        <h2>Hora Actual: <?php echo date('d/m/Y H:i:s')?></h2>
        <h2>Login: <?php echo $this->session->userdata('login')?></h2>
        <h2>Tipo: <?php echo $this->session->userdata('tipo')?></h2>
        <h2>ID: <?php echo $this->session->userdata('idusuario')?></h2>
        Estos datos no serán visibles en el producto final.
        
        <br>

            <table class="table table-striped">

            
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Categoría</th>
      <th scope="col">Precio</th>
      <th scope="col">Color</th>
      <th scope="col">Stock</th>
      <th scope="col">Creado</th>
      <th scope="col">Modificado</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($producto->result() as $row)
    {
        ?>
            <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td>
                    <?php
                    $foto=$row->foto;
                    if($foto=="")
                    {
                        ?>
                        <img src="<?php echo base_url();?>/uploads/user.png" width="30px">
                        <?php
                    }
                    else
                    {
                        ?>
                        <img src="<?php echo base_url();?>/uploads/<?php echo $foto;?>" width="30px">
                        <?php
                    }
                    ?>                    
                </td>
                <td><?php echo $row->marca; ?></td>
                <td><?php echo $row->nombreModelo; ?></td>
                <td><?php echo $row->idCategoria; ?></td>
                <td><?php echo $row->precio; ?></td>
                <td><?php echo $row->color; ?></td>
                <td><?php echo $row->stock; ?></td>
                <td><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                <td><?php echo $row->fechaActualizacion; ?></td>

            </tr>
        <?php
        $indice++;
        
    }
    ?>

  </tbody>
</table>
            </div><!-- Fin Div col-xl -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->