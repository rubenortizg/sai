<?php

require_once "../controladores/conceptos.controlador.php";
require_once "../modelos/conceptos.modelo.php";

class AjaxConceptos{

	/*=============================================
	EDITAR CONCEPTO
	=============================================*/

	public $idConcepto;

	public function ajaxEditarConcepto(){

		$item = "id";
		$valor = $this->idConcepto;

		$respuesta = ControladorConceptos::ctrMostrarConceptos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR CONCEPTO
	=============================================*/

	public $validarConcepto;

	public function ajaxValidarConcepto(){

		$item = "concepto";
		$valor = $this->validarConcepto;

		$respuesta = ControladorConceptos::ctrMostrarConceptos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CONCEPTO
=============================================*/

if(isset( $_POST["idConcepto"])){

	$Concepto = new AjaxConceptos();
	$Concepto -> idConcepto = $_POST["idConcepto"];
	$Concepto -> ajaxEditarConcepto();

}



/*=============================================
VALIDAR NO REPETIR CONCEPTO
=============================================*/

if(isset( $_POST["validarConcepto"])){

	$valConcepto = new AjaxConceptos();
	$valConcepto -> validarConcepto = $_POST["validarConcepto"];
	$valConcepto -> ajaxValidarConcepto();

}
