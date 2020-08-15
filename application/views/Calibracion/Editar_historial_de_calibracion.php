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
                        <?=form_open ('Calibracion/Editar_historial_de_calibracion/'.$Calibracion->id_FechaC)?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Historial de calibracion
                                        </label>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        id FechaC
                                                    </label>
                                                    <input type="number" class="form-control" name="input_idservicio"  step="0.01" min="0"  value="<?=$Calibracion->id_FechaC?>">
                                                    <?=form_error('input_idfecha')?>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Fecha inicial
                                                    </label>
                                                    <input type="date" class="form-control form-control-lg" name="input_Fechain" value="<?=$Calibracion->Fecha_incial?>">
                                                    <?=form_error('input_Fechain')?>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Fecha Final
                                                    </label>
                                                    <input type="date" class="form-control form-control-lg" name="input_Fechafin" value="<?=$Calibracion->Fecha_Final?>">
                                                    <?=form_error('input_Fechafin')?>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Hora
                                                    </label>
                                                    <input type="time" class="form-control form-control-lg" name="input_hora" value="<?=$Calibracion->Hora?>">
                                                    <?=form_error('input_hora')?>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        Id Equipo Patron
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
        </div>
    </div> <!-- / .row -->
</div>
</div> <!-- / .main-content -->

<!-- ========== Base JS ========== -->
<?=$this->load->view('includes/base_js','',TRUE)?>
<!-- ========== /Base JS ========== -->

</body>
</html>