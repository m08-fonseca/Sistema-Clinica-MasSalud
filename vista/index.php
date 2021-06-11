<?php
session_start();

if(!isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../Login/index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA CLÍNICO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../Plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../Plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../Plantilla/plugins/jqvmap/jqvmap.min.css">

  <!-- Plugins datatables -->
  <link rel="stylesheet" href="../Plantilla/plugins/DataTables/datatables.min.css">
  <link rel="stylesheet" href="../Plantilla/plugins/selecto2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Plantilla/dist/css/adminlte.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="../Plantilla/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../Plantilla/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->


  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../Plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../Plantilla/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../Plantilla/plugins/summernote/summernote-bs4.css">

	<!-- FullCalendar -->
  
  <link rel="stylesheet" href="../CalendarioWeb/css/fullcalendar.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<style>
.swal2-popup{
  font-size:1.6rem !important;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>


      <!-- Me redirecciona a la vista del Especialidad -->
      <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','especialidad/vista_especialidad_listar.php')" class="nav-link"><i class="fas fa-user-tag pr-1"></i>Especialidad</a>
      </li>

      <!-- Me redirecciona a la vista del medico -->
      <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','medico/vista_medico_listar.php')" class="nav-link"><i class="fas fa-user-md pr-1"></i>Registrar Medico</a>
      </li>
      <!-- Me redirecciona a la vista del procedimientos -->
      <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','procedimiento/vista_procedimiento_listar.php')" class="nav-link"><i class="fas fa-procedures pr-1"></i>Procedimiento</a>
      </li>
      <!-- Me redirecciona a la vista del insumo -->
      <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','insumo/vista_insumo_listar.php')" class="nav-link"><i class="fas fa-calculator pr-1"></i>Insumos</a>
      </li>
      
      <!-- Me redirecciona a la vista del finanzas -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" class="nav-link"><i class="far fa-file-alt pr-3"></i></a>
      </li> -->
      
      <!-- Me redirecciona a la vista del estadisticas -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" class="nav-link"><i class=" fas fa-chart-line pr-3"></i></a>
      </li> -->

      <!-- Me redirecciona a la vista del tareas -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" class="nav-link"><i class="far fa-sticky-note pr-3"></i></a>
      </li> -->

      <!-- Me redirecciona a la vista del estadisticas -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a onclick ="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" class="nav-link"><i class="fas fa-heartbeat pr-3"></i></a>
      </li> -->
       <!-- Me redirecciona de nuevo al loging -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../controlador/usuario/controlador_cerrar_session.php" class="nav-link"><i class=" fas fa-sign-out-alt pr-3"></i></a>
      </li> -->

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
       
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
         
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../Plantilla/dist/img/pnp1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SISTEMA CLÍNICO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../Plantilla/dist/img/clinica.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">SISTEMA CLÍNICO</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         <!-- LINK DE USUARIOS, esto permite que el sistema lleve un control de quien usa y quin no usa esté sistema-->
          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" class="nav-link" style="cursor: pointer"><i class="fas fa-users pr-3">
            </i>Usuario</a>
          </div>

          <!-- LINK PACIENTE -->
          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','usuario/')" class="nav-link" style="cursor: pointer"><i class="far fa-id-card pr-3"></i>Paciente</a>
          </div>

        
          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','agendas/vista_agenda.php')" class="nav-link" style="cursor: pointer"><i class="far fa-calendar-alt pr-3"></i>Agenda</a>
          </div>

        
          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','usuario/')" class="nav-link" style="cursor: pointer">
            <i class="fas fa-folder-open pr-3"></i>Documentos</a>
          </div>

          
          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','usuario/')" class="nav-link" style="cursor: pointer"><i class="far fa-file-alt pr-3"></i>Finanzas</a>
          </div>

          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','usuario/')" class="nav-link" style="cursor: pointer"><i class=" fas fa-chart-line pr-3"></i>Estadisticas</a>
          </div>


          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','tarea/vista_tarea_listar.php')" class="nav-link" style="cursor: pointer"><i class="far fa-sticky-note pr-3"></i>Tareas</a>
          </div>

          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','usuario/')" class="nav-link" style="cursor: pointer"><i class="fas fa-heartbeat pr-3"></i>Citas externas</a>
          </div>

          <div class="nav-item">  
            <a onclick ="cargar_contenido('contenido_principal','configuracion/vista_configuracion.php')" class="nav-link" style="cursor: pointer"><i class="fas fa-cog pr-3"></i>Configuración</a>
          </div>


          <div class="nav-item">  
            <a href="../controlador/usuario/controlador_cerrar_session.php" style="cursor: pointer" class="nav-link"><i class=" fas fa-sign-out-alt pr-3"></i>Salir</a>
          </div>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <!-- Estos inputs me traen el id y el usuario que estoy utilizando -->
    <input type="text" id="txtidprincipal" value="<?php echo $_SESSION['S_IDUSUARIO'] ?>" hidden >
    <input type="text" id="usuarioprincipal" value="<?php echo $_SESSION['S_USER'] ?>" hidden>
    <section class="content">
      <div class="row" id="contenido_principal">
        <div class="col-md-12">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">BIENVENIDO AL CONTENIDO PRINCIPAL</h3>

              </div>
                <!-- /.box-header -->
              <div class="box-body">
                CONTENIDO PRINCIPAL
              </div>
                  <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
       </div>
     
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021<a href="http://adminlte.io">Sistema clínico</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version Original</b> 
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
<script src="../Plantilla/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../Plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    // Esto es una funcion para la parte del contenido del sistema
    function cargar_contenido(contenedor,contenido){
        // $("#"+contendor).load(contenido);
        $("#"+contenedor).load(contenido);
    }
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="../Plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../Plantilla/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../Plantilla/plugins/sparklines/sparkline.js"></script>
<script>
  // Muchos mensajes son en ingles, este JSON permite traducirlo
	var idioma_espanol = {
			select: {
			rows: "%d fila seleccionada"
			},
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
			"sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
			"sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "<b>No se encontraron datos</b>",
			"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
			},
			"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
	 }
  function cargar_contenido(contenedor,contenido){
      $("#"+contenedor).load(contenido);
  }
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- jQuery Knob Chart -->
<script src="../Plantilla/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../Plantilla/plugins/moment/moment.min.js"></script>
<script src="../Plantilla/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../Plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../Plantilla/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../Plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../Plantilla/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../Plantilla/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../Plantilla/dist/js/demo.js"></script>

<!-- Plugins de datatable -->
<script src="../Plantilla/plugins/DataTables/datatables.min.js"></script>
<script src="../Plantilla/plugins/selecto2/select2.min.js"></script>

<script src="../Plantilla/plugins/sweetAalert2/sweetalert29.js"></script>
<!-- USUARIO JS PARA TRAER LOS DATOS -->
<script src="../js/usuario.js"></script>


<!-- <script src="../CalendarioWeb/js/jquery.min.js"></script> -->
<script src="../CalendarioWeb/js/moment.min.js"></script>
<script src="../CalendarioWeb/js/fullcalendar.min.js"></script>
<!-- Llamo a la funcion traer datos usuario al index -->
<script>
Traer_DatosUsuario();
</script>



</body>

</html>
