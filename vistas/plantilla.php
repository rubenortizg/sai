<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Administración Inmobiliaria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

  <!-- =====================================
    PLUGINS CSS
  ==========================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">


  <!-- =====================================
    PLUGINS JAVASCRPIT
  ==========================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- SlimScroll -->
  <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

</head>

<!-- =====================================
  BODY DOCUMENT
==========================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

<?php

if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

/*-- Site wrapper --> */
echo '<div class="wrapper">';

/* =====================================
  CABEZOTE
==========================================*/
  include "modulos/cabezote.php";
  /* =====================================
    MENU LATERAL
  ==========================================*/
  include "modulos/menu.php";
  /* =====================================
    CONTENIDO
  ==========================================*/

  if(isset($_GET["ruta"])) {

    // lista blanca de modulos con URLs amigables
    if ($_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "categorias" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "inmuebles" ||
        $_GET["ruta"] == "comprobantes" ||
        $_GET["ruta"] == "ingresos" ||
        $_GET["ruta"] == "egresos" ||
        $_GET["ruta"] == "salir"){
    // ../lista blanca de modulos con URLs amigables

      include "modulos/".$_GET["ruta"].".php";

    } else {
      include "modulos/404.php";
    }
  } else {
    include "modulos/inicio.php";
  }

  /* =====================================
    FOOTER
  ==========================================*/
  include "modulos/footer.php";

  echo '</div>';
  /*-- ./wrapper --*/
} else {
  include "modulos/login.php";
}

?>



<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/inmuebles.js"></script>
</body>
</html>
