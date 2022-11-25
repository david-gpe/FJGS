jQuery(document).on('submit','#formlg', function(event){
	event.preventDefault();

	jQuery.ajax({
		url: 'bd/login.php',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize(),
		beforeSend: function(){

		}

	})
	.done(function(respuesta){
		console.log(respuesta);
		if (!respuesta.error) {
			if (respuesta.tipo = "Administrador") { location.href = '../1admin/indexdmin.php' }

		}else{

		}
	})
	.fail(function(resp){
		console.log(resp.responseText);
	})
	.always(function() {
		console.log("completar")
	});
	
});
