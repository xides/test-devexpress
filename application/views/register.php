<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/assets/icon/2992440_eco_leaves_nature_icon.ico" />
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <br />
        <h3>Registro</h3>
        <br />
        <div class="panel panel-default">

            <div class="panel-body">
                <form method="post" action="<?php echo base_url(); ?>register/validation">
                    <div class="form-group">
                        <label>Ingrese sus nombres</label>
                        <input type="text" name="nombre" class="form-control"
                            value="<?php echo set_value('nombre'); ?>" />
                        <span class="text-danger"><?php echo form_error('nombre'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Ingrese sus apellidos</label>
                        <input type="text" name="apellido" class="form-control"
                            value="<?php echo set_value('apellido'); ?>" />
                        <span class="text-danger"><?php echo form_error('apellido'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Ingrese su correo electrónico</label>
                        <input type="email" name="email" class="form-control"
                            value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Ingrese su contraseña</label>
                        <input type="password" name="contrasena" class="form-control"
                            value="<?php echo set_value('contrasena'); ?>" />
                        <span class="text-danger"><?php echo form_error('contrasena'); ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="register" value="Guardar" class="btn btn-success mb-4 mt-4" />


                        <hr class="mt-4">
                        <a href="<?php echo base_url(); ?>login">Iniciar sesión</a>


                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
