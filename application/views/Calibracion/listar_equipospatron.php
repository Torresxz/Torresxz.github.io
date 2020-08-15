<!doctype html>
<html lang="en">
<!-- ========== HEAD ========== -->
<?=$this->load->view('includes/head','',TRUE)?>
<!-- ========== /HEAD ========== -->
<body>
<!-- ========== MENU LFT ========== -->
<?=$this->load->view('includes/menuleft','',TRUE)?>
<!-- ========== /MENU LFT ========== -->

<!-- ========== CONTENIDO ========== -->
<div class="main-content" id="app">

    <!-- ========== MENU ========== -->
    <?=$this->load->view('includes/navegacion','',TRUE)?>
    <!-- ========== /MENU ========== -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <!-- ========== CONTENIDO ========== -->
                <!-- Boton de busqueda -->
                <div id="test-list" class="card" data-toggle="lists" data-options='{"valueNames": ["orders-clave", "orders-descripcion", "orders-alcance", "orders-marca", "orders-modelo", "orders-serie","orders-informe","orders-insertidumbre", "orders-vencimiento"],"page":10,"pagination":"true"}'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Lista de Equipos patron
                                </h4>
                            </div>
                            <div class="col-auto">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <!-- Toggle -->
                                    <a href="#" class="small text-muted dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Ordenar información
                                    </a>
                                    <!-- Menu -->
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 20px, 0px);">
                                        <a class="dropdown-item sort" data-sort="orders-vencimiento" href="#!">
                                            Asc
                                        </a>
                                        <a class="dropdown-item sort" data-sort="orders-vencimiento" href="#!">
                                            Desc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Button para agregar-->
                                <a href="<?=base_url('Calibracion/agregar_instrumento')?>"class="btn btn-primary btn-sm">
                                    Agregar equipos patron
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Search -->
                                <form class="row align-items-center">
                                    <div class="col-auto pr-0">
                                        <span class="fe fe-search text-muted"></span>
                                    </div>
                                    <div class="col">
                                        <input type="search" class="form-control form-control-flush search" placeholder="Buscar...">
                                    </div>
                                </form>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox table-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                                        <label class="custom-control-label" for="ordersSelectAll">
                                            &nbsp;
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-clave">
                                        Clave del instrumento
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-descripcion">
                                        Descripcion del Instrumento
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-alcance">
                                        Alcance
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-marca">
                                        Marca del Instrumento
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-modelo">
                                        Modelo del instrumento
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-serie">
                                        Serie
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-informe">
                                        Informe del instrumento
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-insertidumbre">
                                        Insertidumbre
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-vencimiento">
                                        Fecha de vencimiento
                                    </a>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach ($equipospatron as $key => $equipopatron) { ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox table-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                                            <label class="custom-control-label" for="ordersSelectOne">
                                                &nbsp;
                                            </label>
                                        </div>
                                    </td>
                                    <td class="orders-clave">
                                        <?=$equipopatron->idequipopatron?>
                                    </td>
                                    <td class="orders-descripcion">
                                        <?=$equipopatron->e_descripcion?>
                                    </td>
                                    <td class="orders-alcance">
                                        <?=$equipopatron->e_alcance?>
                                    </td>
                                    <td class="orders-marca">
                                        <?=$equipopatron->e_marca?>
                                    </td>
                                    <td class="orders-modelo">
                                        <?=$equipopatron->e_modelo?>
                                    </td>
                                    <td class="orders-serie">
                                        <?=$equipopatron->e_serie?>
                                    </td>
                                    <td class="orders-informe">
                                        <?=$equipopatron->e_informe?>
                                    </td>
                                    <td class="orders-insertidumbre">
                                        <?=$equipopatron->e_insertidumbre?>
                                    </td>
                                    <td class="orders-vencimiento">
                                        <?=$equipopatron->e_vence?>
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?=base_url('Calibracion/calibracion_editar/'.$equipopatron->idequipopatron)?>" class="dropdown-item">
                                                    Editar
                                                </a>
                                                <a href="<?=base_url('Calibracion/calibracion_eliminar/'.$equipopatron->idequipopatron)?>" class="dropdown-item">
                                                    Eliminar
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- ========== /CONTENIDO ========== -->
            </div>
        </div> <!-- / .row -->
    </div>
</div> <!-- / .main-content -->

<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
<!-- ========== /Base JS ========== -->

</body>
</html>
