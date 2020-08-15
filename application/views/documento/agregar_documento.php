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
                        <?=form_open_multipart('documento/agregar_documento')?>

                        <!--area del nombre-->
                        <div class="form-group">
                            <label>
                                Nombre del Documento
                            </label>
                            <input type="text" class="form-control" name="input_nom" value="<?=set_value('input_nom')?>">
                            <?=form_error('input_nom')?>
                        </div>


                        <!--area de la descripcion-->
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <input type="text" class="form-control" name="input_desc" value="<?=set_value('input_desc')?>">
                            <?=form_error('input_desc')?>
                        </div>

                        <!--seleccion de archivo-->
                        <div class="form-group">
                            <label>
                                Documento
                            </label>
                            <?php echo form_open_multipart('Documento/agregar_documento');?>
                            <input type="file" class="form-control filestyle" name="userfile" id="userfile" data-buttontext="Archivo" value="<?=set_value('input_URL')?>">
                            <span class="help-blok"><small>Tamaño menor a 2Mb (Excel)</small></span>
                            <?=form_error('input_URL')?>
                        </div>

                        <!--llave foranea de la tabla orden servicio-->
                        <div class="form-group">
                            <label>
                                Orden Servicio:
                            </label>
                            <select class="form-control" name="input_ord">
                                <?php foreach ($orden as $key => $archivo){ ?>
                                <option value="<?php echo $archivo->idordenservicio;?>"><?php echo $archivo->fechaprogramacion;?></option>
                                <?php }?>
                            </select>
                        </div>

                        <!--llave foranea de la tabla equipo patron-->
                        <div class="form-group">
                            <label>
                                Equipo Patron:
                            </label>
                            <select class="form-control" name="input_pat">
                                <?php foreach ($equipo as $key => $archivo){ ?>
                                    <option value="<?php echo $archivo->idequipopatron;?>"><?php echo $archivo->e_marca;?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">

                                <!-- Private project -->
                                <div class="form-group">
                                    <label class="mb-1">
                                        Super Admin
                                    </label>
                                    <small class="form-text text-muted">
                                        El Super Admin tendra acceso a todos los modulos y configuraciones del sistema.
                                    </small>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switchOne" name="input_admin">
                                        <label class="custom-control-label" for="switchOne"></label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Warning -->
                                <div class="card bg-light border">
                                    <div class="card-body">

                                        <h4 class="mb-2">
                                            <i class="fe fe-alert-triangle"></i> Warning
                                        </h4>

                                        <p class="small text-muted mb-0">
                                            Once a project is made private, you cannot revert it to a public project.
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('documento')?>" class="btn btn-outline-secondary">
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