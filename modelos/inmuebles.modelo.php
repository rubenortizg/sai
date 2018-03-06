<?php

require_once "conexion.php";

class ModeloInmuebles {

  /* =====================================
  MOSTRAR INMUEBLES
  ====================================== */

  static public function mdlMostrarInmuebles($tabla, $item, $valor){

    if ($item != null) {

      $sql ="SELECT * FROM $tabla WHERE $item = :$item";
      $stmt = Conexion::conectar()-> prepare($sql);
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

    } else {

      $sql ="SELECT * FROM $tabla";
      $stmt = Conexion::conectar()-> prepare($sql);
			$stmt -> execute();

			return $stmt -> fetchAll();


    }

		$stmt -> close();
		$stmt = null;

  }

}
