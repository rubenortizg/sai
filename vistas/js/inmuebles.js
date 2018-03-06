/* =====================================
  CARGAR TABLA DINAMICA
==========================================*/

var table = $(".tablaInmuebles").DataTable({

  "ajax":"ajax/inmuebles.ajax.php",
  "columnDefs": [
    {
      "targets":-11,
      "data": null,
      "defaultContent":'<img class="img-thumbnail imgTabla" width="40px">'
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
