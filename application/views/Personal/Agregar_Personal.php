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
          <div class="col-12 col-12 col-lg-1 col-xl-12">
            <!-- ========== CONTENIDO ========== -->
            <div class="card">
              <div class="card-body">
                <!-- Form -->
                <?=form_open('sistema/modulos_agregar')?>
                  <div class="form-group">
                    <label>
                      Nombre
                    </label>
                    <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=set_value('input_nombre')?>">
                    <?=form_error('input_nombre')?>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Apellido Paterno
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_paterno" value="<?=set_value('input_paterno')?>">
                        <?=form_error('input_paterno')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Apellido Materno 
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_materno" value="<?=set_value('input_materno')?>">
                        <?=form_error('input_materno')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                           Puesto
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_puesto" value="<?=set_value('input_puesto')?>">
                        <?=form_error('input_puesto')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                           Fecha de Nacimiento
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_Fecha" value="<?=set_value('input_Fecha')?>">
                        <?=form_error('input_Fecha')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                           Apellido Materno 
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_materno" value="<?=set_value('input_controlador')?>">
                        <?=form_error('input_controlad')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                           Localidad 
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_localidad" value="<?=set_value('input_localidad')?>">
                        <?=form_error('input_localidad')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Calle
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_Calle" value="<?=set_value('input_Calle')?>">
                        <?=form_error('input_Calle')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                           Numero
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_numero" value="<?=set_value('input_numero')?>">
                        <?=form_error('input_numero')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                           Telefono
                        </label>
                        <input type="text" class="form-control form-control-lg" name="input_telefono" value="<?=set_value('input_telefono')?>">
                        <?=form_error('input_telefono')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                  <!-- Divider -->
                  <hr class="">
                  <!-- Buttons -->
                  <button type="submit" class="btn btn-primary">
                    Guardar
                  </button>
                  <a href="<?=base_url('sistema/modulos')?>" class="btn btn-outline-secondary">
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
6
  </body>
</html>