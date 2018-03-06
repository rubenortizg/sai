<?php

class ControladorInmuebles {

  /* =====================================
  MOSTRAR INMUEBLES
  ====================================== */

  static public function ctrMostrarInmuebles($item, $valor){

    $tabla = "inmuebles";

    $respuesta = ModeloInmuebles::mdlMostrarInmuebles($tabla, $item, $valor);

    return $respuesta;


  }


}
