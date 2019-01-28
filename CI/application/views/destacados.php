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

      <!-- Page Heading -->
      <h1 class="my-4">Prueba
        <small>Prueba pero en pequeñito</small>
      </h1>

   <div class="row">
    <?php foreach($productos as $detalles){ ?>
    
      
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://localhost/TIENDA_ONLINE/CI/imagenes/<?= $detalles->Imagen;?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"><?= $detalles->Nombre;?></a>
              
              </h4>
              <p class="card-text"><?= $detalles->Descripcion;?></p>
            </div>
          </div>
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
