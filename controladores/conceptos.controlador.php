<?php

class ControladorConceptos {

  /* =====================================
  CREAR CONCEPTOS
  ====================================== */

  static public function ctrCrearConcepto(){

    if (isset($_POST["nuevoConcepto"])) {

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoConcepto"])){

        $tabla = "conceptos";

        $datos = $_POST["nuevoConcepto"];

        $respuesta = ModeloConceptos::mdlIngresarConcepto($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

					swal({

						type: "success",
						title: "¡El Concepto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "conceptos";

						}

					});


					</script>';
        }

      } else {

        echo '<script>

					swal({

						type: "error",
						title: "¡El concepto no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "conceptos";

						}

					});

				</script>';

      }

    }

  }

  /* =====================================
  EDITAR CONCEPTOS
  ====================================== */

  static public function ctrEditarConcepto(){

    if (isset($_POST["editarConcepto"])) {

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarConcepto"])){

        $tabla = "conceptos";

        $datos = array("concepto" => $_POST["editarConcepto"] ,
                       "id" => $_POST["idConcepto"]);

        $respuesta = ModeloConceptos::modalEditarConcepto($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

          swal({

            type: "success",
            title: "¡El Concepto ha sido editado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){

              window.location = "conceptos";

            }

          });


          </script>';
        }

      } else {

        echo '<script>

          swal({

            type: "error",
            title: "¡El concepto no puede ir vacío o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){

              window.location = "conceptos";

            }

          });

        </script>';

      }

    }

  }

  /* =====================================
  BORRAR CONCEPTOS
  ====================================== */

  static public function ctrBorrarConcepto(){

    if (isset($_GET["idConcepto"])) {

      $tabla = "conceptos";
      $datos = $_GET["idConcepto"];

      $respuesta = ModeloConceptos::mdlBorrarConcepto($tabla, $datos);

      if ($respuesta == "ok") {

        echo'<script>

				swal({
					  type: "success",
					  title: "El concepto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "conceptos";

								}
							})

				</script>';

      }
    }
  }

  /* =====================================
  MOSTRAR CONCEPTOS
  ====================================== */

  static public function ctrMostrarConceptos($item, $valor){

    $tabla = "conceptos";

    $respuesta = ModeloConceptos::mdlMostrarConceptos($tabla, $item, $valor);

    return $respuesta;
  }


}
