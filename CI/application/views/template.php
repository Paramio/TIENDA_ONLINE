<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BigoTecnologia</title>

    <!-- Bootstrap core CSS -->
    <link href=<?=base_url('boots/bootstrap/css/bootstrap.min.css')?> rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href=<?=base_url('css/4-col-portfolio.css')?> rel="stylesheet">

  </head>

  <body>
      <header>
          <!-- Navigation -->
          <?php $this->load->view("nav");?>
      </header>
 
        <?=$cuerpo?>

      <!-- /.row -->

      <!-- Pagination -->
     

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
    <script src=<?=base_url('/boots/jquery/jquery.min.js')?>></script>
    <script src=<?=base_url('/boots/bootstrap/js/bootstrap.bundle.min.js')?>></script>

  </body>

</html>