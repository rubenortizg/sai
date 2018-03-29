/* =====================================
  CARGAR TABLA DINAMICA
==========================================*/

var table = $(".tablaInmuebles").DataTable({

  "ajax":"ajax/datatable-inmuebles.ajax.php",
  "columnDefs": [
    {
      "targets":-11,
      "data": null,
      "defaultContent":'<img class="img-thumbnail imgTabla" width="40px">'
    },
    {
      "targets":-5,
      "data": null,
      "defaultContent":'<button class="btn btn-success btn-xs">Arrendado</button>'
    },
    {
      "targets":-1,
      "data": null,
      "defaultContent":'<div class="btn-group"><button class="btn btn-primary btn-sm btnDetalleInmueble" idInmueble><i class="fa fa-eye"></i></button><button class="btn btn-warning btn-sm btnEditarInmueble" idInmueble><i class="fa fa-pencil"></i></button><button class="btn btn-danger btn-sm btnEliminarInmueble" idInmueble><i class="fa fa-times"></i></button></div>'
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
        var data = table.row( $(this).parents('tr') ).data();

        $(this).attr("idInmueble", data[11])

    } );

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
CARGAR IMAGENES PRIMER LISTADO
====================================================*/


setTimeout(cargarImagenes,2000);

/* =================================================
CARGAR IMAGENES PAGINADOR
====================================================*/

$(".dataTables_paginate").click(function(){

  cargarImagenes();

})

/* =================================================
CARGAR IMAGENES BUSCADOR
====================================================*/

$("input[aria-controls='DataTables_Table_0']").focus(function(){

  $(document).keyup(function(event){

    event.preventDefault();

    cargarImagenes();

  })
})

/* =================================================
CARGAR IMAGENES FILTRO CANTIDAD
====================================================*/

$("select[name='DataTables_Table_0_length']").change(function(){

    cargarImagenes();

})

/* =================================================
CARGAR IMAGENES FILTRO ORDENAR
====================================================*/

$(".sorting").click(function(){

    cargarImagenes();

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



/* ===============================================================================
FORMATEANDO LOS MILES EN LA ENTRADA DE CANON DE ARRENDAMIENTO
==================================================================================*/


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
