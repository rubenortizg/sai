<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Administración Inmobiliaria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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

</head>

<!-- =====================================
  BODY DOCUMENT
==========================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<?php
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
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "inmuebles" ||
        $_GET["ruta"] == "comprobante" ||
        $_GET["ruta"] == "ingresos" ||
        $_GET["ruta"] == "egresos"){

      include "modulos/".$_GET["ruta"].".php";

    }
  }

  /* =====================================
    FOOTER
  ==========================================*/
  include "modulos/footer.php";

?>

</div>
<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>
</body>
</html>
