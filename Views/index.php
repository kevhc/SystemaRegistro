<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $data['title'] ?>
    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo BASE_URL . 'Assets/images/logos/favicon.png' ?>" />
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/styles.min.css' ?>" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>





</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="<?php echo BASE_URL . 'Assets/images/logos/dark-logo.svg' ?>" width="180"
                                        alt="">
                                </a>
                                <p class="text-center">Bienvenido al Sistema de Registro</p>
                                <form id="formulario">
                                    <div class="mb-3">
                                        <label for="usuario" class="form-label">Usuario</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario"
                                            aria-describedby="usuario" placeholder="usuario">
                                    </div>
                                    <div class="mb-4">
                                        <label for="clave" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="clave" name="clave"
                                            placeholder="clave">
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Iniciar
                                        Sesion</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo BASE_URL . 'Assets/libs/jquery/dist/jquery.min.js' ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/Custom.js' ?>"> </script>
    <script src="<?php echo BASE_URL . 'Assets/js/pages/login.js' ?>"> </script>
    <script>
    const base_url = "<?php echo BASE_URL; ?>";
    </script>
</body>

</html>