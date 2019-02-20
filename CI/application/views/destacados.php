<!-- Page Content -->
<div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Prueba
        <small>Prueba pero en pequeñito</small>
      </h1>

  <div class="row">
    <?php foreach($data as $detalles){ ?>
    
      
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href= <?=site_url('producto/'.$detalles->Id)?>><img class="card-img-top" src=<?=base_url('imagenes/'.$detalles->Imagen)?> alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href= <?=site_url('producto/'.$detalles->Id)?>><?= $detalles->Nombre;?></a>
              
              </h4>
              <p class="card-text"><?= $detalles->Descripcion;?></p>
            </div>
          </div>
        </div>
        
     

    <?php } ?>
  </div>
</div>

<?= $this->pagination->create_links() ?>
