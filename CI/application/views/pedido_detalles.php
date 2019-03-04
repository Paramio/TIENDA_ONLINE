<table class="table" id="tabla" style="width:100%" border="2">
<thead class="thead-dark">
  <tr>
    <th>Id del pedido</th>
    <th>Imagen</th>
    <th>Id Producto</th>
    <th>Nombre producto</th> 
    <th>Cantidad</th> 
    <th>Precio</th> 
    <th>Subtotal</th> 
  </tr>
</thead>
  <?php $total=0;?>
  <?php foreach($lineas as $linea){ ?>
  <tr>
    <td><?=$linea->Id;?></td>
    <td><img class="card-img-top" id="imgCarrito" style="width:60px; height:60px" src=data:image/jpeg;base64,<?=base64_encode(file_get_contents(base_url('imagenes/'.$linea->Imagen)))?>></td>
    <td><?=$linea->Productos_Id;?></td>
    <td><?=$linea->Nombre_producto;?></td> 
    <td><?=$linea->Cantidad;?></td> 
    <td><?=$linea->Precio;?></td> 
    <td><?=$linea->subtotal;?></td> 
  </tr>
  <?php $total=$total+$linea->subtotal;?>
 
  <?php } ?>
                 <tr>
                    <td colspan="5"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right"><?=$total?></td>
                </tr>
</table>