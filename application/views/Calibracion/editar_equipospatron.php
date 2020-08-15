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

                <!-- Form -->
                <?=form_open('calibracion/calibracion_editar/'.$equipospatron->idequipopatron)?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Descripcion del instrumento
                                </label>
                                <input type="text" class="form-control"  name="input_descripcion" required="required"  value="<?=$equipospatron->e_descripcion?>">
                                <?=form_error('input_descripcion')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Alcance
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_alcance" value="<?=$equipospatron->e_alcance?>">
                                <?=form_error('input_alcance')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Marca del instrumento
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_marca" value="<?=$equipospatron->e_marca?>">
                                <?=form_error('input_marca')?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Modelo del instrumento
                            </label>
                            <input type="text" class="form-control form-control-lg" name="input_modelo" value="<?=$equipospatron->e_modelo?>">
                            <?=form_error('input_modelo')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Serie
                            </label>
                            <input type="text" class="form-control form-control-lg" name="input_serie" value="<?=$equipospatron->e_serie?>">
                            <?=form_error('input_serie')?>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Informe del instrumento
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_informe" value="<?=$equipospatron->e_informe?>">
                                <?=form_error('input_informe')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Insertidumbre
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_insertidumbre" value="<?=$equipospatron->e_insertidumbre?>">
                                <?=form_error('input_insertidumbre')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Fecha de vencimiento
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_vencimiento" data-toggle="flatpickr" value="<?=$equipospatron->e_vence?>">
                                <?=form_error('input_vencimiento')?>
                            </div>



                            <!-- Divider -->
                            <hr class="">
                            <!-- Buttons -->
                            <button  type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                            <a href="<?=base_url('Calibracion/Calibraciones')?>" class="btn btn-outline-secondary">
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
