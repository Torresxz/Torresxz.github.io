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
                        <?=form_open('sistema/usuarios_agregar')?>
                        <div class="form-group">
                            <label>
                                Fecha Calibracion
                            </label>

                        <?=form_open('sistema/usuarios_agregar')?>
                        <div class="form-group">
                            <label>
                                Fecha Inicial:
                            </label>
                            <input type="Text" class="form-control" name="dateI" value="<?=set_value('input_tipo')?>">
                            <?=form_error('input_tipo')?>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha Final:
                            </label>
                            <input type="Text" class="form-control" name="encargado" value="<?=set_value('input_tipo')?>">
                            <?=form_error('input_tipo')?>
                        </div>

                            <label>
                                Hora
                            </label>
                            <input type="Text" class="form-control" name="time" value="<?=set_value('input_tipo')?>">
                            <?=form_error('input_tipo')?>
                        </div>
                    </div>
                        </div> <!-- / .row -->
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('sistema/usuarios')?>" class="btn btn-outline-secondary">
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