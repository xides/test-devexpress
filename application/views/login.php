<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
    <link rel="icon" type="image/png" href="/assets/icon/2992440_eco_leaves_nature_icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    body {
        height: 100%
    }
    </style>
</head>

<body class="bg-body-tertiary">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="col-10 col-md-4 pt-4">

            <h3 class="my-4">Iniciar sesión</h3>

            <div class="panel panel-default">

                <div class="panel-body">

                    <form method="post" action="<?php echo base_url(); ?>login/validation">
                        <div class="form-group">
                            <label>Correo electrónico</label>
                            <input required type="email" name="email" class="form-control"
                                value="<?php echo set_value('email'); ?>" />
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label>Contraseña</label>
                            <input required type="password" name="contrasena" class="form-control"
                                value="<?php echo set_value('contrasena'); ?>" />
                            <span class="text-danger"><?php echo form_error('contrasena'); ?></span>
                        </div>
                        <br>
                        <div class="form-group">
                            <input  type="submit" name="login" value="Ingresar"
                                class="btn btn-success" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                href="<?php echo base_url(); ?>register">Registrarme</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
