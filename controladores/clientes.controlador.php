<?php

class ControladorClientes {

  /* =====================================
  CREAR CLIENTES
  ====================================== */

  static public function ctrCrearCliente(){

    if (isset($_POST["nuevoCliente"])) {


      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"])  &&
         preg_match('/^[0-9]+$/', $_POST["nuevoDocumento"]) &&
         preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
         preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
         preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCelular"]) &&
         preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ#,_\-\. ]+$/', $_POST["nuevaDireccion"]) &&
         preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCiudad"]) &&
         preg_match('/^[\-0-9\.]+$/', $_POST["nuevaCuenta"])){

           $tabla = "clientes";

           $datos = array("identificacion" => $_POST["nuevoDocumento"],
     					            "tipoid" => $_POST["nuevoTipoDocumento"],
                          "nombre" => $_POST["nuevoCliente"],
     										  "direccion" => $_POST["nuevaDireccion"],
                          "correo" => $_POST["nuevoEmail"],
                          "telfijo" => $_POST["nuevoTelefono"],
                          "celular" => $_POST["nuevoCelular"],
                          "ciudad" => $_POST["nuevaCiudad"],
                          "banco" => $_POST["nuevoBanco"],
                          "tcuenta" => $_POST["nuevoTipoCuenta"],
     					            "ncuenta" => $_POST["nuevaCuenta"],
                          "idusuario" => $_SESSION["id"]);

            $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

            if($respuesta == "ok"){

    					echo '<script>

    					swal({

    						type: "success",
    						title: "¡El cliente ha sido guardado correctamente!",
    						showConfirmButton: true,
    						confirmButtonText: "Cerrar",
                closeOnConfirm: false

    					}).then(function(result){

    						if(result.value){

    							window.location = "clientes";

    						}

    					});


    					</script>';


    				}

      } else {

        echo '<script>

         swal({

           type: "error",
           title: "¡El cliente no puede ir con los campos vacíos o llevar caracteres especiales!",
           showConfirmButton: true,
           confirmButtonText: "Cerrar",
           closeOnConfirm: false
         }).then(function(result){

           if(result.value){

             window.location = "clientes";

           }

         });


       </script>';

      }

    }

  }

  /*=============================================
  MOSTRAR CLIENTES
  =============================================*/

  static public function ctrMostrarClientes($item, $valor){

    $tabla = "clientes";

    $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

    return $respuesta;
  }


}
