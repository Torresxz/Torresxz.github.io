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
                        <?=form_open('Cotizacion/Agregar_Cotizacion')?>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha:
                            </label>
                             <input type="date" class="form-control" placeholder="Selecciona fecha" data-toggle="flatpickr" name="input_fecha" value="<?=set_value('input_fecha')?>">
                            <?=form_error('input_fecha')?>
                        </div>

                        <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Clave
                        </label>
                        <input type="number" class="form-control" name="input_clave" value="<?=set_value('input_clave')?>">
                            <?=form_error('input_clave')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Cliente
                        </label>
                        <select class="form-control"  name="input_cliente">
                                <?php foreach ($clientes as $key => $cliente) { ?>
                                            <option value="<?=$cliente->idcliente?>"><?=$cliente->empresa?></option>
                                        <?php } ?>
                            </select>
                            <?=form_error('input_cliente')?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                      <label>
                          Encargado
                        </label>
                        <input type="number" class="form-control" name="input_encargado" value="<?=set_value('input_encargado')?>">
                            <?=form_error('input_encargado')?>
                          </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Subtotal
                        </label>
                            <input type="text" class="form-control" placeholder="$" data-mask="##,###" data-mask-reverse="true" name="input_subtotal" value="<?=set_value('input_subtotal')?>">
                            <?=form_error('input_subtotal')?>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                       <label>
                          Tiempo de entrega
                        </label>
                            <input type="text" class="form-control" name="input_entrega" value="<?=set_value('input_entrega')?>">
                            <?=form_error('input_entrega')?>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label>
                          Lugar de servicio
                        </label>
                            <input type="text" class="form-control" name="input_lugar" value="<?=set_value('input_lugar')?>">
                            <?=form_error('input_lugar')?>
                      </div>
                    </div>
                  </div>

                        
                        <!-- Divider -->
                        <hr class="">

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="<?=base_url('cotizacion/cotizacion')?>" class="btn btn-outline-secondary">
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