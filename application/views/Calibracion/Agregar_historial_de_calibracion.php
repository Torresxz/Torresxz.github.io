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
                    <?=form_open('Calibracion/Agregar_historial_de_calibracion')?>
                    <div class="form-group">
                        <label>
                            Historial de calibracion
                        </label>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>
                                        id FechaC
                                    </label>
                                    <input type="number" class="form-control form-control-lg" name="input_idfecha" value="<?=set_value('input_idfecha')?>">
                                    <?=form_error('input_idfecha')?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Fecha inicial
                                        </label>
                                        <input type="date" class="form-control form-control-lg" name="input_Fechain" value="<?=set_value('input_Fechain')?>">
                                        <?=form_error('input_Fechain')?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Fecha final
                                        </label>
                                        <input type="date" class="form-control form-control-lg" name="input_Fechafin" value="<?=set_value('input_Fechafin')?>">
                                        <?=form_error('input_Fechafin')?>
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
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            id equipo patron
                                        </label>
                                        <select class="form-control"  name="input_idequipopatron">
                                            <?php foreach($equipospatron as $key=> $equipospatron) {?>
                                                <option value= "<?= $equipospatron->idequipopatron?>" ><?= $equipospatron->idequipopatron?> </option>
                                            <?php } ?>

                                        </select>

                                        <?=form_error('input_idequipopatron')?>
                                    </div>
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
        <hr class="">
        <!-- Buttons -->
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
        <a href="<?=base_url('Calibracion/hcalibracion')?>" class="btn btn-outline-secondary">
            Cancelar
        </a>
        <?=form_close()?>
    </div>
</div>
<!-- ========== /CONTENIDO ========== -->
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