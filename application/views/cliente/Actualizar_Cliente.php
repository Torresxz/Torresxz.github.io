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
                        <?=form_open('cliente/clientes_editar/'.$usuario->usuario_id,'',array('id_token' => $usuario->usuario_id))?>
                        <td>
                            <h3 style="text-align: left;">Datos Personales</h3>
                        </td>
                        <div class="form-group">

                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Nombre
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=$usuario->nombre?>">
                                    <?=form_error('input_nombre')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Apellidos
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_apellidos" value="<?=$usuario->apellidos?>">
                                    <?=form_error('input_apellidos')?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <td>
                                <h3 style="text-align: left;">Domicilio completo</h3>
                            </td>
                            <div class="form-group">

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Municipio
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=$usuario->nombre?>">
                                        <?=form_error('input_nombre')?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Localidad
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_apellidos" value="<?=$usuario->apellidos?>">
                                        <?=form_error('input_apellidos')?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Calle
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=$usuario->nombre?>">
                                        <?=form_error('input_nombre')?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Número
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_apellidos" value="<?=$usuario->apellidos?>">
                                        <?=form_error('input_apellidos')?>
                                    </div>
                                </div>
                            </div>
                            <td>
                                <h3 style="text-align: left;">Contacto</h3>
                            </td>
                            <div class="form-group">

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Telefono
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=$usuario->nombre?>">
                                        <?=form_error('input_nombre')?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Correo
                                        </label>
                                        <input type="email" class="form-control text-muted" name="input_correo" value="<?=$usuario->email?>" readonly>
                                        <?=form_error('input_correo')?>
                                    </div>
                                </div>
                            </div>
                            <td>
                                <h3 style="text-align: left;">Datos de encargado</h3>
                            </td>
                            <div class="form-group">

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Nombre
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_nombre" value="<?=$usuario->nombre?>">
                                        <?=form_error('input_nombre')?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Apellidos
                                        </label>
                                        <input type="text" class="form-control form-control-lg" name="input_apellidos" value="<?=$usuario->apellidos?>">
                                        <?=form_error('input_apellidos')?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <!-- Private project -->


                                    <div class="col-12 col-md-6">
                                        <!-- Private project -->

                                    </div> <!-- / .row -->
                                    <!-- Divider -->
                                    <hr class="">
                                    <!-- Buttons -->
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="<?=base_url('cliente/Cliente')?>" class="btn btn-outline-secondary">
                                        Cancelar
                                    </a>
                                    <?=form_close()?>
                                </div>
                            </div>
                            <!-- ========== /CONTENIDO ========== -->


                            <!-- ========== Base JS ========== -->
                            <?=$this->load->view('includes/base_js','',TRUE)?>
                            <!-- ========== /Base JS ========== -->

</body>
</html>