<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href=<?=site_url()?>>BigoTecnología</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
      
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorías
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php 
                $ci=get_instance();
                $ci->load->model('Category_model', 'model');
                //var_dump ($ci->model->getCategorias());
                ?>

            <?php foreach($ci->model->getCategorias() as $categoria){ ?>
                <a class="dropdown-item" href= <?=site_url('Mostrar_Productos/getProductosPorCategoria/'.$categoria->Id)?> > <?= $categoria->Nombre;?></a>
            <?php } ?>      
        
            </div>
    </div>
    <div id="carro"><a href=<?=site_url('login')?>><input type="button" class="btn btn-secundary" value="Login/Registro"></a></div>
    <div id="carro"><a href=<?=site_url('carrito')?>><img class="card-img-top" id="carrito" src=<?=base_url('imagenes/carrito.png')?> alt=""></a></div>

</nav>


