<?php

//Primero se debe incluir el archivo donde esta la funcion a usar
include "conexiondb.php";


//Se guarda en una variable la conexion para poder usarla
$mysqli = conexiondb();

// Se ejecuta la consulta y se asigna el resultado a una variable, en este caso llamada resultado
$resultado = $mysqli-> query("SELECT * FROM usuarios");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trabajo Practico N°1 </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
  @media (min-width: 576px) {
    .col-sm-2 {
      flex: 0 0 37% !important;
      max-width: 45% !important;
    }
  }

  .form-control {
    width: 200% !important;
  }

  #divs-juntos {
    float: left;
  }

  .table thead th {
    vertical-align: baseline;
  }

  .text-nowrap {
    white-space: normal !important;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
 
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index.php" class="brand-link">
        <img src="dist/img/tsystems.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Trabajo Practico</span>
      </a>

      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Menu 1
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                <p>
                  Menu 2
                </p>
              </a>
            </li>
          </ul>
        </nav>
       
      </div>
    
    </aside>


    <div class="content-wrapper">


      <section class="content">


        <div class="card-header">
          <h3 class="card-title"><b>Listado de resultados</b></h3>
          <div class="card-tools">
            <div class="input-group input-group-sm">
              <div>
                <a class="btn btn-primary" style="width: 100%;background-color:deeppink;border-color:deeppink;" href="nuevo.php">+ Agregar nuevo</a>
              </div>
            </div>
          </div>
        </div>


        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr style="background-color:deeppink">
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th style="text-align: center;">Opciones</th>
              </tr>
            </thead>
            <tbody>
<?php
              //Para poder recorrer las filas se usa un while , cada resultado se guarda en la variable
              // filas y se hace un echo con el nombre de cada columna
              while ($filas = $resultado-> fetch_assoc()) {
              
              //Se recorre cada fila y columna para mostrar el resultado haciendo un echo
?>
              <tr>
                <td style="font-size: 14px;"><?php echo $filas['id'] ?></td>
                <td style="font-size: 14px;"><?php echo $filas['nombre'] ?></td>
                <td style="font-size: 14px;"><?php echo $filas['apellido'] ?></td>
                <td style="font-size: 14px;"><?php echo $filas['dni'] ?></td>
                <td style="text-align:center;font-size: 17px;">
                  <a href="editar.php?id=<?php echo $filas['id']?>  " style="color: black;padding-right:10%;"><i class="fa fa-edit"></i></a>
<?php
//En el boton eliminar asignamos lo que tiene $filas['id'] y se lo asignamos a la variable id para poder usarlo luego en el archivo eliminar.php
?>                  
                  <a href="eliminar.php?id=<?php echo $filas['id']?>" style="color: black;"><i class="fa fa-times"></i></a>
                </td>
              </tr>
<?php
              }
?>
           </tbody>
          </table>  
        </div>
       
    </div>

  </div>
  </div>

  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="https://www.t-systems.com.ar" style="color: deeppink"> T-Systems</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>V.</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>