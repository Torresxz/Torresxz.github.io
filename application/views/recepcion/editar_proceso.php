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
                <?=form_open('Recepcion/procesos_editar/'.$recepcion->idrecepcion)?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Fecha
                                </label>
                                <input type="text" class="form-control" placeholder="Selecciona una fecha..." name="input_fecha" required="required" data-toggle="flatpickr" value="<?=$recepcion->fecha?>">
                                <?=form_error('input_fecha')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Entrega
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_entrega" value="<?=$recepcion->entrega?>">
                                <?=form_error('input_entrega')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Tipo de equipo
                                </label>
                                <select class="form-control" data-toggle="select" name="equipos">
                                    <?php foreach ($equipoordenservicio  as $key => $equipo) { ?>
                                        <option value="<?php echo $equipo->idequipo?>" <?php if($equipo->idequipo == $recepcion->equipoordenservicio_idequipo){echo "selected";} ?>><?php echo $equipo->equipo?> </option>
                                    <?php }?>
                                </select>
                                <?=form_error('equipos')?>
                            </div>
                        </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Número del equipo de la orden de servicio
                            </label>
                            <select  class="form-control" data-toggle="select" name="idorden">
                                <?php foreach ($equipoordenservicio as $key => $ordenservicio) { ?>
                                    <option value="<?php echo $ordenservicio->idordenservicio?>" <?php if($ordenservicio->idordenservicio == $recepcion->equipoordenservicio_idordenservicio){echo "selected";} ?>><?php echo $ordenservicio->idordenservicio?> </option>
                                <?php }?>
                            </select>
                            <?=form_error('idorden')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Hora de entrega
                            </label>
                            <input type="time" class="form-control form-control-lg" name="input_hora" value="<?=$recepcion->hora?>">
                            <?=form_error('input_hora')?>
                        </div>
                        <!-- Divider -->
                        <hr class="">
                        <!-- Buttons -->
                        <button  type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('Recepcion/procesos')?>" class="btn btn-outline-secondary">
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