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
               <?=form_open('Accesorios/Accesorios_editar/'.$accesorios->idaccesorios)?>

                  <div class="row">
                    <div class="col-12 col-md-6">

                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Descripcion
                        </label>
                        <input type="varchar" class="form-control form-control-lg" name="input_descripcionaccesorio" value="<?=$accesorios->descripcionaccesorio?>">
                        <?=form_error('input_descripcionaccesorio')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Hora
                        </label>
                        <input type="time" class="form-control form-control-lg" name="input_hora" value="<?=$accesorios->hora?>">
                        <?=form_error('input_hora')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Status
                        </label>
                          <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchOne"name="input_statussalida">
                        <label class ="custom-control-label" for="switchOne"></label>
                          </div>
                      </div>
                    </div>  <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>
                            Fecha
                          </label>
                          <input type="date" class="form-control form-control-lg" name="input_fechasalida" value="<?=$accesorios->fechasalida?>">
                          <?=form_error('input_fechasalida')?>
                        </div>
                      </div>
                  </div>


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
