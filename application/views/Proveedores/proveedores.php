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
                <div id="test-list" class="card" data-toggle="lists" data-options='{"valueNames": ["orders-proveedor", "orders-rfc", "orders-telefono", "orders-fax", "orders-contacto", "orders-email"],"page":10,"pagination":"true"}'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Lista de proveedores                                </h4>
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
                                        <a class="dropdown-item sort" data-sort="orders-proveedor" href="#!">
                                            Asc
                                        </a>
                                        <a class="dropdown-item sort" data-sort="orders-proveedor" href="#!">
                                            Desc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="<?=base_url('proveedor/agregar_proveedor')?>"class="btn btn-primary btn-sm">
                                    Agregar proveedor
                                </a>
                                <a href="<?=base_url('proveedor/reporteproveedor')?>"class="btn btn-primary btn-sm">
                                    Imprimir reporte proveedores
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
                                            No.Proveedor:
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-proveedor">
                                        Proveedor:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-rfc">
                                        RFC:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-telefono">
                                        Teléfono:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-fax">
                                        Fax:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-contacto">
                                        Contacto:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-email">
                                        E-mail:
                                    </a>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach ($proveedores as $key => $proveedores) { ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox table-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                                            <label class="custom-control-label" for="ordersSelectOne">
                                                &nbsp;
                                            </label>
                                             <?=$proveedores->idproveedor?>

                                        </div>
                                    </td>
                                    <td class="orders-proveedor">
                                        <?=$proveedores->proveedor?>
                                    </td>
                                    <td class="orders-rfc">
                                        <?=$proveedores->rfc?>
                                    </td>
                                    <td class="orders-telefono">
                                        <?=$proveedores->telefono?>
                                    </td>
                                    <td class="orders-fax">
                                        <?=$proveedores->fax?>
                                    </td>
                                    <td class="orders-contacto">
                                        <?=$proveedores->contacto?>
                                    </td>
                                    </td>
                                    <td class="orders-email">
                                        <?=$proveedores->correo?>
                                    </td>

                                    <td class="orders-status">
                                        <div class="badge badge-pill">
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?=base_url('proveedor/editar_proveedor/'.$proveedores->idproveedor)?>" class="dropdown-item">
                                                    Editar
                                                </a>
                                                <a href="<?=base_url('proveedor/proveedores_eliminar/'.$proveedores->idproveedor)?>" class="dropdown-item">
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
