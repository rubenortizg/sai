/* =====================================
  Subiendo foto usuario
==========================================*/

$(".nuevaFoto").change(function(){

  var imagen = this.files[0];

  // validacion formato de la imagen jpeg o png
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

    $(".nuevaFoto").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "Cerrar",

    });

  } else if (imagen["size"] > 2000000) {

    $(".nuevaFoto").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar mas de 2MB!",
      type: "error",
      confirmButtonText: "Cerrar",

    });

  } else {

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){

      var rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);

    })
  }

})
