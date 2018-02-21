<?php

class Conexion {

  public function conectar(){

    $link = new PDO("mysql:host=localhost;dbname=ai","root","");

    $link->exec("set names utf8");

    return $link;
  }
}
