<?php

require_once "conexion.php";

class  ModeloUsuarios{

  // Mostrar Usuarios

  static public function mdlMostrarUsuarios($tabla, $item, $valor){

    $sql ="SELECT * FROM $tabla WHERE $item = :$item";
    $stmt = Conexion::conectar()-> prepare($sql);
    $stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
    $stmt -> execute();

    return $stmt -> fetch();

  }
}
