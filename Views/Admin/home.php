<?php include_once 'Views/template/header.php' ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-3">
            <div class="item">
                <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo BASE_URL . 'Assets/images/logos/trabajando.png' ?>" width="60"
                                height="60" class="mb-3" alt="">
                            <p class="fw-semibold fs-3 text-warning mb-1">Usuarios</p>
                            <h5 class="fw-semibold text-warning mb-0" id="totalUsuarios"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="item">
                <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo BASE_URL . 'Assets/images/logos/agricultor.png' ?>" width="60"
                                height="60" class="mb-3" alt="">
                            <p class="fw-semibold fs-3 text-info mb-1">Productores</p>
                            <h5 class="fw-semibold text-info mb-0" id="totalProductores"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="item">
                <div class="card border-0 zoom-in  bg-success-subtle  shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo BASE_URL . 'Assets/images/logos/medalla.png' ?>" width="60" height="60"
                                class="mb-3" alt="">
                            <p class="fw-semibold fs-3 text-success mb-1">Certificados</p>
                            <h5 class="fw-semibold text-success mb-0" id="totalCertificados"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="item">
                <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo BASE_URL . 'Assets/images/logos/solicitud.png' ?>" width="60"
                                height="60" class="mb-3" alt="">
                            <p class="fw-semibold fs-3 text-danger mb-1">Preguntas</p>
                            <h5 class="fw-semibold text-danger mb-0" id="totalPreguntas"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--  Row 1 -->

    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Sales Overview</h5>
                    </div>
                    <div>
                        <select class="form-select">
                            <option value="1">March 2023</option>
                            <option value="2">April 2023</option>
                            <option value="3">May 2023</option>
                            <option value="4">June 2023</option>
                        </select>
                    </div>
                </div>
                <div id="chart"></div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Ultima Conexion</h5>
                    </div>
                    <ul id="ultimaConexion" class="timeline-widget mb-0 align-items-center mb-n5">

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5>Simple Pie Chart</h5>
                    <div id="chart-pie-simple"></div>
                </div>
            </div>
        </div>


    </div>


</div>



<?php include_once 'Views/template/footer.php' ?>