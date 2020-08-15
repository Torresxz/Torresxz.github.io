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
                <div id="test-list" class="card" data-toggle="lists" data-options='{"valueNames": ["modulo-descripcion","modulo-controlador","modulo-funciones","modulo-menu","modulo-icono","modulo-estado"],"page":10,"pagination":"true"}'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Lista de historial calibracion
                                </h4>
                            </div>
                            <div class="col-auto">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <!-- Toggle -->
                                    <a href="#" class="small text-muted dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Información
                                    </a>
                                    <!-- Menu -->
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 20px, 0px);">
                                        <a class="dropdown-item sort" data-sort="Calibracion-controlador" href="#!">
                                            Asc
                                        </a>
                                        <a class="dropdown-item sort" data-sort="Calibracion-controlador" href="#!">
                                            Desc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="<?=base_url('Calibracion/Agregar_historial_de_calibracion')?>"class="btn btn-primary btn-sm">
                                    Agregar historial de calibracion
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
                                    <a href="#" class="text-muted sort" data-sort="Calibracion-descripcion">
                                        id_Fecha
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="Calibracion-controlador">
                                        Fecha inicial
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="Calibracion-funciones">
                                        Fecha Final
                                    </a>
                                </th>

                                <th>
                                    <a href="#" class="text-muted sort" data-sort="Calibracion-menu">
                                        Hora
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="Calibracion-icono">
                                        Idequipopatron
                                    </a>
                                </th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach ($Calibracion as $key => $Calibracion) { ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox table-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                                            <label class="custom-control-label" for="ordersSelectOne">
                                                &nbsp;
                                            </label>
                                        </div>
                                    </td>

                                    <td class="modulo-descripcion">
                                        <?=$Calibracion->id_FechaC?>
                                    </td>
                                    <td class="modulo-controlador">
                                        <?=$Calibracion->Fecha_incial?>
                                    </td>
                                    <td class="modulo-funciones">
                                        <?=$Calibracion->Fecha_Final?>
                                    </td>
                                    <td class="modulo-menu">
                                        <?=$Calibracion->Hora?>
                                    </td>
                                    <td class="modulo-icono">
                                        <?=$Calibracion->idequipopatron?>
                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?=base_url('Calibracion/Editar_historial_de_calibracion/'.$Calibracion->id_FechaC)?>" class="dropdown-item">
                                                    Editar
                                                </a>
                                                <a href="<?=base_url('Calibracion/eliminar_calibracion/'.$Calibracion->id_FechaC)?>" class="dropdown-item">
                                                    Eliminar
                                                </a>
                                                <a href="<?=base_url('Calibracion/PDF_calibracion/'.$Calibracion->id_FechaC)?>" class="dropdown-item">
                                                    Reporte
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>



                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="8">
                                    <ul class="pagination"></ul>
                                </td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- ========== /CONTENIDO ========== -->

            </div>
        </div>

        º

    </div>
</div> <!-- / .row -->
</div>
</div> <!-- / .main-content -->
<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
<!-- ========== /Base JS ========== -->
</body>
</html>
