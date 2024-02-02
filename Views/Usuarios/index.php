<?php include_once 'Views/template/header.php' ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestor de Usuarios</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary btn-icon-split" id="btnNuevo">
                <span class="text">Nuevo</span>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tblUsuarios" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Perfil</th>
                            <th>Fecha Registro</th>
                            <th>Foto</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>


    <!-- Content Row -->




</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formulario" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-users"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre"
                                    aria-label="Nombre" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido">Apellido</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-users"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="apellido" id="apellido"
                                    name="apellido" aria-label="Apellido" aria-describedby="basic-addon1" required>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email"
                                    aria-label="email" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="usuario">Usuario</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="usuario" id="usuario"
                                    name="usuario" aria-label="usuario" aria-describedby="basic-addon1" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="clave">Contraseña</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fa-solid fa-key"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Contraseña" id="clave" name="clave"
                                    aria-label="clave" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="rol">Rol</label>
                            <select class="form-control" name="rol" id="rol">
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-md-12">
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="card border-primary">
                                <div class="card-body">
                                    <input type="hidden" id="foto_actual" name="foto_actual">
                                    <label for="imagen" id="icon-image" class="btn btn-primary"><i
                                            class="fa fa-cloud-upload"></i></label>
                                    <span id="icon-cerrar"></span>
                                    <input id="imagen" class="d-none" type="file" name="imagen"
                                        onchange="preview(event)">
                                    <img class="img-thumbnail" id="img-preview" width="150">
                                </div>
                            </div>
                        </div>
                    </div> -->
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
</div>

<?php include_once 'Views/template/footer.php' ?>