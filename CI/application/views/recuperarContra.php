<section id="form"><!--form-->
            <div class="container">
                
                    <div class="col-sm-12 col-md-4 col-sm-offset-1">

                        
                                <h3 class="title">Recupera tu contraseña</h3>
                         

                            <form action="<?php echo site_url("login/enviarEmail");?>" method="post">
                            <div class="form-group">
                                <input class="input" type="text" name="email" placeholder="email" value="<?= set_value("email") ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                         
                            </div>
                           <div class="form-group">
                                <button class="input" type="submit" >Registrarse</button>
                            </div>
                            </form>
                       
                    </div>
               
            </div>
        </section><!--/form-->
