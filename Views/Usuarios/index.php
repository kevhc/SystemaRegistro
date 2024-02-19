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

            <div class="table-responsive p-3">

                <table class="table table-bordered display nowrap table-hover" id="tblUsuarios" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Fecha Registro</th>
                            <th>Foto</th>
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
                <input type="hidden" id="id_usuario" name="id_usuario">
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


                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-mail"
                                        style="font-size: 23px;"></i></span>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email"
                                    aria-label="email" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="usuario">Usuario</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-user"
                                        style="font-size: 23px;"></i></span>
                                <input type="text" class="form-control" placeholder="usuario" id="usuario"
                                    name="usuario" aria-label="usuario" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="clave">Contraseña</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                        style="font-size: 23px;"></i></span>
                                <input type="password" class="form-control" placeholder="Contraseña" id="clave"
                                    name="clave" aria-label="clave" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="rol">Rol</label>
                            <select class="form-select" aria-label="Default select example" name="rol" id="rol">
                                <option selected>Seleccionar</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="imagen">Imagen</label>
                            <div class="input-group mb-3">
                                <input type="hidden" id="foto_actual" name="foto_actual">
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*"
                                    onchange="previewImage()">
                            </div>
                            <img id="imagenPreview" class="img-thumbnail" width="150">
                        </div>
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