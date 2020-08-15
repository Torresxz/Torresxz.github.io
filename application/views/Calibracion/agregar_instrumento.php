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
            <div class="col-12 col-lg-12 col-xl-12">
                <!-- ========== CONTENIDO ========== -->
                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <?=form_open('calibracion/agregar_instrumento')?>
                        <div class="form-group">
                            <label>
                                Descripción del Instrumento
                            </label>
                            <input type="text" class="form-control" name="input_descripcion" value="<?=set_value('input_descripcion')?>">
                            <?=form_error('input_descripcion')?>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Alcance
                                    </label>
                                    <input type="text" class="form-control " name="input_alcance" value="<?=set_value('input_alcance')?>">
                                    <?=form_error('input_alcance')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Marca del Instrumento
                                    </label>
                                    <input type="text" class="form-control " name="input_marca" value="<?=set_value('input_marca')?>">
                                    <?=form_error('input_marca')?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Modelo del instrumento
                                    </label>
                                    <input type="text" class="form-control " name="input_modelo" value="<?=set_value('input_modelo')?>">
                                    <?=form_error('input_modelo')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Serie
                                    </label>
                                    <input type="text" class="form-control " name="input_serie" value="<?=set_value('input_serie')?>">
                                    <?=form_error('input_serie')?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Informe del Instrumento
                                    </label>
                                    <input type="text" class="form-control " name="input_informe" value="<?=set_value('input_informe')?>">
                                    <?=form_error('input_informe')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Insertidumbre
                                    </label>
                                    <input type="text" class="form-control " name="input_insertidumbre" value="<?=set_value('input_insertidumbre')?>">
                                    <?=form_error('input_insertidumbre')?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Fecha de Vencimiento
                                    </label>
                                    <input type="date" data-toggle="flatpickr" class="form-control " name="input_vencimiento" value="<?=set_value('input_vencimiento')?>">
                                    <?=form_error('input_vencimiento')?>
                                </div>
                            </div>

                        </div>

                        <!-- Divider -->
                        <hr class="">
                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('calibracion/Calibraciones')?>" class="btn btn-outline-secondary">
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
