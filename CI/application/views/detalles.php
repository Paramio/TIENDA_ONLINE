
   <div class="container">




      <!-- Portfolio Item Row -->
      <div class="row">
        <?php foreach($productos as $detalles){ ?>

          
       

          <div class="col-md-8">
            <img class="img-fluid" src=<?=base_url('imagenes/'.$detalles->Imagen)?> alt="">
          </div>

          <div class="col-md-4">
            <h1 class="my-4"><?= $detalles->Nombre;?> </h1>
            
            <h2>Precio <?= $detalles->Precio-(($detalles->Precio*$detalles->Descuento)/100)."$"?><small> <s>Antes: <?= $detalles->Precio;?>$</s></small></h2>
       
            <h3 class="my-3">Descripcion</h3>
            <p><?= $detalles->Descripcion;?></p>
            <p>Quedan: <?= $detalles->Stock;?></p>

            
            
          <section id="form"><!--form-->
            <form action="<?php echo site_url("mostrar_detalles/add/".$detalles->Id);?>" method="post">

              <div class="form-group">
                  <p>Cantidad: <input class="input" type="text" name="cantidad" placeholder="cantidad" value="<?= set_value("cantidad") ?>"></p>
                  <?php echo form_error('cantidad'); ?>
              </div>
              <div class="form-group">
                  <button class="input" type="submit" >Añadir al carro</button>
              </div>
            </form>
          </section>


          </div>
      
          <?php } ?>

      </div>

    </div>


   