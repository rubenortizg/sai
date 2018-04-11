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

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ#,_\-\. ]+$/', $_POST["nuevaDireccion"]) &&
         preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCiudad"]) &&
         preg_match('/^[a-zA-Z0-9\-]+$/', $_POST["nuevaMatricula"]) &&
			   preg_match('/^[0-9,]+$/', $_POST["nuevoValorComercial"]) &&
			   preg_match('/^[0-9,]+$/', $_POST["nuevoValorArrendamiento"]) &&
         preg_match('/^[0-9.]+$/', $_POST["nuevoPorcentaje"])){

          /*=============================================
   				VALIDAR IMAGEN
   				=============================================*/

          $ruta = "vistas/img/inmuebles/default/anonymous.png";

          if(isset($_FILES["nuevaImagen"]["tmp_name"])){

  					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

  					$nuevoAncho = 500;
  					$nuevoAlto = 500;

  					/*=============================================
  					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL INMUEBLE
  					=============================================*/

  					$directorio = "vistas/img/inmuebles/".$_POST["nuevoCodigo"];

  					mkdir($directorio, 0755);

  					/*=============================================
  					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
  					=============================================*/

  					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

  						/*=============================================
  						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
  						=============================================*/

  						$aleatorio = mt_rand(100,999);

  						$ruta = "vistas/img/inmuebles/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

  						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

  						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

  						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

  						imagejpeg($destino, $ruta);

  					}

  					if($_FILES["nuevaImagen"]["type"] == "image/png"){

  						/*=============================================
  						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
  						=============================================*/

  						$aleatorio = mt_rand(100,999);

  						$ruta = "vistas/img/inmuebles/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

  						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

  						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

  						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

  						imagepng($destino, $ruta);

  					}

  				}


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

  /* =====================================
  EDITAR INMUEBLES
  ====================================== */

  static public function ctrEditarInmueble(){

    if (isset($_POST["editarValorArrendamiento"])) {

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ#,_\-\. ]+$/', $_POST["editarDireccion"]) &&
         preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCiudad"]) &&
         preg_match('/^[a-zA-Z0-9\-]+$/', $_POST["editarMatricula"]) &&
			   preg_match('/^[0-9,]+$/', $_POST["editarValorComercial"]) &&
			   preg_match('/^[0-9,]+$/', $_POST["editarValorArrendamiento"]) &&
         preg_match('/^[0-9.]+$/', $_POST["editarPorcentaje"])){

          /*=============================================
   				VALIDAR IMAGEN
   				=============================================*/

          $ruta = $_POST["imagenActual"];

          if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

  					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

  					$nuevoAncho = 500;
  					$nuevoAlto = 500;

  					/*=============================================
  					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL INMUEBLE
  					=============================================*/

  					$directorio = "vistas/img/inmuebles/".$_POST["editarCodigo"];

            /*=============================================
  					SE PREGUNTA SI EXISTE OTRA IMAGEN EN LA BD
  					=============================================*/

            if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/inmuebles/default/anonymous.png") {

              unlink($_POST["imagenActual"]);
            } else {

              mkdir($directorio, 0755);

            }

  					/*=============================================
  					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
  					=============================================*/

  					if($_FILES["editarImagen"]["type"] == "image/jpeg"){

  						/*=============================================
  						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
  						=============================================*/

  						$aleatorio = mt_rand(100,999);

  						$ruta = "vistas/img/inmuebles/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

  						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

  						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

  						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

  						imagejpeg($destino, $ruta);

  					}

  					if($_FILES["editarImagen"]["type"] == "image/png"){

  						/*=============================================
  						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
  						=============================================*/

  						$aleatorio = mt_rand(100,999);

  						$ruta = "vistas/img/inmuebles/".$_POST["editarCodigo"]."/".$aleatorio.".png";

  						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

  						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

  						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

  						imagepng($destino, $ruta);

  					}

  				}


          $tabla = inmuebles;

          $datos = array("id_categoria" => $_POST["editarCategoria"],
    					           "id_propietario" => $_POST["editarCliente"],
                         "id_usuario" => $_SESSION["usuario"],
    										 "codigo" => $_POST["editarCodigo"],
                         "direccion" => $_POST["editarDireccion"],
                         "ciudad" => $_POST["editarCiudad"],
                         "estado" => $_POST["editarEstado"],
                         "valor_comercial" => $_POST["editarValorComercial"],
                         "canon_arrendamiento" => $_POST["editarValorArrendamiento"],
                         "comision" => $_POST["editarPorcentaje"],
    					           "matricula" => $_POST["editarMatricula"],
                         "imagen" => $ruta);

          $respuesta = ModeloInmuebles::mdlEditarInmueble($tabla, $datos);

          if($respuesta == "ok"){

  					echo '<script>

  					swal({

  						type: "success",
  						title: "¡El inmueble ha sido actualizado correctamente!",
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

  /*=============================================
  BORRAR INMUEBLE
  =============================================*/

  static public function ctrEliminarInmueble(){

    if(isset($_GET["idInmueble"])){

      $tabla = "inmuebles";
      $datos = $_GET["idInmueble"];

      if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/inmuebles/default/anonymous.png") {


        unlink($_GET["imagen"]);
        rmdir('vistas/img/inmuebles/'.$_GET["codigo"]);

      }

      $respuesta = ModeloInmuebles::mdlEliminarInmueble($tabla, $datos);

      if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El inmueble ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "inmuebles";

								}
							})

				</script>';

			}

    }

  }

}
