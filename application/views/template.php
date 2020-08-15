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
    
<!-- ========== CONTENIDO ========== -->
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">

        

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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ORDEN COMPRA</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
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
          </div> <!-- Fin class row -->

          <!-- Grafica -->
<!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">ANUALIDAD</h6>
                  <div class="dropdown no-arrow">
                   
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- Pie Chart -->
           
 <!-- Fin Grafica -->
          
          <!-- Tabla de datos -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">PROVEEDORES</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>IdProveedor</th>
                      <th>Nombre</th>
                      <th>RFC</th>
                      <th>Telefono</th>
                      <th>Contacto</th>
                      <th>Correo</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td>0</td>
                      <td>Juan Carlos Rodríguez Salas</td>
                      <td>JUCA961217RT</td>
                      <td>2229112565</td>
                      <td>Cerveza Modelo A</td>
                      <td>juancarlos_modelo@gmail.com</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Marcos Guzman Salazar</td>
                      <td>LOUM981013MT</td>
                      <td>2461112314</td>
                      <td>Cerveza Coronas</td>
                      <td>corona.da.DE@gmail.com</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Julio Zamora Cervantes</td>
                      <td>JUZA180214JK</td>
                      <td>2221485654</td>
                      <td>Cerveza Victoria</td>
                      <td>julion@gmail.com</td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Carla Najera Cruz</td>
                      <td>CA25364512NAJ</td>
                      <td>2213635349</td>
                      <td>Mayonesa Mc</td>
                      <td>carlisaaa@gmail.com</td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>Eliza Gonzalez Marquez</td>
                      <td>EGZA180214MA</td>
                      <td>3248756985</td>
                      <td>Margarita Flores</td>
                      <td>elisgon@gmail.com</td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>Rosario R H</td>
                      <td>RO5679452KL</td>
                      <td>2458976541</td>
                      <td>2012/12/02</td>
                      <td>Ros@hotmail.com</td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>juan rodriguez</td>
                      <td>JUZA180214LO</td>
                      <td>2365478952</td>
                      <td>yopis</td>
                      <td>xsdfghjlkjh@gmail.com</td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>bnbm52</td>
                      <td>cvbnm</td>
                      <td>8526352</td>
                      <td>cvhbjn</td>
                      <td>fghkj@gmail.com</td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>Alfredo</td>
                      <td>ADFRE1234</td>
                      <td>465879</td>
                      <td>Catsup La costeña</td>
                      <td>alfredo@hotmail.com</td>
                    </tr>
                    <tr>
                    </tbody>
                </table>

              </div>
            </div>
          </div>

        </div> <!-- /.container-fluid -->
      </div><!-- End of Main Content --> 

    </div> <!-- End of Content Wrapper -->
  </div> <!-- End of Page Wrapper -->
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