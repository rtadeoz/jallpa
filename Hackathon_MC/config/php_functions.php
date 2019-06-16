<?php
	session_start();

	// Funcion que devuelve un valor unico, dependiendo la longitud que se le asigne, Longiyud maxima 32 caracteres.
	function getUniqueCode($_len){
		$length = $_len;
		$code = md5(uniqid(rand(), true));
		if ($length != "") return substr($code, 0, $length);
		else return $code;
	}

	//43a2348027cdb8d216f4fb15fd9e1e4f
	//43a2348027cdb81234d216f4fb15fd9e1e4f
	/*
	*
	* Liberias vencidas
	*
	function encriptar($cadena){
		$key='8441';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
		return $encrypted; //Devuelve el string encriptado
	}

	function desencriptar($cadena){
		$key='8441';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		return $decrypted;  //Devuelve el string desencriptado
	}
	*/

	// CLAVE: 1- 6 => OUxuTmNsWmxHUW1EUGZHazIzYkVHdz09
	
	function encriptar($string){
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = '8441';
		$secret_iv = '8441';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);

		return $output;
	}

	function desencriptar($string){
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = '8441';
		$secret_iv = '8441';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

		return $output;
	}


	function encrypt_decrypt($action, $string) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}

	function new_session($nombresession, $valorsession) {
		//return $_SESSION['$nombresession'] = $valorsession;
		$_SESSION[$nombresession] = $valorsession;
	}

	function destroy_session($nombresession) {
		//Destruir Session
		unset($_SESSION[$nombresession]);
	}

	// Codigos de ERROR de UPLOAD
	function FileUploadErrorMsg($error_code) {
		switch ($error_code) { 
			case UPLOAD_ERR_INI_SIZE: 
				return "El archivo es más grande que lo permitido por el Servidor."; 
			case UPLOAD_ERR_FORM_SIZE: 
				return "El archivo subido es demasiado grande."; 
			case UPLOAD_ERR_PARTIAL: 
				return "El archivo subido no se terminó de cargar (probablemente cancelado por el usuario)."; 
			case UPLOAD_ERR_NO_FILE: 
				return "No se subió ningún archivo"; 
			case UPLOAD_ERR_NO_TMP_DIR: 
				return "Error del servidor: Falta el directorio temporal."; 
			case UPLOAD_ERR_CANT_WRITE: 
				return "Error del servidor: Error de escritura en disco"; 
			case UPLOAD_ERR_EXTENSION: 
				return "Error del servidor: Subida detenida por la extención";
		  default: 
				return "Error del servidor: ".$error_code; 
		} 
	}

	function validar_existencia_archivo($ruta, $archivo) {
		$file = $ruta.$archivo;
		$rpta = 0;
		if (file_exists($file)) {
			$rpta = 1; // EXISTE
		} else {
			$rpta = 0; // NO EXISTE
		}
		return $rpta;
	}

	// Eliminar archivo
	function eliminar_archivo($ruta, $archivo) {
		$file = $ruta.$archivo;
		unlink($file);
	}

	//Valida el TIPO DE IMAGEN
	function validar_extension_imagen($extension) {
		$extensionesValidas = array("image/jpeg", "image/jpg", "image/png");
		//$arrayArchivo = pathinfo($ruta.$archivo);
		//$extension = $arrayArchivo['extension'];
		//$rpta = 0;

		if(!in_array($extension, $extensionesValidas)) {
			//$rpta = 0; // INVALIDO
			return 0;
		} else {
			//$rpta = 1; // VALIDO
			return 1;
		}
	}



?>