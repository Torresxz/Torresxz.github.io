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
                        <?=form_open('ordencompra/editar_ordendecompra/'.$ordencompra->idordencompra,'',array('id_token' => $ordencompra->idordencompra))?>
                        <div class="form-group">
                            <label>
                                Fecha:
                            </label>
                            <input type="text" class="form-control" placeholder="Selecciona una fecha..." name="input_fecha"  data-toggle="flatpickr" value="<?=$ordencompra->Fecha?>">
                            <?=form_error('input_fecha')?>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        No.Orden:
                                    </label>
                                    <input type="number" class="form-control form-control-lg" min="0" name="orden"  value="<?=$ordencompra->numeroorden?>">
                                    <?=form_error('orden')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        No.Revisión:
                                    </label>
                                    <input type="number" class="form-control form-control-lg" min="0" name="revision"  value="<?=$ordencompra->numerorevision?>">
                                    <?=form_error('revision')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Subtotal:
                                    </label>
                                    <input type="number" class="form-control" name="subtotal" step="0.01" min="0"  value="<?=$ordencompra->subtotal?>">
                                    <?=form_error('subtotal')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Iva:
                                    </label>
                                    <input type="number" class="form-control" name="iva" step="0.01" min="0" value="<?=$ordencompra->iva?>">
                                    <?=form_error('iva')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>
                                        Total:
                                    </label>
                                    <input type="number" class="form-control" name="total"  step="0.01" min="0"  value="<?=$ordencompra->total?>">
                                    <?=form_error('total')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
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
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>
                                        Facturar:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_facturar" value="<?=$ordencompra->facturar?>">
                                    <?=form_error('input_facturar')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>
                                        Entregar:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_entregar" value="<?=$ordencompra->entregar?>">
                                    <?=form_error('input_entregar')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>
                                        Forma de Pago:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_formapago" value="<?=$ordencompra->formapago?>">
                                    <?=form_error('input_formapago')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>
                                        Tiempo de Entrega:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_tiempoentrega"  value="<?=$ordencompra->tiempoentrega?>">
                                    <?=form_error('input_tiempoentrega')?>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>
                                        Garantia:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_garantia"  value="<?=$ordencompra->garantia?>">
                                    <?=form_error('input_garantia')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>
                                        CFDI:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_cfdi"  value="<?=$ordencompra->cfdi?>">
                                    <?=form_error('input_cfdi')?>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>
                                        Metodo pago:
                                    </label>
                                    <input type="text" class="form-control form-control-lg" name="input_metodopago"  value="<?=$ordencompra->metodopago?>">
                                    <?=form_error('input_metodopago')?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>
                                Productos en orden de compra:
                            </label>
                            <select class="form-control" data-toggle="select" multiple name="productos[]">
                                <?php foreach ($productos as $key => $producto) {
                                    $selected=false;
                                    foreach ($ordencompra->productos as $keyy => $oproductos) {
                                        if($oproductos->idproducto == $producto->idproducto)
                                            $selected=true;
                                    }
                                    if($selected)
                                        echo '<option value="'.$producto->idproducto.'" selected>'.$producto->descripcionproducto.'</option>';
                                    else
                                        echo '<option value="'.$producto->idproducto.'">'.$producto->descripcionproducto.'</option>';
                                }
                                ?>
                            </select>
                            <?=form_error('productos[]')?>
                        </div>

                        <div class="form-group">
                            <label class="mb-1">
                                Estatus
                            </label>
                            <small class="form-text text-muted">
                                Muestra el estatus de la orden de forma Aprobada.
                            </small>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switchOne" name="input_status" <?=( $ordencompra->estatusorden == 1 ) ? 'checked' : '' ?> >
                                <label class="custom-control-label" for="switchOne"></label>
                            </div>
                        </div>


                    </div
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
                <a href="<?=base_url('ordencompra/ordencompras')?>" class="btn btn-outline-secondary">
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