/* =====================================
  CARGAR TABLA DINAMICA
==========================================*/

var tableComprobantes = $(".tablaComprobantes").DataTable({

  "ajax":"ajax/datatable-comprobantes.ajax.php",
  "columnDefs": [
    {
      "targets":-9,
      "data": null,
      "defaultContent":'<img class="img-thumbnail imgTablaComprobante" width="40px">'
    },
    {
      "targets":-3,
      "data": null,
      "defaultContent":'<button class="btn btn-xs estadoBotonComprobante"></button>'
    },
    {
      "targets":-1,
      "data": null,
      "defaultContent":'<div class="btn-group"><button class="btn btn-primary btn-sm agregarInmueble" idInmueble>Agregar</button></div>'
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

})

/* =================================================
  ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES INMUEBLES
====================================================*/

$('.tablaComprobantes tbody').on( 'click', 'button.agregarInmueble', function () {

  if (window.matchMedia("(min-width:992px)").matches) {
    var data = tableComprobantes.row( $(this).parents('tr') ).data();
  } else {
    var data = tableComprobantes.row( $(this).parents('tbody tr ul li') ).data();
  }


        $(this).attr("idInmueble", data[9])
        $(this).attr("imagen", data[1])
        $(this).attr("codigo", data[2])

})

/* =================================================
FUNCION PARA CARGAR IMAGENES
====================================================*/

function cargarImagenesInmuebles(){

  var imgTabla = $(".imgTablaComprobante");

  for (var i = 0; i < imgTabla.length; i++) {

    var data = tableComprobantes.row($(imgTabla[i]).parents("tr")).data();

    $(imgTabla[i]).attr("src", data[1]);

  }

}

/* =================================================
FUNCION PARA CARGAR ESTADOS
====================================================*/

function cargarEstadosInmuebles(){

  var estadoBoton = $(".estadoBotonComprobante");

  for (var i = 0; i < estadoBoton.length; i++) {

    var data = tableComprobantes.row($(estadoBoton[i]).parents("tr")).data();


    $(estadoBoton[i]).val(data[7]);
    $(estadoBoton[i]).html(data[7]);

    if (data[7] == "Arrendado" || data[7] == "Vendido") {
      $(estadoBoton[i]).addClass('btn-success');
    } else if (data[7] == "Para Arrendar" || data[7] == "En Venta") {
      $(estadoBoton[i]).addClass('btn-warning');
    }

  }

}


/* =================================================
CARGAR IMAGENES PRIMER LISTADO
====================================================*/


setTimeout(cargarImagenesInmuebles,2000);
setTimeout(cargarEstadosInmuebles,2000);


/* =================================================
CARGAR IMAGENES PAGINADOR
====================================================*/

$(".dataTables_paginate").click(function(){

  cargarImagenesInmuebles();
  cargarEstadosInmuebles();

})

/* =================================================
CARGAR IMAGENES BUSCADOR
====================================================*/

$("input[aria-controls='DataTables_Table_0']").focus(function(){

  $(document).keyup(function(event){

    event.preventDefault();

    cargarImagenesInmuebles();
    cargarEstadosInmuebles();

  })
})

/* =================================================
CARGAR IMAGENES FILTRO CANTIDAD
====================================================*/

$("select[name='DataTables_Table_0_length']").change(function(){

    cargarImagenesInmuebles();
    cargarEstadosInmuebles();

})

/* =================================================
CARGAR IMAGENES FILTRO ORDENAR
====================================================*/

$(".sorting").click(function(){

    cargarImagenesInmuebles();
    cargarEstadosInmuebles();

})

/* =================================================
FUNCION PARA INABILITAR INMUEBLES
====================================================*/

function desactivarInmuebles(){

  var desactivarBoton = $(".agregarInmueble");

  for (var i = 0; i < desactivarBoton.length; i++) {

    var data = tableComprobantes.row($(desactivarBoton[i]).parents("tr")).data();

    $(desactivarBoton[i]).removeClass("btn-primary agregarInmueble");
    $(desactivarBoton[i]).addClass("btn-default ");

  }

}

/* =================================================
AGREGANDO INMUEBLES AL COMPROBANTE DESDE LA TABLA
====================================================*/

$(".tablaComprobantes tbody").on("click", "button.agregarInmueble", function(){

  desactivarInmuebles();

  $(".sorting").click(function(){
      desactivarInmuebles();
  })

  $("select[name='DataTables_Table_0_length']").change(function(){
      desactivarInmuebles();
  })

  $("input[aria-controls='DataTables_Table_0']").focus(function(){
    $(document).keyup(function(event){
      event.preventDefault();
      desactivarInmuebles();
    })
  })

  $(".dataTables_paginate").click(function(){
    desactivarInmuebles();
  })

  var idInmueble = $(this).attr("idInmueble");

  var datos =new FormData();
  datos.append("idInmueble",idInmueble);

  $.ajax({

    url:"ajax/inmuebles.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
    success:function(respuesta){

      var datosCategoria = new FormData();
      datosCategoria.append("idCategoria",respuesta["id_categoria"]);

      var direccion = respuesta["direccion"];
      var canon_arrendamiento = respuesta["canon_arrendamiento"];
      var valor_comercial = respuesta["valor_comercial"];
      var comision = respuesta["comision"];

      $.ajax({

        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

          var categoria = respuesta["categoria"];

          $(".nuevoInmueble").append(

            '<div class="row">'+

              '<div class="form group">'+

                '<!-- Descripción del inmueble -->'+

                '<div class="col-xs-7" style="padding-right:0px">'+
                  '<div class="input-group">'+

                    '<span class="input-group-addon"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>'+
                    '<input type="text" class="form-control" id="agregarInmueble" name="agregarInmueble" value="'+direccion+'" readonly required>'+

                  '</div>'+
                '</div>'+

                '<!-- Tipo de Inmueble -->'+

                '<div class="col-xs-5">'+
                  '<div class="input-group">'+
                    '<input type="text" class="form-control" id="tipoInmueble" name="tipoInmueble" value="'+categoria+'"readonly>'+
                    '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
                  '</div>'+
                '</div>'+

              '</div>'+

            '</div>'

          )

        }

      })

    }

  })

})

/* =================================================
AGREGANDO CONCEPTOS AL COMPROBANTE DESDE LA TABLA
====================================================*/

$(".tablaConceptos tbody").on("click", "button.agregarConcepto", function(){

  var idConcepto = $(this).attr("idConcepto");

  $(this).removeClass("btn-primary agregarConcepto");
  $(this).addClass("btn-default ");

  var datos =new FormData();
  datos.append("idConcepto",idConcepto);

  $.ajax({

    url:"ajax/conceptos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
    success:function(respuesta){

      var concepto = respuesta["concepto"];
      console.log("concepto",concepto);

      $(".nuevoConcepto").append(

        '<div class="row" style="padding:5px 15px">'+

          '<div class="form group row" style="padding:5px 5px">'+

            '<!-- Concepto del comprobante -->'+

            '<div class="col-xs-6" style="padding-right:0px">'+
              '<div class="input-group">'+
                '<span class="input-group-addon"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>'+
                '<input type="text" class="form-control" id="nuevoConcepto" name="nuevoConcepto" value="'+concepto+'" readonly required>'+
              '</div>'+
            '</div>'+

            '<!-- Valor pagado -->'+

            '<div class="col-xs-6">'+
              '<div class="input-group">'+

                '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
                '<input type="number" min="1" class="form-control" id="nuevoValorComprobante" name="nuevoValorComprobante" placeholder="0" valorConcepto required>'+


              '</div>'+
            '</div>'+

          '</div>'+

          '<!--====================================='+
          'PERIODO COMPROBANTE'+
          '======================================-->'+

          '<div class="form group row" style="padding:5px 20px">'+

            '<div class="input-group">'+

              '<div class="input-group-addon">'+
              '  <i class="fa fa-calendar"></i>'+
              '</div>'+

              '<button type="button" class="btn btn-default pull-left" id="daterange-btn">'+
                '<span>Periodo del concepto</span>'+
                '<i class="fa fa-caret-down"></i>'+
              '</button>'+

            '</div>'+

          '</div>'+

        '</div>'

      )

    }

  })

})

/* ===============================================================================
FORMATEANDO LOS MILES EN LA ENTRADA DE VALOR DEL CONCEPTO
==================================================================================*/

$("#nuevoValorComprobante").on({
    "change": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#nuevoValorComprobante').attr('valorConcepto', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusin": function (event) {
        $(event.target).val(function (index, value ) {
          var valor = Number(value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g,""));
          $('#nuevoValorComprobante').attr('valorConcepto', valor);
          return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    },
    "focusout": function (event){
        var valor = $(this).attr('valorConcepto');
        $('#nuevoValorComprobante').val(valor);
    }
});
