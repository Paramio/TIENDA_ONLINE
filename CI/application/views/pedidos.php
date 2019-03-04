<table class="table" id="tabla" style="width:100%"  border="2">
<thead class="thead-dark">
  <tr>
    <th>Id</th>
    <th>Estado</th> 
    <th>Fecha</th>
    <th>Acciones</th>
    <th>PDF</th>
  </tr>
</thead>
  <?php foreach($pedidos as $pedido){ ?>
  <tr>
    <td><?=$pedido->Id;?></td>
    <td><?=$pedido->Estado;?></td> 
    <td><?=$pedido->Fecha;?></td>
    
    <td><button class="btn btn-success"><a class='nav-link' href='<?=site_url('Controlador_pedidos/ver_detalles/'.$pedido->Id)?>'>Ver detalles</a></button><?php if($pedido->Estado=='P')echo "<button class='btn btn-danger'><a class='nav-link' href=".site_url('Controlador_pedidos/anular_pedido/'.$pedido->Id).">Anular pedido</a></button></td>"?>;
    <td><button class='btn btn-danger'><a class='nav-link' href="<?=site_url('Controlador_pedidos/crear_pdf/'.$pedido->Id)?>">Descargar pdf</a></button></td>

</tr>
 
  <?php } ?>
</table>