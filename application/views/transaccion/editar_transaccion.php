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
                <?=form_open('Transaccion/editar/'.$transaccion_proceso->Id_transaccion)?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Fecha de Traspaso de procesos
                                </label>
                                <input type="text" class="form-control" placeholder="Selecciona una fecha..." name="input_fecha" required="required" data-toggle="flatpickr" value="<?=$transaccion_proceso->Fecha_entrega?>">
                                <?=form_error('input_fecha')?>
                            </div>
                            <div class="form-group">
                                <label>
                                    Hora Entrega
                                </label>
                                <input type="time" class="form-control form-control-lg" name="input_hora" value="<?=$transaccion_proceso->Hora_entrega?>">
                                <?=form_error('input_hora')?>
                            </div>
                        </div>
                            <div class="col-12 col-md-6">
                                <label class="form-group">
                                    Confirmación
                                </label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switchOne" name="input_con" <?=( $transaccion_proceso->Confirmacion == 1 ) ? 'checked' : '' ?> >
                                    <label class="custom-control-label" for="switchOne"></label>
                                </div>
                            </div>
                        <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Area
                                    </label>
                                    <select class="form-control" data-toggle="select" name="areaenvia">
                                        <?php foreach ($areas_trabajo  as $key => $area) { ?>
                                            <option value="<?php echo $area->idarea?>" <?php if($area->idarea == $transaccion_proceso->idareaenvia){echo "selected";} ?>><?php echo $area->nombrearea?> </option>
                                        <?php }?>
                                    </select>
                                    <?=form_error('areas')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Orden de servicio
                                    </label>
                                    <select class="form-control" data-toggle="select" name="orden_id">
                                        <?php foreach ($ordenservicio  as $key => $ordens) { ?>
                                            <option value="<?php echo $ordens->idordenservicio;?>" <?php if($ordens->idordenservicio == $transaccion_proceso->idordenservicio){echo "selected";} ?>><?php echo $ordens->idordenservicio?> </option>
                                        <?php }?>
                                    </select>
                                    <?=form_error('orden_id')?>
                                </div>
                            </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Area de destino
                                </label>
                                <select class="form-control" data-toggle="select" name="areadestino">
                                    <?php foreach ($areas_trabajo  as $key => $area) { ?>//controlador
                                        <option value="<?php echo $area->idarea?>" <?php if($area->idarea == $transaccion_proceso->idareadestino){echo "selected";} ?>><?php echo $area->nombrearea?> </option>
                                    <?php }?>
                                </select>
                                <?=form_error('aread')?>
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