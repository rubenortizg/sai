<?php

class ControladorComprobantes {

  /*=============================================
	MOSTRAR COMPROBANTES
	=============================================*/

  static public function ctrMostrarComprobantes($item, $valor){

    $tabla = "comprobantes";

    $respuesta = ModeloComprobantes::mdlMostrarComprobantes($tabla, $item, $valor);

    return $respuesta;


  }

}
