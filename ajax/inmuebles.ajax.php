<?php

require_once "../controladores/inmuebles.controlador.php";
require_once "../modelos/inmuebles.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class TablaInmuebles{

  /* =====================================
    MOSTRAR TABLA DE INMUEBLES
  ==========================================*/

  public function mostrarTabla(){

    $item = null;
    $valor = null;
    $inmuebles = ControladorInmuebles::ctrMostrarInmuebles($item, $valor);

    echo '{
            "data": [';

            for ($i=0; $i < count($inmuebles)-1; $i++) {

              $item1 = "id";
              $valor1 = $inmuebles[$i]["id_categoria"];
              $valor3 = $inmuebles[count($inmuebles)-1]["id_categoria"];

              $item2 = "id";
              $valor2 = $inmuebles[$i]["id_propietario"];
              $valor4 = $inmuebles[count($inmuebles)-1]["id_propietario"];


              $categorias = ControladorCategorias::ctrMostrarCategorias($item1, $valor1);
              $categoriaUltima = ControladorCategorias::ctrMostrarCategorias($item1, $valor3);
              $propietarios = ControladorUsuarios::ctrMostrarUsuarios($item2, $valor2);
              $propietarioUltimo = ControladorUsuarios::ctrMostrarUsuarios($item2, $valor4);

              echo '[
                  "'.($i+1).'",
                  "'.$inmuebles[$i]["imagen"].'",
                  "'.$categorias["categoria"].'",
                  "'.$inmuebles[$i]["matricula"].'",
                  "'.$propietarios["nombre"].'",
                  "'.$inmuebles[$i]["direccion"].'",
                  "'.$inmuebles[$i]["ciudad"].'",
                  "Arrendado",
                  "$ '.number_format($inmuebles[$i]["valor_comercial"],0).'",
                  "$ '.number_format($inmuebles[$i]["canon_arrendamiento"],0).'",
                  "'.$inmuebles[$i]["fecha"].'",
                  "'.$inmuebles[$i]["id"].'"
                ],';

            }

            echo '[
                "'.count($inmuebles).'",
                "'.$inmuebles[count($inmuebles)-1]["imagen"].'",
                "'.$categoriaUltima["categoria"].'",
                "'.$inmuebles[count($inmuebles)-1]["matricula"].'",
                "'.$propietarioUltimo["nombre"].'",
                "'.$inmuebles[count($inmuebles)-1]["direccion"].'",
                "'.$inmuebles[count($inmuebles)-1]["ciudad"].'",
                "Arrendado",
                "$ '.number_format($inmuebles[count($inmuebles)-1]["valor_comercial"],0).'",
                "$ '.number_format($inmuebles[count($inmuebles)-1]["canon_arrendamiento"],0).'",
                "'.$inmuebles[count($inmuebles)-1]["fecha"].'",
                "'.$inmuebles[count($inmuebles)-1]["id"].'"
              ]
            ]
          }';


  }


}

/* =====================================
  ACTIVAR TABLA DE INMUEBLES
==========================================*/

$activar = new TablaInmuebles();
$activar -> mostrarTabla();
