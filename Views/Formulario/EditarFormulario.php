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
                            <li class="breadcrumb-item" aria-current="page">Formulario</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <h5 class="mb-0">Ficha de Inspeccion Interna</h5>
            </div>
            <form id="formulario" autocomplete="off">
                <div class="form-body">
                    <input type="hidden" id="id_formulario" name="id_formulario">
                    <?php

                    function generarCodigoAleatorio($length)
                    {
                        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                        $codigo = '';
                        $charactersLength = strlen($characters);
                        for ($i = 0; $i < $length; $i++) {
                            $codigo .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $codigo;
                    }

                    ?>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Codigo </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="codigoGenerado" name="codigoGenerado"
                                    value="<?php echo generarCodigoAleatorio(8); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Productor</label>
                            <div class="mb-3">
                                <select class="select2 form-control productor" id="productor" name="productor"></select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Certificados </label>
                            <select class="select2 form-control certificados" id="certificados" name="certificados[]"
                                multiple="multiple">
                            </select>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Parcelas </label>
                            <select class="select2 form-control parcelas" id="parcelas" name="parcelas[]"
                                multiple="multiple">


                            </select>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered display  table-hover" id="tblFormulario" width="100%">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" style="width: 5%;">#</th>
                                    <th scope="col" style="width: 40%;">Preguntas</th>
                                    <th scope="col" style="width: 20%;">Cumplimiento</th>
                                    <th scope="col" style="width: 40%;">Observaciones</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="d-flex justify-content-end gap-6">
                        <button type="submit" class="btn btn-primary font-medium">
                            Guardar
                        </button>
                        <button type="reset" class="btn bg-danger-subtle text-danger font-medium">
                            Cerrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
<?php include_once 'Views/template/footer.php' ?>