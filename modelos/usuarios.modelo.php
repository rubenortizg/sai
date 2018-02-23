<?php

require_once "conexion.php";

class  ModeloUsuarios{

  /* =====================================
    MOSTRAR USUARIOS
  ========================================== */

  static public function mdlMostrarUsuarios($tabla, $item, $valor){

    if ($item != null) {

      $sql ="SELECT * FROM $tabla WHERE $item = :$item";
      $stmt = Conexion::conectar()-> prepare($sql);
      $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt-> execute();

      return $stmt -> fetch();

    } else {

      $sql ="SELECT * FROM $tabla";
      $stmt = Conexion::conectar()-> prepare($sql);
      $stmt-> execute();

      return $stmt -> fetchAll();
    }



    $stmt->close();
    $stmt = null;

  }

  /* =====================================
    REGISTRO DE USUARIO
  ========================================== */

  static public function mdlIngresarUsuario($tabla, $datos){

    $sql ="INSERT INTO $tabla(nombre, usuario, password, correo, perfil, foto) VALUES (:nombre, :usuario, :password, :correo, :perfil, :foto)";
    $stmt = Conexion::conectar()-> prepare($sql);
    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
    $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

    if ($stmt->execute()){
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt = null;

  }
}
