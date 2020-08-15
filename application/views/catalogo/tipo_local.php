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
<div class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- ========== MENU ========== -->
                <?=$this->load->view('includes/navegacion','',TRUE)?>
                <!-- ========== /MENU ========== -->
            </div>
            <div class="col-12 col-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
            <!-- ========== CONTENIDO ========== -->

              <div class="card" data-toggle="lists" data-options='{"valueNames": ["orders-order", "orders-product", "orders-date", "orders-total", "orders-status", "orders-method"]}'>
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
                          <div class="col-auto">
                              <!-- Button -->
                              <a href="<?=base_url('catalogo/agregar_tipo_local')?>"class="btn btn-primary btn-sm">
                                  Agregar Tipo del Local
                              </a>
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
                                  <a href="#" class="text-muted sort" data-sort="orders-order">
                                      Numero del Tipo de Local
                                  </a>
                              </th>
                              <th>
                                  <a href="#" class="text-muted sort" data-sort="orders-product">
                                      Descripción
                                  </a>
                              </th>

                              <th>
                                  <a href="#" class="text-muted sort" data-sort="orders-opcion">
                                      Opciones
                                  </a>
                              </th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody class="list">
                          <?php foreach ($tipo_local as $key => $tipo_local) { ?>
                              <tr>
                                  <td>
                                      <div class="custom-control custom-checkbox table-checkbox">
                                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                                          <label class="custom-control-label" for="ordersSelectOne">
                                              &nbsp;
                                          </label>
                                      </div>
                                  </td>
                                  <td class="orders-order">
                                      <?=$tipo_local->idTipoLocal?>
                                  </td>
                                  <td class="orders-product">
                                      <?=$tipo_local->Descripcion?>
                                  </td>

                                  <td class="text-right">
                                      <div class="dropdown">
                                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fe fe-more-vertical"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right">
                                              <a href="editar_tipo_local/<?=$tipo_local->idTipoLocal?>" class="dropdown-item">
                                                  Editar
                                              </a>
                                              <a href="eliminar_tipo_local/<?=$tipo_local->idTipoLocal?>" class="dropdown-item">
                                                  Eliminar
                                              </a>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                          <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>


            <!-- ========== /CONTENIDO ========== -->
                    </div>
                </div>
            </div>
        </div> <!-- / .row -->
    </div>
</div> <!-- / .main-content -->

<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
<!-- ========== /Base JS ========== -->
</body>
</html>