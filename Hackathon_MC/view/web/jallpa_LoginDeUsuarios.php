<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>JALLPA - Login</title>
	<!-- Custom fonts for this template-->
	<link href="../../plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="../../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">

	<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
					<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
					<div class="col-lg-6">
						<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">JALLPA</h1>
						</div>
						<form method="POST" id="frmLoginDeUsuario" class="user">

							<div id="error">
								<!-- error will be shown here ! -->
							</div>
							
							<div class="form-group">
								<div class="form-line">
									<input type="text" class="form-control form-control-user" name="dni" id="dni" placeholder="DNI">
								</div>
							</div>
							
							<div class="form-group">
								<div class="form-line">
									<input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Contraseña">
								</div>
							</div>
							
							<!-- <div class="form-group">
							<div class="custom-control custom-checkbox small">
								<input type="checkbox" class="custom-control-input" id="customCheck">
								<label class="custom-control-label" for="customCheck">Remember Me</label>
							</div>
							</div> -->
							<!-- <a href="index.html" class="btn btn-primary btn-user btn-block">Ingresar</a> -->

							<button class="btn btn-primary btn-user btn-block" id="ingresar" type="submit">Ingresar</button>

						</form>
						<hr>
						<div class="text-center">
							<a class="small" href=" ">Olvidaste tu contraseña??</a>
						</div>
						<div class="text-center">
							<a class="small" href="register.html">Crear Cuenta</a>
						</div>
						<hr>
						<div class="text-center">
							<img src="/img/logo-mc.jpg" alt="">
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="../../plugins//jquery/jquery.min.js"></script>
	<script src="../../plugins//bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../../plugins//jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../../js/sb-admin-2.min.js"></script>

	<!-- Validation Plugin Js -->
	<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
	<script src="../../plugins/jquery-validation/localization/messages_es_PE.js"></script>

	<script src="../../js/mainFunctions.js"></script>
	<script src="../../js/admin/jsUsuariosLogin.js"></script>

</body>

</html>
