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
                        <?=form_open('producto/agregar_productos')?>
                        <div class="form-group">
                            <small class="form-text text-muted">
                                Datos del producto.
                            </small>
                            <div class="custom-control custom-switch">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                Descripción:
                            </label>
                            <textarea class="form-control" name="input_descriprod" value="<?=set_value('input_descriprod')?>"></textarea>
                            <?=form_error('input_descriprod')?>
                            <label>
                        </div>

                        <div class="form-group">
                            <label>
                                Precio Unitario:
                            </label>
                            <input type="number" class="form-control" name="input_precio"  step="0.01" min="0"  value="<?=set_value('input_precio')?>">
                            <?=form_error('input_precio')?>
                        </div>

                        <div class="form-group">
                            <label>
                                Proveedor:
                            </label>
                            <select class="form-control"  name="proveedores">
                                <?php foreach ($proveedores as $key => $proveedor) { ?>
                                    <option value="<?=$proveedor->idproveedor?>"><?=$proveedor->proveedor?></option>
                                <?php } ?>
                            </select>
                            <?=form_error('proveedores')?>
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
                        <a href="<?=base_url('producto/productos')?>" class="btn btn-outline-secondary">
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

