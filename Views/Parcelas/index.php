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

                <table class="table table-bordered display nowrap table-hover" id="tblParcelas" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>DNI</th>
                            <th>Finca</th>
                            <th>Cafe Produccion</th>
                            <th>Cafe Crecimiento</th>
                            <th>Ha Total</th>
                            <th>Produccion Anterior</th>
                            <th>Produccion Estimada</th>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="formulario" autocomplete="off">
                <input type="hidden" id="id_parcelas" name="id_parcelas">
                <div class="modal-body">

                    <div class="col-md-3">
                        <label for="dni">DNI</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                    style="font-size: 23px;"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="dni" id="dni" name="dni"
                                aria-label="dni" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="container" style=" border: 1px solid #ccc;padding: 20px; border-radius: 5px;">
                        <button class="btn btn-primary mt-3"
                            onclick="agregarContenedor(this.parentNode)">Agregar</button>
                        <div class="row">


                            <div class="col-md-3">
                                <label for="finca">Finca</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                            style="font-size: 23px;"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="finca" id="finca" name="finca"
                                        aria-label="finca" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="caproduccion">Cafe Produccion</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                            style="font-size: 23px;"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="caproduccion" id="caproduccion"
                                        name="caproduccion" aria-label="caproduccion" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cacrecimiento">Cafe Crecimiento</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                            style="font-size: 23px;"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="cacrecimiento"
                                        id="cacrecimiento" name="cacrecimiento" aria-label="cacrecimiento"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="purma">Purma</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-mail"
                                            style="font-size: 23px;"></i></span>
                                    <input type="purma" class="form-control" placeholder="purma" id="purma" name="purma"
                                        aria-label="purma" aria-describedby="basic-addon1">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="bosque">Bosque</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user"
                                            style="font-size: 23px;"></i></span>
                                    <input type="text" class="form-control" placeholder="bosque" id="bosque"
                                        name="bosque" aria-label="bosque" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="llevar">Pan llevar</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="llevar" class="form-control" placeholder="llevar" id="llevar"
                                        name="llevar" aria-label="llevar" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="paotros">Pasto y otros</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="paotros" class="form-control" placeholder="paotros" id="paotros"
                                        name="paotros" aria-label="paotros" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="hatotal">Ha Total</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="hatotal" class="form-control" placeholder="hatotal" id="hatotal"
                                        name="hatotal" aria-label="hatotal" aria-describedby="basic-addon1">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="Proanterior">Produccion de cafe anterior</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="Proanterior" class="form-control" placeholder="Proanterior"
                                        id="Proanterior" name="Proanterior" aria-label="Proanterior"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="Proestimada">Produccion Estimada</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="Proestimada" class="form-control" placeholder="Proestimada"
                                        id="Proestimada" name="Proestimada" aria-label="Proestimada"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <!-- <div class="col-md-3 d-flex align-items-center ">
                                <div class="input-group " style>
                                    <button class="btn btn-danger"><i class="ti ti-x"></i></button>
                                </div>
                            </div> -->


                        </div>
                    </div>

                    <div class="col-12 m-2"></div>

                    <div class="container " style=" border: 1px solid #ccc;padding: 20px; border-radius: 5px;">
                        <button class="btn btn-primary mt-3"
                            onclick="agregarContenedor(this.parentNode)">Agregar</button>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="lotes">Lotes</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                            style="font-size: 23px;"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="lotes" id="lotes" name="lotes"
                                        aria-label="lotes" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="has">Has</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                            style="font-size: 23px;"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="has" id="has" name="has"
                                        aria-label="has" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="edad">Edad</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user-circle"
                                            style="font-size: 23px;"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="edad" id="edad" name="edad"
                                        aria-label="edad" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="proEstimada">Produccion Estimada</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-mail"
                                            style="font-size: 23px;"></i></span>
                                    <input type="proEstimada" class="form-control" placeholder="proEstimada"
                                        id="proEstimada" name="proEstimada" aria-label="proEstimada"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="caturra">caturra</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-user"
                                            style="font-size: 23px;"></i></span>
                                    <input type="text" class="form-control" placeholder="caturra" id="caturra"
                                        name="caturra" aria-label="caturra" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="pache"> pache</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="pache" class="form-control" placeholder="pache" id="pache" name="pache"
                                        aria-label="pache" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="catimor">catimor</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="catimor" class="form-control" placeholder="catimor" id="catimor"
                                        name="catimor" aria-label="catimor" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="catuai">catuai</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="catuai" class="form-control" placeholder="catuai" id="catuai"
                                        name="catuai" aria-label="catuai" aria-describedby="basic-addon1">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="typica">typica</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="typica" class="form-control" placeholder="typica" id="typica"
                                        name="typica" aria-label="typica" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="borbon">borbon</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="borbon" class="form-control" placeholder="borbon" id="borbon"
                                        name="borbon" aria-label="borbon" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="otro">otro</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-circle-key"
                                            style="font-size: 23px;"></i></span>
                                    <input type="otro" class="form-control" placeholder="otro" id="otro" name="otro"
                                        aria-label="otro" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <!-- <div class="col-md-3 d-flex align-items-center ">
                                <div class="input-group " style>
                                    <button class="btn btn-danger"><i class="ti ti-x"></i></button>
                                </div>
                            </div> -->
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