<section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-sm-offset-1">

                        
                                <h3 class="title">Inicia Sesion</h3>
                         
                            <form action="<?php echo  site_url("login/logear");?>" method="post">
                            <?=$error?>
                            <div class="form-group">
                                <input class="input" type="text" name="nombre_usuario_login" placeholder="Nombre Usuario" value="<?= set_value("nombre_usuario_login") ?>">
                                <?php echo form_error('nombre_usuario_login'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="pass_inicio" placeholder="Contraseña" value="<?= set_value("pass_inicio") ?>">
                                <?php echo form_error('pass_inicio'); ?>
                            </div>
                            
                            <div class="form-group">
                                <button class="input btn btn-success"" type="submit" >Iniciar sesion</button>
                            </div>

                            </form>   
                               <a href=<?=site_url('login/recuperarContra')?>>¿Has olvidado tu contraseña?</a>         
                       
                    </div>
                    <div class="col-sm-1 col-md-2">
                        <h2 class="or">O</h2>
                    </div>
                    <div class="col-sm-12 col-md-4 col-md-offset-1">
                        
                           
                                <h3 class="title">Crea Tu Cuenta</h3>
                           
                            
                            <form action="<?php echo site_url("login/registro");?>" method="post">
                            <div class="form-group">
                                <input class="input" type="text" name="nombre" placeholder="Nombre" value="<?= set_value("nombre") ?>">
                                <?php echo form_error('nombre'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="apellido" placeholder="apellido" value="<?= set_value("apellido") ?>">
                                <?php echo form_error('apellido'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="email" placeholder="Email" value="<?= set_value("email") ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="direccion" placeholder="Direccion" value="<?= set_value("direccion") ?>">
                                <?php echo form_error('direccion'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="cp" placeholder="Codigo Postal" value="<?= set_value("cp") ?>">
                                <?php echo form_error('cp'); ?>
                            </div>
                            <div class="form-group">
                                <select  name="provincia" value="<?= set_value("provincia") ?>">

                                    <?php foreach($select as $lista){ ?>
                                        
                                        <option ><?= $lista->nombre;?></option>

                                    <?php } ?>
                            
                            
                                </select>
                                <?php echo form_error('provincia'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="dni" placeholder="DNI" value="<?= set_value("dni") ?>">
                                <?php echo form_error('dni'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="nombre_usuario_registro" placeholder="Nombre Usuario" value="<?= set_value("nombre_usuario_registro") ?>">
                                <?php echo form_error('nombre_usuario_registro'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="pass" placeholder="Contraseña" value="<?= set_value("pass") ?>">
                                <?php echo form_error('pass'); ?>
                            </div>
                           <div class="form-group">
                                <button class="input btn btn-success"" type="submit" >Registrarse</button>
                            </div>
                            </form>
                       
                    </div>
                </div>
            </div>
        </section><!--/form-->
