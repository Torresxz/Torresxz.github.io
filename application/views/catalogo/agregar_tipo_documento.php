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


              <!-- Form -->
              <?=form_open('catalogo/agregar_tipo_documento','class="mb-5"')?>
              <div class="form-group">
                  <label>
                      Descripción del Tipo Documento de la Empresa
                  </label>
                  <input type="text" class="form-control" name="input_descripcion" value="<?=set_value('input_descripcion')?>">
                  <?=form_error('input_descripcion')?>
              </div>

              <!-- Divider -->
              <hr class="">

              <!-- Buttons -->
              <button type="submit" class="btn btn-primary">
                  Guardar
              </button>
              <a href="<?=base_url('catalogo/tipo_documento')?>" class="btn btn-outline-secondary">
                  Cancelar
              </a>
              <?=form_close()?>

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