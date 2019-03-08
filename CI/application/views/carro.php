<!-- Page Content -->
   <div class="container">




      <!-- Portfolio Item Row -->
      <div class="row">
        
            <table class="table" id="tabla" cellpadding="6" cellspacing="1" style="width:100%" border="0">
                <thead class="thead-dark">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Borrar</th>
                </tr>
</thead>
            <?php foreach ($this->cart->contents() as $items){ ?>
     
                <tr>
                    <td><img class="card-img-top" id="imgCarrito" src=<?=base_url('imagenes/'.$items['img'])?>><?= $items['name'];?></td>
                    <td><?= $items['price']." ".$this->session->userdata('current_divisa')?></td>
                    <td><?= $items['qty'];?></td>
                    <td><a href=<?=site_url('Carrito/eliminar/'.$items['rowid'])?>>Borrar</a></td>
                </tr>

            <?php } ?>


                <tr>
                    <td colspan="2"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right"><?php echo $this->cart->format_number($this->cart->total())." ".$this->session->userdata('current_divisa') ?></td>
                    <button class="btn btn-primary"><a href="<?=site_url('Controlador_pedidos/mostrarResumen')?>">Tramitar pedido</a></button>
                    <button class="btn btn-danger"><a href="<?=site_url('Carrito/vaciar_carrito')?>">Vaciar carrito</a></button>
                </tr>
                
                
            
            </table>
            
      </div>

    </div>










