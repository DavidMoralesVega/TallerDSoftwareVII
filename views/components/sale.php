<?php
$Header = new TemplateControllers();
$Header->GetHeaderController();
?>

<main style="margin-top: 58px">
    <div class="container py-4">
        <section>
            <div class="card mb-4">
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-sm-12 text-center text-sm-start">
                            <h6>Seleccionar cliente</h6>
                            <select id="SelectClient" class="select" data-mdb-filter="true">
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <h5>Lista de productos</h5>
                            <ol id="ContainerListProducts" class="list-group list-group-numbered"></ol>
                        </div>

                        <div class="col-md-6">
                            <h5>Carrito</h5>
                            <ol id="ContainerListCart" class="list-group list-group-numbered"></ol>
                        </div>

                    </div>
                </div>
            </div>

            <button id="BtnSaveSale" class="btn btn-primary btn-block">Realizar venta</button>


        </section>
    </div>
</main>