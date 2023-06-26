<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="/assets/icon/2992440_eco_leaves_nature_icon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=" ">
    <meta name="generator" content="">
    <title>Registros</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DevExtreme theme -->
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.1.3/css/dx.light.css">
    <!-- DevExtreme library -->
    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/23.1.3/js/dx.all.js"></script>
    <script src="https://unpkg.com/devextreme-aspnet-data@2.9.2/js/dx.aspnet.data.js"></script>


</head>

<body>

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <?php if ( $_SESSION['super_admin']=='1' ) : ?>
                    <li><a href="/manage/" class="nav-link px-2 text-white">Usuarios</a></li>
                    <li><a href="/manage/payments" class="nav-link px-2 text-white">Pagos</a></li>
                    <?php endif; ?>
                </ul>

                <div class="text-end">
                    <a href="/manage/logout" class="btn btn-warning">Salir</a>
                </div>
            </div>
        </div>
    </header>

    <main class="container mt-4">

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Listado de usuarios </h6>
            <div class="dx-viewport">
                <div class="demo-container">
                    <div id="gridContainer"></div>
                </div>
            </div>
        </div>
    </main>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="/assets/js/registers.js"> </script>
</body>
<script>
const states = [{
    "id": 1,
    "state": "Activo"
}, {
    "id": 0,
    "state": "Inactivo"
}];
const roles = <?php echo json_encode($roles) ?>;
const ert = <?php echo $_SESSION['super_admin'] ?>;
</script>

</html>
