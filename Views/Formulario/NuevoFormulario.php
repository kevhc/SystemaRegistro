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
                            <li class="breadcrumb-item" aria-current="page">Usuarios</li>
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

                <table class="table table-bordered display nowrap table-hover" id="tblProductores" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Dni</th>
                            <th>Sexo</th>
                            <th>Region</th>
                            <th>Telefono</th>
                            <th>Fecha Registro</th>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formulario" autocomplete="off">
                <input type="hidden" id="id_productores" name="id_productores">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                        style="font-size: 23px;"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre"
                                    aria-label="Nombre" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido">Apellido</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                        style="font-size: 23px;"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="apellido" id="apellido"
                                    name="apellido" aria-label="Apellido" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido">DNI</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                        style="font-size: 23px;"></i>
                                </span>
                                <input type="number" class="form-control" placeholder="dni" id="dni" name="dni"
                                    aria-label="dni" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="sexo">Sexo</label>
                            <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">
                                <option selected>Seleccionar</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="sector">SECTOR</label>
                        <div class="col-md-3">
                            <label for="caserio">Caserio</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-mail"
                                        style="font-size: 23px;"></i></span>
                                <input type="caserio" class="form-control" placeholder="caserio" id="caserio"
                                    name="caserio" aria-label="caserio" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="distrito">Distrito</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-user"
                                        style="font-size: 23px;"></i></span>
                                <input type="text" class="form-control" placeholder="distrito" id="distrito"
                                    name="distrito" aria-label="distrito" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="provincia">Provincia</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-user"
                                        style="font-size: 23px;"></i></span>
                                <input type="text" class="form-control" placeholder="provincia" id="provincia"
                                    name="provincia" aria-label="provincia" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="region">Region</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-user"
                                        style="font-size: 23px;"></i></span>
                                <input type="text" class="form-control" placeholder="region" id="region" name="region"
                                    aria-label="region" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="estatus">Estatus</label>
                            <select class="form-select" aria-label="Default select example" name="estatus" id="estatus">
                                <option selected>Seleccionar</option>
                                <option value="1">C0</option>
                                <option value="2">C1</option>
                                <option value="3">C2</option>
                                <option value="4">Organico</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Telefono</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                        style="font-size: 23px;"></i></span>
                                <input type="telefono" class="form-control" placeholder="telefono" id="telefono"
                                    name="telefono" aria-label="telefono" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="longitud">Longitud</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                        style="font-size: 23px;"></i></span>
                                <input type="longitud" class="form-control" placeholder="longitud" id="longitud"
                                    name="longitud" aria-label="longitud" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="latitud">Latitud</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                        style="font-size: 23px;"></i></span>
                                <input type="latitud" class="form-control" placeholder="latitud" id="latitud"
                                    name="latitud" aria-label="latitud" aria-describedby="basic-addon1" required>
                            </div>
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="altitud">Altitud</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                        style="font-size: 23px;"></i></span>
                                <input type="altitud" class="form-control" placeholder="altitud" id="altitud"
                                    name="altitud" aria-label="altitud" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="imagen">Imagen</label>
                            <div class="input-group mb-3">
                                <input type="hidden" id="foto_actual" name="foto_actual">
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*"
                                    onchange="previewImage()">
                            </div>
                            <img id="imagenPreview" class="img-thumbnail" width="150" style="display:none;">
                        </div>
                    </div>


                </div>





                <?php include_once 'Views/template/footer.php' ?>