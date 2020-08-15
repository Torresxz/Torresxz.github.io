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
                <div id="test-list" class="card" data-toggle="lists" data-options='{"valueNames": ["orders-nombre","orders-fecha","orders-areadestino", "orders-hora", "orders-areaenvia", "orders-status","orders-ordenservicio"],"page":10,"pagination":"true"}'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Lista de los intercambios de procesos
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
                                        <a class="dropdown-item sort" data-sort="orders-nombre" href="#!">
                                            Asc
                                        </a>
                                        <a class="dropdown-item sort" data-sort="orders-nombre" href="#!">
                                            Desc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="<?=base_url('Transaccion/agregar')?>"class="btn btn-primary btn-sm">
                                    Agregar nueva transaccion
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
                                            No. Transaccion
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-fecha">
                                        Fecha entrega
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-hora">
                                       Hora entrega
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Confirmación
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-areaenvia">
                                       Area
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-ordenservicio">
                                        No servicio
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-areadestino">
                                        Area destino
                                    </a>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach ($transaccion as $key => $transaccion) { ?>
                                <tr>
                                    <td class="orders-nombre">
                                        <?=$transaccion->Id_transaccion?>
                                    </td>
                                    <td class="orders-fecha">
                                         <?=$transaccion->Fecha_entrega?>
                                    </td>
                                    <td class="orders-hora">
                                        <?=$transaccion->Hora_entrega?>
                                    </td>
                                    <td class="orders-status">
                                        <div class="badge badge-pill <?php if($transaccion->Confirmacion=='Aprobada'){ echo 'badge-success'; }else{ echo 'badge-secondary'; }  ?>">
                                        <?=$transaccion->Confirmacion?>
                                        </div>
                                    </td>
                                    <td class="orders-areaenvia">
                                        <?=$transaccion->area_envia?>
                                    </td>
                                    <td class="orders-ordenservicio">
                                        <?=$transaccion->idordenservicio?>
                                    </td>
                                    <td class="orders-areadestino">
                                        <?=$transaccion->area_destino?>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?=base_url('Transaccion/editar/'.$transaccion->Id_transaccion)?>" class="dropdown-item">
                                                    Editar
                                                </a>
                                                <a href="<?=base_url('Transaccion/eliminar/'.$transaccion->Id_transaccion)?>" class="dropdown-item">
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
