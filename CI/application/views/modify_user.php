<section id="form"><!--form-->
            <div class="container">
                
                           
                                <h3 class="title">Modifica Tu Cuenta</h3>


                                <?php foreach($data as $datos){ ?>
                                
                                    <form action="<?php echo site_url("Modify_User/modify");?>" method="post">
                            <div class="form-group">
                                <input class="input" type="text" name="nombre" value="<?= $datos->Nombre ?>">
                                <?php echo form_error('nombre'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="apellido" value="<?= $datos->Apellidos ?>">
                                <?php echo form_error('apellido'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="email" value="<?= $datos->Email ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="direccion" value="<?= $datos->Direccion ?>">
                                <?php echo form_error('direccion'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="cp" value="<?= $datos->Cp ?>" >
                                <?php echo form_error('cp'); ?>
                            </div>
                            <div class="form-group">
                                <select  name="provincia" value="<?= $datos->Provincia ?>">

                                    <?php foreach($select as $lista){ ?>
                                        
                                        <option ><?= $lista->nombre;?></option>

                                   
                                    <?php } ?>
                                        
                                </select>
                                
                                <?php echo form_error('provincia'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="dni" value="<?= $datos->Dni ?>" >
                                <?php echo form_error('dni'); ?>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="pass" value="<?= $datos->Contraseña ?>" >
                                <?php echo form_error('pass'); ?>
                            </div>
                           <div class="form-group">
                                <button class="input btn btn-success" type="submit" >Modificar Datos</button>
                            </div>
                            </form>

                                <?php } ?>
                            
                                         
                                <br><h2>¿Quieres cancelar tu cuenta?</h2>
                            <h3>Al cancelar tu cuenta permanecerá suspendida y no podrás acceder a ella. Si quieres recuperarla manda un correo al email practicasantonioparamio@gmail.com.</h3>
                            <button class="btn btn-danger"><a class='nav-link' href=<?=site_url('Modify_user/cancel_user')?>>Dar de baja tu cuenta</a></button>
        </section><!--/form-->
