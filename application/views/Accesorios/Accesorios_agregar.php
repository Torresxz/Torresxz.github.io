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
          <div class="col-12 col-12 col-lg-12 col-xl-12">
            <!-- ========== CONTENIDO ========== -->
            <div class="card">
              <div class="card-body">
                <!-- Form -->
                <?=form_open('Accesorios/Accesorios_agregar')?>
                  <div class="form-group">
                    <label>
                      Id Accesorio
                    </label>
                    <input type="int" class="form-control" name="input_idaccesorios" value="<?=set_value('input_idaccesorios')?>">
                    <?=form_error('input_idaccesorios')?>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Descripcion
                        </label>
                        <input type="varchar" class="form-control form-control-lg" name="input_descripcionaccesorio" value="<?=set_value('input_descripcionaccesorio')?>">
                        <?=form_error('input_descripcionaccesorio')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Hora
                        </label>
                        <input type="time" class="form-control form-control-lg" name="input_hora" value="<?=set_value('input_hora')?>">
                        <?=form_error('input_hora')?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>
                      Status
                    </label>
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="form-control-input" id="switchOne"name="input_statussalida">
                    <label class ="custom-control-label" for="switchOne"></label>
                  </div>

                  </div>

                  <div class="form-group">
                    <label>
                      Fecha
                    </label>
                    <input type="date" class="form-control" name="input_fechasalida" value="<?=set_value('input_fechasalida')?>">
                    <?=form_error('input_fechasalida')?>
                  </div>

                  <div class="row">
                    <div class="col-12 col-md-6">

                      <!-- Private project -->
                      <div class="form-group">
                        <label class="mb-1">
                          Super Admin
                        </label>
                        <small class="form-text text-muted">
                          El Super Admin tendra acceso a todos los modulos y configuraciones del sistema.
                        </small>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchOne" name="input_admin">
                          <label class="custom-control-label" for="switchOne"></label>
                        </div>
                      </div>

                    </div>
                    <div class="col-12 col-md-6">

                      <!-- Warning -->
                      <div class="card bg-light border">
                        <div class="card-body">

                          <h4 class="mb-2">
                            <i class="fe fe-alert-triangle"></i> Warning
                          </h4>

                          <p class="small text-muted mb-0">
                            Once a project is made private, you cannot revert it to a public project.
                          </p>

                        </div>
                      </div>

                    </div>
                  </div> <!-- / .row -->
                  <!-- Divider -->
                  <hr class="">

                  <!-- Buttons -->
                  <button type="submit" class="btn btn-primary">
                    Guardar
                  </button>
                  <a href="<?=base_url('Accesorios/Accesorios')?>" class="btn btn-outline-secondary">
                    Cancelar
                  </a>
                <?=form_close()?>
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
