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
    
<!-- ========== CONTENIDO ========== -->
<body id="page-top">

         <!-- Begin Page Content -->
        <div class="container-fluid">
           <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Informes</h1>
        </div>

          <div class="row">

            <!-- Cuadro 1 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PROVEEDORES</div>
                       
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Cuadro 2 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">GANANCIA ANUAL</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Cuadro 3 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TRANSACCIONES</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Cuadro 4 -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">CLIENTES</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 


                




<!--  prueba-->
<!-- ========== CONTENIDO ========== -->
                <div id="test-list" class="card" data-toggle="lists" data-options='{"valueNames": ["orders-correo", "orders-nombre", "orders-admin", "orders-grupo", "orders-status"],"page":10,"pagination":"true"}'>
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="m-0 font-weight-bold text-primary">LISTA DE ORDENES DE COMPRA</h6>
                            </div>
                            
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="<?=base_url('ordencompra/agregar_ordendecompra')?>"class="btn btn-primary btn-sm">
                                    Agregar orden de compra
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                            <tr>
                                
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-id">
                                        No.Orden de Compra:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-fecha">
                                        Fecha:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-orden">
                                        No.Orden:
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-revision">
                                        No.Revision:
                                    </a>
                                </th>
                               
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-provedor">
                                        Proveedor:
                                    </a>
                                </th>
                                
                                
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Estatus:
                                    </a>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php foreach ($ordencompra as $key => $ordencompra) { ?>
                                <tr>
                                   
                                    <td class="orders-id">
                                        <?=$ordencompra->idordencompra?>
                                    </td>
                                    <td class="orders-fecha">
                                        <?=$ordencompra->Fecha?>
                                    </td>
                                    <td class="orders-orden">
                                        <?=$ordencompra->numeroorden?>
                                    </td>
                                    <td class="orders-revision">
                                        <?=$ordencompra->numerorevision?>
                                    </td>
                                    
                                    <td class="orders-proveedor">
                                        <?=$ordencompra->proveedor?>
                                    </td>                                
                                    
                                    <td class="orders-status">
                                        <div class="badge <?php if($ordencompra->estatusorden=='Aprobada'){ echo 'badge-success'; }else{ echo 'badge-secondary'; }  ?>">
                                            <?=$ordencompra->estatusorden?>
                                        </div>
                                    </td>                                   
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ========== /CONTENIDO ========== -->


<!-- Fin prueba -->

<div class="row">
          <div class="col-12 col-xl-4">

            <!-- Projects -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                     <!-- Title -->
                     <h6 class="m-0 font-weight-bold text-primary">ACCIONES</h6>

                  </div>
                  
                </div> <!-- / .row -->
              </div>

              <div class="card-body">

                <div class="row align-items-center">
                    <div class="col ml-n2">
                                <!-- Button -->
                                <a href="<?=base_url('proveedor/agregar_proveedor')?>"class="btn btn-primary btn-sm">
                                    Agregar proveedor
                                </a>                      
                  </div>
               </div> <!-- / .row -->

                <!-- Divider -->
                <hr>
                <div class="row align-items-center">
                   <div class="col ml-n2">
                                 <a href="<?=base_url('producto/agregar_productos')?>"class="btn btn-primary btn-sm">
                                    Agregar productos
                                </a>
                     </div>
                </div>

                 <!-- Divider -->
                <hr>
                <div class="row align-items-center">
                   <div class="col ml-n2">
                                <a href="<?=base_url('cotizacion/agregar_cotizacion')?>"class="btn btn-primary btn-sm">
                                    Agregar cotización
                                </a>
                     </div>
                </div>

                <!-- Divider -->
                <hr>
                <div class="row align-items-center">
                   <div class="col ml-n2">
                                <a href="<?=base_url('servicio/servicios_agregar')?>"class="btn btn-primary btn-sm">
                                    Agregar servicio
                                </a>


                     </div>
                </div>

               <!-- Divider -->
                <hr>
                <div class="row align-items-center">
                   <div class="col ml-n2">
                                 <a href="<?=base_url('cliente/cliente_agregar')?>"class="btn btn-primary btn-sm">
                                    Agregar Cliente
                                </a>
                     </div>
                </div>


                </div> <!-- / .row -->
            </div> <!-- / .card -->           
 </div> 
      



 <div class="col-12 col-xl-8">
            
            <!-- Performance -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">                
                    <!-- Title -->
                    <h6 class="m-0 font-weight-bold text-primary">Reportes PDF</h6>
                  </div>                               
                </div> <!-- / .row -->
              </div>

              <div class="card-body">
                 <div class="row align-items-center">
                   <div class="col ml-n2">
                                <a href="<?=base_url('Tablero/prueba3')?>"class="btn btn-primary btn-sm">
                                    Reporte General del servicio
                                </a>
                    </div>
                </div> 
             </div>

            <div class="card-body">
                 <div class="row align-items-center">
                   <div class="col ml-n2">
                                <a href="<?=base_url('Proveedor/reporteproveedor')?>"class="btn btn-primary btn-sm">
                                    Reporte Proveedores
                                </a>
                    </div>
                </div> 
             </div>

                <div class="card-body">
                 <div class="row align-items-center">
                   <div class="col ml-n2">
                                <a href="<?=base_url('Cotizacion/cotizacion_pdf')?>"class="btn btn-primary btn-sm">
                                    Reporte Cotizacion
                                </a>
                    </div>
                </div> 
             </div>

            </div>
          </div>
      
</div>

<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UPTLAX 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

 <a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
    <i class="fas fa-angle-up"></i>
  </a>
  

  
 
<!-- ========== /CONTENIDO ========== -->


    <!-- ========== CSS ========== -->                     
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/sb-admin-2.min.js"></script>
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/demo/datatables-demo.js"></script>

  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">  
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        

    <!-- ========== Base JS ========== -->
    <?=$this->load->view('includes/base_js','',TRUE)?>
    <!-- ========== /Base JS ========== -->

  </body>
</html>