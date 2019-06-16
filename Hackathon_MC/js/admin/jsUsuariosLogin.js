$(function () 
{

	$('#frmLoginDeUsuario').validate({
		rules: {
			// lo que rastrea son los names!
			'dni': { required: true, minlength: 1, maxlength : 8 },
			'password': { required: true,  minlength: 4 }
		},

		highlight: function (input) {
			//console.log(input);
			$(input).parents('.form-line').addClass('error');
		},
		unhighlight: function (input) {
			$(input).parents('.form-line').removeClass('error');
		},
		errorPlacement: function (error, element) {
			$(element).parents('.input-group').append(error);
		},

		submitHandler: submitLoginForm

	});

	/* login submit */
	function submitLoginForm()
	{
        var data = $("#frmLoginDeUsuario").serialize();
        // console.log(data)
		
		$.ajax({
		
			type : 'POST',
			url  : '../../controller/phpUsuarios.php?op=login',
			data : data,

			beforeSend: function() { 
				$("#error").fadeOut();
				$("#ingresar").html('Validando...');
			},

			success :  function(response) {
				if(response.success) {
					setTimeout(' window.location.href = "../../index.php"; ',4000);
				}
				else {
					$("#error").fadeIn(1000, function(){
						$("#error").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+response.message+'</div>');
						$("#ingresar").html('Ingresar');
					});
				}
			}
		
		});

		return false;
	}


});

