<!-- Page Content -->
<body>
    <style>
    #imgCarrito{
        width:60px;
    }
    table, th, td{
        border:2px solid black;
    }
    </style>


        <h3>CLiente: <?= $this->session->userdata("nombre_usuario") ?></h3>
        <h3>Direccion: <?= $this->session->userdata("direccion") ?></h3>
        <h3>Email: <?= $this->session->userdata("email") ?></h3>
  




    
      <table>
    
          <tr>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
          </tr>
   
      <?php foreach ($this->cart->contents() as $items){ ?>

          <tr>
              <td><img  class="card-img-top" id="imgCarrito" src=data:image/jpeg;base64,<?=base64_encode(file_get_contents(base_url('imagenes/'.$items['img'])))?>><?= $items['name'];?></td>
              <td><?= $items['price'];?></td>
              <td><?= $items['qty'];?></td>
          </tr>

      <?php } ?>


          <tr>
              <td colspan="2"> </td>
              <td class="right"><strong>Total</strong></td>
              <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
          </tr>
        
          
          
      </table>


</body>










