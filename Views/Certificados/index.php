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
            <div class="mb-2">
                <button type="button" class="btn btn-primary btn-icon-split" id="btnNuevo">
                    <span class="text">Nuevo</span>
                </button>
            </div>

            <div class="table-responsive">

                <table class="table table-bordered display nowrap table-hover" id="tblCertificados" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Certificados</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>

                </table>


            </div>
        </div>
    </div>


</div>

<!-- Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formulario" autocomplete="off">
                <input type="hidden" id="id_certificado" name="id_certificado">
                <div class="modal-body">


                    <label for="certificado">Certificado</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                style="font-size: 23px;"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="certificado" id="certificado"
                            name="certificado" aria-label="certificado" aria-describedby="basic-addon1" required>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </div>
            </form>


        </div>
    </div>
</div>




<?php include_once 'Views/template/footer.php' ?>