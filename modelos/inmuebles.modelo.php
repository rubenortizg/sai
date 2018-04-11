<?php

require_once "conexion.php";

class ModeloInmuebles {

  /* =====================================
  MOSTRAR INMUEBLES
  ====================================== */

  static public function mdlMostrarInmuebles($tabla, $item, $valor){

    if ($item != null) {

      $sql ="SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC";
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


  /* =====================================
  REGISTRO INMUEBLE
  ====================================== */

  static public function mdlIngresarInmueble($tabla, $datos){

    $sql ="INSERT INTO $tabla(id_categoria, id_propietario, id_usuario, imagen, codigo, matricula, direccion, ciudad, estado, valor_comercial, canon_arrendamiento, comision) VALUES (:id_categoria, :id_propietario, :id_usuario, :imagen, :codigo, :matricula, :direccion, :ciudad, :estado, :valor_comercial, :canon_arrendamiento, :comision)";

    $stmt = Conexion::conectar()-> prepare($sql);

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_propietario", $datos["id_propietario"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
    $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
    $stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
    $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
    $stmt->bindParam(":valor_comercial", $datos["valor_comercial"], PDO::PARAM_STR);
    $stmt->bindParam(":canon_arrendamiento", $datos["canon_arrendamiento"], PDO::PARAM_STR);
    $stmt->bindParam(":comision", $datos["comision"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

  }

  /* =====================================
  EDITAR INMUEBLE
  ====================================== */

  static public function mdlEditarInmueble($tabla, $datos){

    $sql ="UPDATE $tabla SET id_categoria = :id_categoria, id_propietario = :id_propietario, id_usuario = :id_usuario, imagen = :imagen, codigo = :codigo, matricula = :matricula, direccion = :direccion, ciudad = :ciudad, estado = :estado, valor_comercial = :valor_comercial, canon_arrendamiento = :canon_arrendamiento, comision = :comision WHERE  codigo = :codigo";

    $stmt = Conexion::conectar()-> prepare($sql);

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_propietario", $datos["id_propietario"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
    $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
    $stmt->bindParam(":ciudad", $datos["ciudad"], PDO::PARAM_STR);
    $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
    $stmt->bindParam(":valor_comercial", $datos["valor_comercial"], PDO::PARAM_STR);
    $stmt->bindParam(":canon_arrendamiento", $datos["canon_arrendamiento"], PDO::PARAM_STR);
    $stmt->bindParam(":comision", $datos["comision"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

  }

  /* =====================================
  BORRAR INMUEBLE
  ====================================== */

  static public function mdlEliminarInmueble($tabla, $datos){

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
