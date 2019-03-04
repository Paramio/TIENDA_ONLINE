<section id="form"><!--form-->
            <div class="container">
                
                    <div class="col-sm-12 col-md-4 col-sm-offset-1">

                        
                                <h3 class="title">Restablece tu contraseña</h3>
                         

                            <form action="" method="post">
                            <div class="form-group">
                                <input class="input" type="text" name="contra1" placeholder="contra1" value="<?= set_value("contra1") ?>">
                                <?php echo form_error('contra1'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="contra2" placeholder="contra2" value="<?= set_value("contra2") ?>">
                                <?php echo form_error('contra2'); ?>
                            </div>
                         
                            </div>
                           <div class="form-group">
                                <button class="input" type="submit" >Restablecer</button>
                            </div>
                            </form>
                       
                    </div>
               
            </div>
        </section><!--/form-->
