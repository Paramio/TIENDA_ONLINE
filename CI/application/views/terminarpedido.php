<!-- Page Content -->
<div class="container">



        <h3>CLiente: <?= $this->session->userdata("nombre_usuario") ?></h3>
        <h3>Direccion: <?= $this->session->userdata("direccion") ?></h3>
        <h3>Email: <?= $this->session->userdata("email") ?></h3>
  




<div class="row">
    
      <table class="table" cellpadding="6" cellspacing="1" style="width:100%,padding:10px" border="2px">
      <thead class="thead-dark">
          <tr>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
          </tr>
        </thead>
      <?php foreach ($this->cart->contents() as $items){ ?>

          <tr>
              <td><img class="card-img-top" id="imgCarrito" src=data:image/jpeg;base64,<?=base64_encode(file_get_contents(base_url('imagenes/'.$items['img'])))?>><?= $items['name'];?></td>
              <td><?= $items['price'];?></td>
              <td><?= $items['qty'];?></td>
          </tr>

      <?php } ?>


          <tr>
              <td colspan="2"> </td>
              <td class="right"><strong>Total</strong></td>
              <td class="right"><?php echo $this->cart->format_number($this->cart->total())." ".$this->session->userdata('current_divisa') ?></td>
          </tr>
        
          
          <button class="btn btn-primary"><a class='nav-link' href="<?=site_url('Controlador_pedidos/terminarpedido')?>">Finalizar Pedido</a></button>
      </table>
      
</div>

</div>










