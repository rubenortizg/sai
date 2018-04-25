<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/admin.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/conceptos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/inmuebles.controlador.php";
require_once "controladores/comprobantes.controlador.php";
require_once "controladores/ingresos.controlador.php";
require_once "controladores/egresos.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/admin.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/conceptos.modelo.php";
require_once "modelos/inmuebles.modelo.php";
require_once "modelos/comprobantes.modelo.php";
require_once "modelos/ingresos.modelo.php";
require_once "modelos/egresos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
