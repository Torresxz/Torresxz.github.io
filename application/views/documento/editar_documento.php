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
                        <?=form_open_multipart('documento/editar_documento/'.$archivo->idarchivo)?>

                        <!--Nombre del documento-->
                        <div class="form-group">
                            <label>
                                Nombre del Documento
                            </label>
                            <input type="text" class="form-control" name="input_nom" value="<?php echo $archivo->Nombre;?>">
                            <?=form_error('input_nom')?>
                        </div>

                        <!--Descripcion-->
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <input type="text" class="form-control" name="input_desc" value="<?php echo $archivo->Descripcion;?>">
                            <?=form_error('input_desc')?>
                        </div>

                        <!--area de seleccion de archivo-->
                        <div class="form-group">
                            <label>
                                Documento
                            </label>
                            <?php echo form_open_multipart('documento/editar_documento');?>
                            <input type="file" class="form-control filestyle" name="userfile" id="userfile" data-buttontext="Archivo" value="<?php echo $archivo->URL;?>">
                            <span class="help-blok"><small>Tamaño menor a 2Mb (Excel)</small></span>
                            <?=form_error('input_URL')?>
                        </div>

                        <!--llave foranea de la tabla orden servicio-->
                        <div class="form-group">
                            <label>
                                Orden Servicio:
                            </label>
                            <select class="form-control" name="input_ord" value="<?php echo $archivo->idordenservicio;?>">
                            <?php foreach ($orden as $key => $archivoghg){ ?>
                                <option value="<?php echo $archivoghg->idordenservicio;?>" <?php if($archivo->idordenservicio == $archivoghg->idordenservicio){echo "selected";} ?>><?php echo $archivoghg->fechaprogramacion;?></option>
                            <?php }?>
                            </select>
                        </div>


                        <!--llave foranea de la tabla equipo patron-->
                        <div class="form-group">
                            <label>
                                Equipo Patron:
                            </label>
                            <select class="form-control" name="input_pat" value="<?php echo $archivo->idequipopatron;?>">
                                <?php foreach ($equipo as $key => $archivoghg){ ?>
                                    <option value="<?php echo $archivoghg->idequipopatron;?>" <?php if($archivo->idequipopatron == $archivoghg->idequipopatron){echo "selected";} ?>><?php echo $archivoghg->e_marca;?></option>
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