<?php

class ControladorInmuebles {

  /* =====================================
  MOSTRAR INMUEBLES
  ====================================== */

  static public function ctrMostrarInmuebles($item, $valor){

    $tabla = "inmuebles";

    $respuesta = ModeloInmuebles::mdlMostrarInmuebles($tabla, $item, $valor);

    return $respuesta;


  }

  /* =====================================
  CREAR INMUEBLES
  ====================================== */

  static public function ctrCrearInmueble(){

    if (isset($_POST["nuevoValorArrendamiento"])) {

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ#,_\- ]+$/', $_POST["nuevaDireccion"]) &&
         preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCiudad"]) &&
         preg_match('/^[a-zA-Z0-9\-]+$/', $_POST["nuevaMatricula"]) &&
			   preg_match('/^[0-9,]+$/', $_POST["nuevoValorComercial"]) &&
			   preg_match('/^[0-9,]+$/', $_POST["nuevoValorArrendamiento"]) &&
         preg_match('/^[0-9.]+$/', $_POST["nuevoPorcentaje"])){

          $ruta = "vistas/img/inmuebles/default/anonymous.png";

          $tabla = inmuebles;

          $datos = array("id_categoria" => $_POST["nuevaCategoria"],
    					           "id_propietario" => $_POST["nuevoCliente"],
                         "id_usuario" => $_SESSION["usuario"],
    										 "codigo" => $_POST["nuevoCodigo"],
                         "direccion" => $_POST["nuevaDireccion"],
                         "ciudad" => $_POST["nuevaCiudad"],
                         "estado" => $_POST["nuevoEstado"],
                         "valor_comercial" => $_POST["nuevoValorComercial"],
                         "canon_arrendamiento" => $_POST["nuevoValorArrendamiento"],
                         "comision" => $_POST["nuevoPorcentaje"],
    					           "matricula" => $_POST["nuevaMatricula"],
                         "imagen" => $ruta);

          $respuesta = ModeloInmuebles::mdlIngresarInmueble($tabla, $datos);

          if($respuesta == "ok"){

  					echo '<script>

  					swal({

  						type: "success",
  						title: "¡El inmueble ha sido guardado correctamente!",
  						showConfirmButton: true,
  						confirmButtonText: "Cerrar"

  					}).then(function(result){

  						if(result.value){

  							window.location = "inmuebles";

  						}

  					});


  					</script>';


  				}



         } else {

           echo '<script>

   					swal({

   						type: "error",
   						title: "¡El inmueble no puede ir con los campos vacíos o llevar caracteres especiales!",
   						showConfirmButton: true,
   						confirmButtonText: "Cerrar"

   					}).then(function(result){

   						if(result.value){

   							window.location = "inmuebles";

   						}

   					});


   				</script>';

         }

    }
  }

}
