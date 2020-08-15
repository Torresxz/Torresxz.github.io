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
            <div class="col-12 col-12 col-lg-12 col-xl-12"
                <!-- ========== CONTENIDO ========== -->
                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <?=form_open('orden/guardar_orden_de_servicio')?>
                        <div class="form-group">
                            <label>
                              Orden de servicio
                            </label>
                              <div class="row">
                              <div class="col-12 col-md-4">
                                  <div class="form-group">
                                      <label>
                                        id orden de servicio
                                      </label>
                                      <input type="number" class="form-control form-control-lg" name="input_idservicio" value="">
                                        <?=form_error('input_idservicio')?>
                                  </div>
                              </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>
                                          observaciones
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_observaciones" value="">
                                          <?=form_error('input_observaciones')?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>
                                            ID_cotizacion
                                        </label>
                                        <select class="form-control"  name="input_idcotizacion">
                               <?php foreach($cotizacion as $key=> $cotizacion) {?>
                               <option value= "<?= $cotizacion->Idcotizacion?>" ><?= $cotizacion->Idcotizacion?> </option>
                             <?php } ?>

                           </select>

                          <?=form_error('input_idcotizacion')?>
                                    </div>
                                </div>


                            </div>




                </div>
                                                  <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label>
                                                    Fecha de programacion
                                                </label>
                                                <input type="date" class="form-control form-control-lg" name="input_Fecha" value="">
                                                  <?=form_error('input_Fecha')?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label>
                                                  estatus de orden de servicio
                                                  <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="switchOne" name="input_sodservicio">
                                                    <label class="custom-control-label" for="switchOne"></label>
                                                  </div>
                                            </div>

                                        </div>
                                      
                                    </div>
                            </div>
</div>
</div>

                         <!-- / .row -->
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('orden/orden')?>" class="btn btn-outline-secondary">
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
