/* =====================================
  CARGAR TABLA DINAMICA
==========================================*/

var table = $(".tablaInmuebles").DataTable({

  "ajax":"ajax/datatable-inmuebles.ajax.php",
  "columnDefs": [
    {
      "targets":-12,
      "data": null,
      "defaultContent":'<img class="img-thumbnail imgTabla" width="40px">'
    },
    {
      "targets":-5,
      "data": null,
      "defaultContent":'<button class="btn btn-xs estadoBoton"></button>'
    },
    {
      "targets":-1,
      "data": null,
      "defaultContent":'<div class="btn-group"><button class="btn btn-warning btn-sm btnEditarInmueble" idInmueble data-toggle="modal" data-target="#modalEditarInmueble"><i class="fa fa-pencil"></i></button><button class="btn btn-danger btn-sm btnEliminarInmueble" idInmueble codigo imagen><i class="fa fa-times"></i></button></div>'
    }
  ],
  "language":{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }

});

/* =================================================
  ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
====================================================*/

$('.tablaInmuebles tbody').on( 'click', 'button', function () {

  if (window.matchMedia("(min-width:992px)").matches) {
    var data = table.row( $(this).parents('tr') ).data();
  } else {
    var data = table.row( $(this).parents('tbody tr ul li') ).data();
  }


        $(this).attr("idInmueble", data[12])
        $(this).attr("imagen", data[1])
        $(this).attr("codigo", data[2])

    });

/* =================================================
FUNCION PARA CARGAR IMAGENES
====================================================*/

function cargarImagenes(){

  var imgTabla = $(".imgTabla");

  for (var i = 0; i < imgTabla.length; i++) {

    var data = table.row($(imgTabla[i]).parents("tr")).data();

    $(imgTabla[i]).attr("src", data[1]);

  }

}

/* =================================================
FUNCION PARA CARGAR ESTADOS
====================================================*/

function cargarEstados(){

  var estadoBoton = $(".estadoBoton");

  for (var i = 0; i < estadoBoton.length; i++) {

    var data = table.row($(estadoBoton[i]).parents("tr")).data();


    $(estadoBoton[i]).val(data[8]);
    $(estadoBoton[i]).html(data[8]);

    if (data[8] == "Arrendado" || data[8] == "Vendido") {
      $(estadoBoton[i]).addClass('btn-success');
    } else if (data[8] == "Para Arrendar" || data[8] == "En Venta") {
      $(estadoBoton[i]).addClass('btn-warning');
    }

  }

}


/* =================================================
CARGAR IMAGENES PRIMER LISTADO
====================================================*/


setTimeout(cargarImagenes,2000);
setTimeout(cargarEstados,2000);

/* =================================================
CARGAR IMAGENES PAGINADOR
====================================================*/

$(".dataTables_paginate").click(function(){

  cargarImagenes();
  cargarEstados();

})

/* =================================================
CARGAR IMAGENES BUSCADOR
====================================================*/

$("input[aria-controls='DataTables_Table_0']").focus(function(){

  $(document).keyup(function(event){

    event.preventDefault();

    cargarImagenes();
    cargarEstados();

  })
})

/* =================================================
CARGAR IMAGENES FILTRO CANTIDAD
====================================================*/

$("select[name='DataTables_Table_0_length']").change(function(){

    cargarImagenes();
    cargarEstados();

})

/* =================================================
CARGAR IMAGENES FILTRO ORDENAR
====================================================*/

$(".sorting").click(function(){

    cargarImagenes();
    cargarEstados();

})


/* =================================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CODIGO DEL INMUEBLE
====================================================*/


$("#nuevaCategoria").change(function(){

  var idCategoria = $(this).val();

  var datos =new FormData();
  datos.append("idCategoria",idCategoria);

  $.ajax({

    url:"ajax/inmuebles.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
    success:function(respuesta){

      if(!respuesta){

        var nuevoCodigo = idCategoria + "001";
        $("#nuevoCodigo").val(nuevoCodigo);

      } else {

        var nuevoCodigo = Number(respuesta["codigo"]) + 1;
        $("#nuevoCodigo").val(nuevoCodigo);

      }


    }

  })


})

/* ===============================================================================
FORMATEANDO LOS MILES EN LA ENTRADA DE VALOR DE INMUEBLE
==================================================================================*/

$("#nuevoValorComercial").on({
    "change": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#nuevoValorComercial').attr('valorComercial', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusin": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#nuevoValorComercial').attr('valorComercial', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusout": function (event){
        var valor = $(this).attr('valorComercial');
        $('#nuevoValorComercial').val(valor);
    }
});



$("#nuevoValorArrendamiento").on({
    "change": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#nuevoValorArrendamiento').attr('valorArrendamiento', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusin": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#nuevoValorArrendamiento').attr('valorArrendamiento', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusout": function (event){
        var valor = $(this).attr('valorArrendamiento');
        $('#nuevoValorArrendamiento').val(valor);
    }
});



/* ===============================================================================
FORMATEANDO LOS MILES EN LA ENTRADA DE VALOR DE INMUEBLE AL EDITAR
==================================================================================*/

$("#editarValorComercial").on({
    "change": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#editarValorComercial').attr('valorComercial', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusin": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#editarValorComercial').attr('valorComercial', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusout": function (event){
        var valor = $(this).attr('valorComercial');
        $('#editarValorComercial').val(valor);
    }
});



$("#editarValorArrendamiento").on({
    "change": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#editarValorArrendamiento').attr('valorArrendamiento', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusin": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#editarValorArrendamiento').attr('valorArrendamiento', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusout": function (event){
        var valor = $(this).attr('valorArrendamiento');
        $('#editarValorArrendamiento').val(valor);
    }
});


/* ===============================================================================
HABILITANDO CAMBIO DEL PORCENTAJE DE LA COMISION
==================================================================================*/

$(".comision").on("ifUnchecked", function(){

  $("#nuevoPorcentaje").prop("readonly", true);
  $("#editarPorcentaje").prop("readonly", true);

})

$(".comision").on("ifChecked", function(){

  $("#nuevoPorcentaje").prop("readonly", false);
  $("#editarPorcentaje").prop("readonly", false);

})


/*=============================================
SUBIENDO LA FOTO DEL INMUEBLE
=============================================*/
$(".nuevaImagen").change(function(){

	var imagen = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 6000000){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 5MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})


/*=============================================
EDITAR INMUEBLE
=============================================*/

$(".tablaInmuebles tbody").on('click', 'button.btnEditarInmueble' ,function(){

  var idInmueble = $(this).attr("idInmueble");

  var datos = new FormData();
  datos.append("idInmueble", idInmueble);

  $.ajax({

    url: "ajax/inmuebles.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      var datosCategoria = new FormData();
      datosCategoria.append("idCategoria",respuesta["id_categoria"]);

      $.ajax({

        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

          $("#editarCategoria").val(respuesta["id"]);
          $("#editarCategoria").html(respuesta["categoria"]);
        }

      })

      $("#editarCodigo").val(respuesta["codigo"]);

      $("#editarMatricula").val(respuesta["matricula"]);

      $("#editarCliente").val(respuesta["id_propietario"]);

      $("#editarCliente").html(respuesta["id_propietario"]);

      $("#editarDireccion").val(respuesta["direccion"]);

      $("#editarDireccion").val(respuesta["direccion"]);

      $("#editarCiudad").val(respuesta["ciudad"]);

      $("#editarValorComercial").val(respuesta["valor_comercial"]);

      $("#editarValorArrendamiento").val(respuesta["canon_arrendamiento"]);

      $("#editarEstado").val(respuesta["estado"]);

      $("#editarEstado").html(respuesta["estado"])

      $("#editarPorcentaje").val(respuesta["comision"]);

      if (respuesta["imagen"] != "") {

        $("#imagenActual").val(respuesta["imagen"]);

        $(".previsualizar").attr("src", respuesta["imagen"]);

      }

    }

  })

})


/*=============================================
ELIMINAR INMUEBLE
=============================================*/

$(".tablaInmuebles tbody").on('click', 'button.btnEliminarInmueble' ,function(){

  var idInmueble = $(this).attr("idInmueble");
  var codigo = $(this).attr("codigo");
  var imagen = $(this).attr("imagen");

  swal({

    title: '¿Esta seguro de borrar el inmueble',
		text: "!Si no lo esta puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar inmueble!'

  }).then(function(result){

		if (result.value) {

			window.location = "index.php?ruta=inmuebles&idInmueble="+idInmueble+"&codigo="+codigo+"&imagen="+imagen;
		}


	})


})
