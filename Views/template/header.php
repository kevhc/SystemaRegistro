<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo BASE_URL . 'Assets/images/logos/favicon.png' ?>" />
    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/styles.min.css' ?>" />
    <!--Select 2-->
    <!-- Primero carga jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Select2-->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">
    <!--Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <!--datatable-->

    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sl-1.7.0/datatables.min.css"
        rel="stylesheet">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?php echo BASE_URL . 'Admin' ?>" class="text-nowrap logo-img">
                        <img src="<?php echo BASE_URL . 'Assets/images/logos/dark-logo.svg' ?>" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Inicio</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo BASE_URL . 'Admin' ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Panel Administrativo</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">REGISTROS</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo BASE_URL . 'Usuarios' ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Usuarios</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo BASE_URL . 'Productores' ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users-group"></i>
                                </span>
                                <span class="hide-menu">Productores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo BASE_URL . 'Parcelas' ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-sandbox"></i>
                                </span>
                                <span class="hide-menu">Parcerlas</span>
                            </a>
                        </li>
                        <?php if ($_SESSION['id'] == 1) { ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?php echo BASE_URL . 'Certificados' ?>"
                                    aria-expanded="false">
                                    <span>
                                        <i class="ti ti-certificate"></i>
                                    </span>
                                    <span class="hide-menu">Certificados</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?php echo BASE_URL . 'Preguntas' ?>" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-question-mark"></i>
                                    </span>
                                    <span class="hide-menu">Preguntas</span>
                                </a>
                            </li>

                        <?php } ?>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Reportes</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo BASE_URL . 'Formulario' ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-report"></i>
                                </span>
                                <span class="hide-menu">Formulario</span>
                            </a>
                        </li>
                        <?php if ($_SESSION['id'] == 1) { ?>
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Historial</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?php echo BASE_URL . 'HProductores' ?>"
                                    aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">HProductores</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?php echo BASE_URL . 'HCertificados' ?>"
                                    aria-expanded=" false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">HCertificados</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?php echo BASE_URL . 'HPreguntas' ?>" aria-expanded=" false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">HPreguntas</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?php echo BASE_URL . 'HParcelas' ?>" aria-expanded=" false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">HParcelas</span>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo BASE_URL . 'Assets/images/usuarios/perfil.jpg' ?>" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">

                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">
                                                Perfil del Usuario
                                            </h5>
                                        </div>

                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="<?php echo BASE_URL . 'Assets/images/usuarios/perfil.jpg' ?>"
                                                class="rounded-circle" width="80" height="80" alt="">
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">
                                                    <?php echo $_SESSION['nombre'] ?>
                                                </h5>
                                                <span class="mb-1 d-block">
                                                    <?php
                                                    $rol = $_SESSION['rol'];
                                                    if ($rol == 0) {
                                                        echo "Administrador";
                                                    } elseif ($rol == 1) {
                                                        echo "Usuario";
                                                    }
                                                    ?>

                                                </span>
                                                <p class="mb-0 d-flex align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i>
                                                    <?php echo $_SESSION['email'] ?>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Mi Perfil</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">Mi Cuenta</p>
                                        </a> -->
                                        <a href="<?php echo BASE_URL . 'principal/salir' ?>"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">
                                            Salir
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->