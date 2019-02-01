<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BigoTecnologia</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/TIENDA_ONLINE/CI/boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://localhost/TIENDA_ONLINE/CI/css/4-col-portfolio.css" rel="stylesheet">

  </head>

  <body>
      <header>
          <!-- Navigation -->
          <?php $this->load->view("nav");?>
      </header>
 

   <!-- Page Content -->
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
          </div>
          <?php } ?>

      </div>
<!-- /.row -->



      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="http://localhost/TIENDA_ONLINE/CI/boots/jquery/jquery.min.js"></script>
    <script src="http://localhost/TIENDA_ONLINE/CI/boots/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>