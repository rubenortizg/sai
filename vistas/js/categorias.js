/*=============================================
EDITAR CATEGORIA
=============================================*/

$(".btnEditarCategoria").click(function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({

		url:"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarCategoria").val(respuesta["categoria"]);
			$("#idCategoria").val(respuesta["id"]);

		}

	})

})

/*=============================================
REVISAR SI LA CATEGORIA ESTA REGISTRADA
=============================================*/

$("#nuevaCategoria").change(function(){

	$(".alert").remove();

	var categoria = $(this).val();

	var datos = new FormData();
	datos.append("validarCategoria", categoria);

	console.log("categoria", categoria);

	$.ajax({

		url:"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			if (respuesta) {

				$("#nuevaCategoria").parent().before('<div class="alert alert-warning">Esta categoría ya existe en la base de datos</div>');
				$("#nuevaCategoria").val("");


			}
		}

	})

})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/

$(".btnEliminarCategoria").click(function(){

	var idCategoria = $(this).attr("idCategoria");

	swal({
		title: '¿Esta seguro de borrar la categoria?',
		text: "¡Si no lo esta puede cancelar la acción! ",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar categoria!'
	}).then(function(result){

		if (result.value) {

			window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;

		}

	})


})
