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
                        <?=form_open('proveedor/agregar_proveedor')?>
                        <div class="form-group">
                            <label>
                                Proveedor:
                            </label>
                            <input type="text" class="form-control" name="input_nombre" value="<?=set_value('input_nombre')?>">
                            <?=form_error('input_nombre')?>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        RFC:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_rfc" value="<?=set_value('input_rfc')?>">
                                    <?=form_error('input_rfc')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Teléfono:
                                    </label>
                                    <input type="tel" class="form-control form-control-lg" name="input_telefono" value="<?=set_value('input_telefono')?>">
                                    <?=form_error('input_telefono')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Fax:
                                    </label>
                                    <input type="tel" class="form-control form-control-lg" name="input_fax" value="<?=set_value('input_fax')?>">
                                    <?=form_error('input_fax')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Contacto:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_contacto" value="<?=set_value('input_contacto')?>">
                                    <?=form_error('input_contacto')?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>
                                Correo:
                            </label>
                            <input type="email" class="form-control form-control-lg" name="input_email" value="<?=set_value('input_correo')?>">
                            <?=form_error('input_correo')?>
                        </div>


                        <div class="row">
                            <div class="col-12 col-md-6">

                                <!-- Private project -->


                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Warning -->

                            </div>
                        </div> <!-- / .row -->
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('proveedor/proveedores')?>" class="btn btn-outline-secondary">
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
