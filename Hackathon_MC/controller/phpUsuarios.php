<?php 
require_once "../model/classUsuarios.php";
require_once "../config/php_functions.php";

$classUsuarios=new classUsuarios();

// FORMULARIO - LOGIN ---------------------------------------------------------------------------------------
$dni=isset($_POST["dni"])? limpiarCadena($_POST["dni"]):"";
$pass=isset($_POST['password'])? limpiarCadena($_POST['password']):"";

//Encriptamos la contraseña
$password = encriptar($pass);
//Genera Contraseña Aleatoria
$contraseñagenerada = getUniqueCode(5);
$contraseña = encriptar($contraseñagenerada);

switch ($_GET["op"]) {

	case 'login':

		$jsondata = array();

		$rspta=$classUsuarios->login($dni, $pass);
		$fetch=$rspta->fetch_object();
		
		if (isset($fetch)) {
			// OK
			$jsondata["success"] = true;
			//Creamos las variables
			new_session('id_usuario', $fetch->id_user);
			new_session('usuario_correo', $fetch->user_email);
			new_session('usuario_nombre', $fetch->user_name.' '.$fetch->user_last_name.' '.$fetch->user_mothers_last_name);
		} else {
			//echo "Correo y/o contraseña incorrectos.";
			$jsondata["success"] = false;
			$jsondata["message"] = "Correo y/o contraseña incorrectos.";
		}

		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata, JSON_FORCE_OBJECT);

	break;

	// case 'resetpass':
	// 	$rspta=$classUserLogin->editarpass($idusuario, $idcongregacion, $contraseña);
	// 	if ($rspta) {
	// 		$correo = true;
	// 		// ENVIAR EMAIL
	// 	}
	// 	echo json_encode($rspta);
 	// 	//echo $rspta ? "La Contraseña del Publicador fue reseteada y enviada a su email." : "No se pudo resetar la contraseña.";
	// break;

	case 'cerrarsesion':
		session_start(); //Iniciar una nueva sesión o reanudar la existente
		session_destroy(); //Destruye la sesión

		header('location: ../../index.php'); //Redirecciona la inicio
	break;
}
?>