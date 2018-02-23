<?php

class ControladorUsuarios
{

  /* =====================================
    INGRESO DE USUARIO
  ========================================== */

  static public function ctrIngresoUsuario(){

    if (isset($_POST["ingUsuario"])) {
      if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingUsuario"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["ingPassword"])) {


        $encriptar = crypt($_POST["ingPassword"], 'N1C0l1s0rt1zL1v3r4M1r71nN1n1Gu713rr2zs0211C0nS712z1L1v3rd331ñ0nR5B3nD1r0r71zM1r7n0r$iz');
        $tabla ="usuarios";

        $item = "usuario";
        $valor = $_POST["ingUsuario"];

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

        if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

          $_SESSION["iniciarSesion"] = "ok";
          $_SESSION["id"] = $respuesta["id"];
          $_SESSION["nombre"] = $respuesta["nombre"];
          $_SESSION["usuario"] = $respuesta["usuario"];
          $_SESSION["foto"] = $respuesta["foto"];
          $_SESSION["perfil"] = $respuesta["perfil"];

          echo '<script>
            window.location = "inicio";
          </script>';

        } else {
          echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo </div>';
        }
      }
    }
  }

  /* =====================================
    REGISTRO DE USUARIO
  ========================================== */

  static public function  ctrCrearUsuario(){

    if (isset($_POST["nuevoUsuario"])) {
      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
          preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
          preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

            /* =====================================
              VALIDAR IMAGEN
            ========================================== */

            $ruta ="";

            if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

              list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

              $nuevoAncho = 500;
              $nuevoAlto = 500;

              /* =====================================
                CREACION DIRECTORIO PARA USUARIO
              ========================================== */

              $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];
              mkdir($directorio, 0755);

              if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                $aleatorio = mt_rand(100,999);
                $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);
              }

              if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                $aleatorio = mt_rand(100,999);
                $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho,$nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);
              }

            }

            /* =====================================
              VALIDAR USUARIO
            ========================================== */

            $tabla = "usuarios";
            $encriptar = crypt($_POST["nuevoPassword"], 'N1C0l1s0rt1zL1v3r4M1r71nN1n1Gu713rr2zs0211C0nS712z1L1v3rd331ñ0nR5B3nD1r0r71zM1r7n0r$iz');

            $datos = array( "nombre" => $_POST["nuevoNombre"],
                            "usuario" => $_POST["nuevoUsuario"],
                            "password" => $encriptar,
                            "correo" => $_POST["nuevoCorreo"],
                            "perfil" => $_POST["nuevoPerfil"],
                            "foto" => $ruta);


            $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

            if($respuesta == "ok"){

              echo '<script>
                swal({
                  type: "success",
                  title: "¡El usuario ha sido guardado correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false

                }).then((result)=>{

                  if(result.value){
                    window.location = "usuarios";
                  }
                });
              </script>';

            }


      } else {

        echo '<script>
          swal({
            type: "error",
            title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

          }).then((result)=>{

            if(result.value){
              window.location = "usuarios";
            }
          });
        </script>';
      }
    }
  }
}
