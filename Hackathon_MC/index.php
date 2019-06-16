<?php  

session_start();

if ( isset($_SESSION["id_usuario"]) && isset($_SESSION["usuario_correo"]) ) {
	header("location: /view/admin/index_admin.php"); // Existe
} else {
	header("location: /view/web/jallpa_LoginDeUsuarios.php"); // No existe
}



?>