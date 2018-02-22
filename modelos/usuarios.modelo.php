<?php

require_once "conexion.php";

class  ModeloUsuarios{

  /* =====================================
    MOSTRAR USUARIOS
  ========================================== */

  static public function mdlMostrarUsuarios($tabla, $item, $valor){

    $sql ="SELECT * FROM $tabla WHERE $item = :$item";
    $stmt = Conexion::conectar()-> prepare($sql);
    $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
    $stmt-> execute();

    return $stmt -> fetch();

    $stmt->close();
    $stmt = null;

  }

  /* =====================================
    REGISTRO DE USUARIO
  ========================================== */

  static public function mdlIngresarUsuario($tabla, $datos){

    $sql ="INSERT INTO $tabla(nombre, usuario, password, correo, perfil) VALUES (:nombre, :usuario, :password, :correo, :perfil)";
    $stmt = Conexion::conectar()-> prepare($sql);
    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
    $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

    if ($stmt->execute()){
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt = null;

  }
}
