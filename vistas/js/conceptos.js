/*=============================================
EDITAR CONCEPTO
=============================================*/

$(".tablas").on("click", ".btnEditarConcepto", function(){

	var idConcepto = $(this).attr("idConcepto");

	var datos = new FormData();
	datos.append("idConcepto", idConcepto);

	$.ajax({

		url:"ajax/conceptos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarConcepto").val(respuesta["concepto"]);
			$("#idConcepto").val(respuesta["id"]);

		}

	})

})

/*=============================================
REVISAR SI EL CONCEPTO ESTA REGISTRADO
=============================================*/

$("#nuevoConcepto").change(function(){

	$(".alert").remove();

	var concepto = $(this).val();

	var datos = new FormData();
	datos.append("validarConcepto", concepto);

	$.ajax({

		url:"ajax/conceptos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			if (respuesta) {

				$("#nuevoConcepto").parent().before('<div class="alert alert-warning">Este concepto ya existe en la base de datos</div>');
				$("#nuevoConcepto").val("");


			}
		}

	})

})

/*=============================================
ELIMINAR CONCEPTO
=============================================*/


$(".tablas").on("click", ".btnEliminarConcepto", function(){

	var idConcepto = $(this).attr("idConcepto");

	swal({
		title: '¿Esta seguro de borrar el concepto?',
		text: "¡Si no lo esta puede cancelar la acción! ",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar concepto!'
	}).then(function(result){

		if (result.value) {

			window.location = "index.php?ruta=conceptos&idConcepto="+idConcepto;

		}

	})


})
