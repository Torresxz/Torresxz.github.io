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
                <?=form_open('Transaccion/agregar')?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Fecha de entrega
                                    </label>
                                    <input type="text" class="form-control" placeholder="Selecciona una fecha..." name="input_fecha" required="required" data-toggle="flatpickr" value="<?=set_value('input_fecha')?>">
                                </div>
                                <div class="form-group">
                                    <label>
                                       Hora de entrega
                                    </label>
                                    <input type="time" class="form-control form-control-lg" name="input_hora" value="<?=set_value('input_hora')?>">
                                    <?=form_error('input_hora')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-group">
                                    Confirmación
                                </label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switchOne" name="input_con">
                                    <label class="custom-control-label" for="switchOne"></label>
                                </div>
                            </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Area
                                        </label>
                                        <select class="form-control" data-toggle="select" name="areaenvia">
                                            <?php foreach ($areas_envia  as $key => $areas_envia) { ?>
                                                <option value="<?=$areas_envia->idarea?>"><?=$areas_envia->nombrearea?></option>
                                            <?php } ?>
                                        </select>
                                        <?=form_error('areaenvia')?>
                                    </div>
                            </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                           Orden de servicio
                                        </label>
                                        <select class="form-control" data-toggle="select" name="orden">
                                            <?php foreach ($ordenservicio  as $key => $orden) { ?>
                                                <option value="<?=$orden->idordenservicio?>"><?=$orden->idordenservicio?></option>
                                            <?php } ?>
                                        </select>
                                        <?=form_error('orden')?>
                                    </div>
                                </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Area de destino
                                    </label>
                                    <select class="form-control" data-toggle="select" name="areadestino">
                                        <?php foreach ($areas_destino  as $key => $areas_destino) { ?>
                                            <option value="<?=$areas_destino->idarea?>"><?=$areas_destino->nombrearea?></option>
                                        <?php } ?>
                                    </select>
                                    <?=form_error('areadestino')?>
                                </div>
                            </div>
                    </div>
                        <div class="col-12 col-md-12">
                            <!-- Divider -->
                            <hr class="">
                            <!-- Buttons -->
                            <button  type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                            <a href="<?=base_url('Transaccion/transacciones')?>" class="btn btn-outline-secondary">
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