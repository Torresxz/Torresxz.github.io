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
                <div id="test-list" class="card" data-toggle="lists" data-options='{"valueNames": ["modulo-nombre","modulo-descripcion","modulo-URL","modulo-idordenservicio","modulo-idequipopatron"],"page":10,"pagination":"true"}'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Lista de documentos
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
                                        <a class="dropdown-item sort" data-sort="modulo-controlador" href="#!">
                                            Asc
                                        </a>
                                        <a class="dropdown-item sort" data-sort="modulo-controlador" href="#!">
                                            Desc
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="<?=base_url('documento/agregar_documento')?>"class="btn btn-primary btn-sm">
                                    Agregar Documento
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
                                    <a href="#" class="text-muted sort" data-sort="modulo-nombre">
                                        Nombre
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="modulo-descripcion">
                                        Descripcion
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="modulo-URL">
                                        Documento
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="modulo-idordenservicio">
                                        Orden servicio
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="modulo-idequipopatron">
                                        Equipo Patron
                                    </a>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach ($documento as $key => $modulo) { ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox table-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                                            <label class="custom-control-label" for="ordersSelectOne">
                                                &nbsp;
                                            </label>
                                        </div>
                                    </td>
                                    <td class="modulo-nombre">
                                        <?=$modulo->Nombre?>
                                    </td>
                                    <td class="modulo-descripcion">
                                        <?=$modulo->Descripcion?>
                                    </td>
                                    <td class="modulo-URL">
                                        <a href="<?php echo base_url()?>upload/documento/<?=$modulo->URL?>">Lecturas</a>
                                    </td>
                                    <td class="modulo-idordenservicio">
                                        <?=$modulo->idordenservicio?>
                                    </td>
                                    <td class="modulo-idordenservicio">
                                        <?=$modulo->e_descripcion?>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?=base_url('documento/editar_documento/'.$modulo->idarchivo)?>" class="dropdown-item">
                                                    Editar
                                                </a>
                                                <a href="<?=base_url('documento/documento_eliminar/'.$modulo->idarchivo)?>" class="dropdown-item">
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
        </div> <!-- / .row -->
    </div>
</div> <!-- / .main-content -->
<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
<!-- ========== /Base JS ========== -->
</body>
</html>