<?php

require_once "conexion.php";

class ModeloComprobantes{

  /*=============================================
  MOSTRAR COMPROBANTES
  =============================================*/

  static public function mdlMostrarComprobantes($tabla, $item, $valor){

    if($item != null){

			$sql ="SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha DESC";
      $stmt = Conexion::conectar()-> prepare($sql);
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$sql ="SELECT * FROM $tabla ORDER BY fecha DESC";
      $stmt = Conexion::conectar()-> prepare($sql);
			$stmt -> execute();

			return $stmt -> fetchAll();

		}


		$stmt -> close();
		$stmt = null;

  }

}
