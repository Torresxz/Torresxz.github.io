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
                        <?=form_open('trabajo/areas_editar/'.$trabajo->idarea)?>
                        <div class="form-group">
                            <label>
                                Nombre del àrea de trabajo:
                            </label>
                            <input type="text" class="form-control" name="input_nombre" value="<?php echo $trabajo->nombrearea;?>">
                            <?=form_error('input_nombre')?>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                       Descripcion del àrea de trabajo:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_descripcion" value="<?php echo $trabajo->descripcionarea;?>">
                                    <?=form_error('input_descripcion')?>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                           Guardar 
                        </button>
                        <a href="<?=base_url('trabajo/trabajo')?>" class="btn btn-outline-secondary">
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
