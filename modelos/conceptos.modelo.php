<?php

require_once "conexion.php";

class ModeloConceptos {

  /* =====================================
  CREAR CONCEPTO
  ====================================== */

  static public function mdlIngresarConcepto($tabla, $datos){

    $sql ="INSERT INTO $tabla(concepto) VALUES (:concepto)";
    $stmt = Conexion::conectar()-> prepare($sql);

		$stmt->bindParam(":concepto", $datos, PDO::PARAM_STR);

    if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
  }


  /* =====================================
  EDITAR CONCEPTO
  ====================================== */

  static public function modalEditarConcepto($tabla, $datos){

    $sql ="UPDATE $tabla SET concepto = :concepto WHERE id = :id";
    $stmt = Conexion::conectar()-> prepare($sql);

    $stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";

    }

    $stmt->close();
    $stmt = null;
  }

  /*=============================================
  MOSTRAR CONCEPTOS
  =============================================*/

  static public function mdlMostrarConceptos($tabla, $item, $valor){

    if($item != null){

      $sql ="SELECT * FROM $tabla WHERE $item = :$item";
      $stmt = Conexion::conectar()-> prepare($sql);
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();

      return $stmt -> fetch();

    }else{

      $sql ="SELECT * FROM $tabla";
      $stmt = Conexion::conectar()-> prepare($sql);
      $stmt -> execute();

      return $stmt -> fetchAll();

    }


    $stmt -> close();
    $stmt = null;

  }

  /*=============================================
  BORRAR CONCEPTOS
  =============================================*/

  static public function mdlBorrarConcepto($tabla, $datos){

    $sql ="DELETE FROM $tabla WHERE id = :id";
    $stmt = Conexion::conectar()-> prepare($sql);

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

  }

}
