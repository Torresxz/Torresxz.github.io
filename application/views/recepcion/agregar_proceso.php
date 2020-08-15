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
                <?=form_open('Recepcion/Procesos_agregar')?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-md-6">

                                <div class="form-group">
                                    <label>
                                        Fecha
                                    </label>
                                    <input type="text" class="form-control" placeholder="Selecciona una fecha..." name="input_fecha" required="required" data-toggle="flatpickr" value="<?=set_value('input_fecha')?>">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Entrega
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_entrega" value="<?=set_value('input_entrega')?>">
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
                                                <option value="<?=$equipo->idequipo?>"><?=$equipo->equipo?></option>
                                            <?php } ?>
                                        </select>
                                        <?=form_error('equipos')?>
                                    </div>
                                </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Orden de servicio
                                    </label>
                                    <select  class="form-control" data-toggle="select" name="idorden">
                                        <?php foreach ($equipoordenservicio as $key => $ordenservicio) { ?>//controlador
                                            <option value="<?=$ordenservicio->idordenservicio?>"><?=$ordenservicio->idordenservicio?></option>
                                        <?php }?>
                                    </select>
                                    <?=form_error('idorden')?>
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