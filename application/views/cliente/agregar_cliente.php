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
                    <h3>Datos personales</h3>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=set_value('input_nombre')?>">
                            <?=form_error('input_nombre')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Apellido Paterno
                            </label>
                            <input type="text" class="form-control form-control-lg" name="input_apellidoPaterno" value="<?=set_value('input_apellidoPaterno')?>">
                            <?=form_error('input_apellidoPaterno')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Apellido Materno
                            </label>
                            <input type="text" class="form-control form-control-lg" name="input_apellidoMaterno" value="<?=set_value('input_apellidoMaterno')?>">
                            <?=form_error('input_apellidoMaterno')?>
                        </div>
                    </div>
                </div>


            </div>

                <div class="card">
                    <div class="card-body">
                        <h3>Domicilio</h3>
                        <div class="form-group">
                            <div class="row">

                        <!-- Form -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Municipio
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_municipio" value="<?=set_value('input_municipio')?>">
                                <?=form_error('input_municipio')?>

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Localidad
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_localidad" value="<?=set_value('input_localidad')?>">
                                <?=form_error('input_localidad')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>
                                    Asentamiento
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_asentamiento" value="<?=set_value('input_asentamiento')?>">
                                <?=form_error('input_asentamiento')?>

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">

                                <label>
                                    Número Int
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_nInt" value="<?=set_value('nInt')?>">
                                <?=form_error('input_nInt')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">

                                <label>
                                    Número Exterior
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_nExt" value="<?=set_value('nExt')?>">
                                <?=form_error('input_nExt')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">

                                <label>
                                    Calle
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_calle" value="<?=set_value('calle')?>">
                                <?=form_error('input_calle')?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">

                                <label>
                                    Código Postal
                                </label>
                                <input type="text" class="form-control form-control-lg" name="input_CP" value="<?=set_value('CP')?>">
                                <?=form_error('input_CP')?>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card-body">
                        <h3>Contacto</h3>
                        <div class="form-group">
                            <div class="row">

                                <!-- Form -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            E-mail
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_E-mail value="<?=set_value('input_E-mail')?>">
                                        <?=form_error('input_E-mail')?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Telefono
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_telefono" value="<?=set_value('input_telefono')?>">
                                        <?=form_error('input_telefono')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            <div class="card">
                <div class="card-body">
                    <h3>Encargado</h3>
                    <div class="form-group">
                        <div class="row">

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Nombre
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=set_value('input_nombre')?>">
                                    <?=form_error('input_nombre')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Apellido Paterno
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_apellidoPaterno" value="<?=set_value('input_apellidoPaterno')?>">
                                    <?=form_error('input_apellidoPaterno')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Apellido Materno
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_apellidoMaterno" value="<?=set_value('input_apellidoMaterno')?>">
                                    <?=form_error('input_apellidoMaterno')?>
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