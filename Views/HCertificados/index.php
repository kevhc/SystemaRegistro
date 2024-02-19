<?php include_once 'Views/template/header.php' ?>

<div class="container-fluid">

    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">
                        <?php echo $data['title'] ?>
                    </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="<?php echo BASE_URL . 'Admin' ?>">Inicio</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Certificados</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered display nowrap table-hover" id="tblHCertificados" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Certificados</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Evento</th>

                        </tr>
                    </thead>

                </table>


            </div>
        </div>
    </div>


</div>






<?php include_once 'Views/template/footer.php' ?>