<?php
    $Header = new TemplateControllers();
    $Header -> GetHeaderController();
?>

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container py-4">
        <!--Section: Invoice-->
        <section>
            <div class="card mb-4">
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-sm-6 text-center text-sm-start">
                            <h5 class="mb-3 mb-sm-0 mt-1">Administrar usuarios</h5>
                        </div>
                        <div class="col-sm-6 text-center text-sm-end">
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#ModalAddUser">
                                <i class="fas fa-plus me-1"></i>
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table" id="TableUser">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cédula de identidad</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>

                                <tbody></tbody>

                            </table>


                        </div>


                    </div>
                </div>
            </div>

        </section>
        <!--Section: Invoice-->
    </div>
</main>
<!--Main layout-->






<!-- Modal Add User -->
<div class="modal top fade" id="ModalAddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog   modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-outline mb-4">
                    <input type="text" id="AUName" class="form-control" />
                    <label class="form-label" for="AUName">Nombre</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="AUIdentity" class="form-control" />
                    <label class="form-label" for="AUIdentity">Cédula de identidad</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="AUAddress" class="form-control" />
                    <label class="form-label" for="AUAddress">Dirección</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="number" id="AUCellular" class="form-control" />
                    <label class="form-label" for="AUCellular">Celular</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="AUEmail" class="form-control" />
                    <label class="form-label" for="AUEmail">Correo electrónico</label>
                </div>

                <select id="AUType" class="select mb-4">
                    <option value="Administrador">Administrador</option>
                    <option value="Secretaria">Secretaria</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                    Cerrar
                </button>
                <button id="BtnAdd" type="button" class="btn btn-primary">Guargar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add User -->

