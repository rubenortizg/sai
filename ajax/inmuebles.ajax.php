<?php

require_once "../controladores/inmuebles.controlador.php";
require_once "../modelos/inmuebles.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxInmuebles{

  /* =====================================
    GENERAR CODIGO A PARTIR DE ID CATEGORIA
  ==========================================*/

  public $idCategoria;

  public function ajaxCrearCodigoInmueble(){

    $item = "id_categoria";
    $valor = $this->idCategoria;

    $respuesta =ControladorInmuebles::ctrMostrarInmuebles($item, $valor);

    echo json_encode($respuesta);


  }

  /* =====================================
    EDITAR PRODUCTO
  ==========================================*/

  public $idInmueble;

  public function ajaxEditarInmueble(){

    $item ="id";
    $valor = $this->idInmueble;

    $respuesta = ControladorInmuebles::ctrMostrarInmuebles($item,$valor);

    echo json_encode($respuesta);
  }

}

/* =====================================
  GENERAR CODIGO A PARTIR DE ID CATEGORIA
==========================================*/

if (isset($_POST["idCategoria"])) {

  $codigoInmueble = new AjaxInmuebles();
  $codigoInmueble -> idCategoria =$_POST["idCategoria"];
  $codigoInmueble -> ajaxCrearCodigoInmueble();

}

/* =====================================
  EDITAR PRODUCTO
==========================================*/

if (isset($_POST["idInmueble"])) {

  $editarInmueble = new AjaxInmuebles();
  $editarInmueble -> idInmueble = $_POST["idInmueble"];
  $editarInmueble -> ajaxEditarInmueble();

}
