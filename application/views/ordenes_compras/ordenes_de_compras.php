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
                <div id="test-list" class="card" data-toggle="lists" data-options= '{"valueNames": ["orders-id", "orders-fecha", "orders-orden", "orders-revision", "orders-subtotal", "orders-iva", "orders-total", "orders-proveedor", "orders-facturar", "orders-entregar", "orders-formapago", "orders-entrega", "orders-garantia", "orders-cfdi", "orders-metodopago", "orders-status"],"page":10,"pagination":"true"}'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Lista de ordenes de compras                                </h4>
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
                                        <a class="dropdown-item sort" data-sort="orders-id" href="#!">
                                            Asc
                                        </a>
                                        <a class="dropdown-item sort" data-sort="orders-id" href="#!">
                                            Desc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="<?=base_url('ordencompra/agregar_ordendecompra')?>"class="btn btn-primary btn-sm">
                                    Agregar orden de compra
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
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-id">
                                        No.Orden de Compra:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-fecha">
                                        Fecha:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-orden">
                                        No.Orden:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-revision">
                                        No.Revision:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-subtotal">
                                        Subtotal:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-iva">
                                        IVA:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-total">
                                        Total:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-proveedor">
                                        Proveedor:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-facturar">
                                        Facturar:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-entregar">
                                        Entregar:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-formapago">
                                        Forma de Pago:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-entrega">
                                        Tiempo de Entrega:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-garantia">
                                        Garantia:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-cfdi">
                                        CFDI:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-metodopago">
                                        Metodo de Pago:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="productos-compras">
                                        Productos de la orden de compra
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Estatus:
                                    </a>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach ($ordencompra as $key => $ordencompra) { ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox table-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                                            <label class="custom-control-label" for="ordersSelectOne">
                                                &nbsp;
                                            </label>
                                        </div>
                                    </td>
                                    <td class="orders-id">
                                        <?=$ordencompra->idordencompra?>
                                    </td>
                                    <td class="orders-fecha">
                                        <?=$ordencompra->Fecha?>
                                    </td>
                                    <td class="orders-orden">
                                        <?=$ordencompra->numeroorden?>
                                    </td>
                                    <td class="orders-revision">
                                        <?=$ordencompra->numerorevision?>
                                    </td>
                                    <td class="orders-subtotal">
                                        <?=$ordencompra->subtotal?>
                                    </td>
                                    <td class="orders-iva">
                                        <?=$ordencompra->iva?>
                                    </td>
                                    <td class="orders-total">
                                        <?=$ordencompra->total?>
                                    </td>
                                    <td class="orders-proveedor">
                                        <?=$ordencompra->proveedor?>
                                    </td>
                                    <td class="orders-facturar">
                                        <?=$ordencompra->facturar?>
                                    </td>
                                    <td class="orders-entregar">
                                        <?=$ordencompra->entregar?>
                                    </td>
                                    <td class="orders-formapago">
                                        <?=$ordencompra->formapago?>
                                    </td>
                                    <td class="orders-tiempoentrega">
                                        <?=$ordencompra->tiempoentrega?>
                                    </td>
                                    <td class="orders-garantia">
                                        <?=$ordencompra->garantia?>
                                    </td>
                                    <td class="orders-cfdi">
                                        <?=$ordencompra->cfdi?>
                                    </td>
                                    <td class="orders-metodopago">
                                        <?=$ordencompra->metodopago?>
                                    </td>
                                    <td class="productos-compras">
                                        <?php foreach ($ordencompra->productos as $keyy => $producto) {
                                            echo '<span class="badge badge-soft-secondary">'.$producto->descripcionproducto.'</span> ';
                                        }?>
                                    </td>
                                    <td class="orders-status">
                                        <div class="badge <?php if($ordencompra->estatusorden=='Aprobada'){ echo 'badge-success'; }else{ echo 'badge-secondary'; }  ?>">
                                            <?=$ordencompra->estatusorden?>
                                        </div>
                                    </td>


                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?=base_url('ordencompra/editar_ordendecompra/'.$ordencompra->idordencompra)?>" class="dropdown-item">
                                                    Editar
                                                </a>
                                                <a href="<?=base_url('ordencompra/ordencompra_eliminar/'.$ordencompra->idordencompra)?>" class="dropdown-item">
                                                    Eliminar
                                                </a>
                                                <a href="<?=base_url('ordencompra/reporte_ordencompra/'.$ordencompra->idordencompra)?>" class="dropdown-item">
                                                    Pdf
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