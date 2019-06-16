<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class classUsuarios
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    public function login($dni, $password)
	{
		$sql="
			SELECT id_user, id_doc, user_email, user_name, user_last_name, user_mothers_last_name
			FROM USUARIOS
			WHERE id_doc = '$dni'
			AND user_password = '$password'
			AND user_status = 1;";
		return ejecutarConsulta($sql);
	}







	
	//Implementamos un método para insertar registros
	public function insertar ($idcongregacion, $idgenero, $idtipopublicador, $idprivilegionombramiento, $idprivilegioservicio, $idgrupopredicacion, $add_nombre, $add_apaterno, $add_amaterno, $add_numerocelular, $add_numerotelefono)
	{
		$sql="INSERT INTO USER (
			 Cng_Id
			,Gen_Id
			,TypPub_Id
			,PrvApm_Id
			,PrvSrv_Id
			,Grp_Id
			,User_Name
			,User_Last_Name
			,User_Mothers_Last_Name
			,User_Cellphone_Number
			,User_Phone_Number
			,User_Status )
		VALUES (
			 '$idcongregacion'
			,'$idgenero'
			,'$idtipopublicador'
			,'$idprivilegionombramiento'
			,'$idprivilegioservicio'
			,'$idgrupopredicacion'
			,'$add_nombre'
			,'$add_apaterno'
			,'$add_amaterno'
			,'$add_numerocelular'
			,'$add_numerotelefono'
			,1 )";
		return ejecutarConsulta_retornarID($sql);
	}

	//public function editar ($idusuario, $idcongregacion, $idgenero, $idtipopublicador, $idprivilegionombramiento, $idprivilegioservicio, $idgrupopredicacion, $edit_nombre, $edit_apaterno, $edit_amaterno, $edit_numerocelular, $edit_numerotelefono)
	public function editar ($idusuario, $idcongregacion, $edit_idgenero, $edit_idtipopublicador, $edit_idprivilegionombramiento, $edit_idprivilegioservicio, $edit_idgrupopredicacion, $edit_nombre, $edit_apaterno, $edit_amaterno, $edit_numerocelular, $edit_numerotelefono)
	{
		$sql="UPDATE USER SET 
			 Gen_Id = $edit_idgenero
			,TypPub_Id = $edit_idtipopublicador
			,PrvApm_Id = $edit_idprivilegionombramiento
			,PrvSrv_Id = $edit_idprivilegioservicio
			,Grp_Id = $edit_idgrupopredicacion
			,User_Name = '$edit_nombre'
			,User_Last_Name = '$edit_apaterno'
			,User_Mothers_Last_Name = '$edit_amaterno'
			,User_Cellphone_Number = '$edit_numerocelular'
			,User_Phone_Number = '$edit_numerotelefono'
		WHERE User_Id = $idusuario
		  AND Cng_Id = $idcongregacion";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar
	public function desactivar ($idusuario, $idcongregacion)
	{
		$sql="UPDATE USER SET User_Status = 0 WHERE User_Id = $idusuario AND Cng_Id = $idcongregacion";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar
	public function activar($idusuario, $idcongregacion)
	{
		$sql="UPDATE USER SET User_Status = 1 WHERE User_Id = $idusuario AND Cng_Id = $idcongregacion";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function eliminar($idusuario, $idcongregacion)
	{
		$sql="DELETE FROM USER WHERE User_Id=$idusuario AND Cng_Id=$idcongregacion ";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario, $idcongregacion)
	{
		//TPB.TypPub_Name,
		//PNM.PrvApm_Name,
		//PSR.PrvSrv_Name,
		//GPR.Grp_Name,
		$sql="
			SELECT
				USR.User_Id,
				CNG.Cng_Id,
				CNG.Cng_Name,
				USR.Gen_Id,
				TPB.TypPub_Id,
				USR.PrvApm_Id,
				USR.PrvSrv_Id,
				USR.Grp_Id,
				USR.User_Name,
				USR.User_Last_Name,
				USR.User_Mothers_Last_Name,
				USRLG.UsrLg_Id,
				USRLG.UsrLg_Email,
				USR.User_Cellphone_Number,
				USR.User_Phone_Number,
				USR.User_Status
			FROM USER USR
			-- Congregacion
			INNER JOIN CONGREGATION CNG
			ON USR.Cng_Id = CNG.Cng_Id
			-- Tipo de publicador
			LEFT JOIN TYPE_PUBLISHER TPB
			ON USR.TypPub_Id = TPB.TypPub_Id
			-- Grupo de predicacion
			LEFT JOIN group_predication GPR
			ON USR.Grp_Id = GPR.Grp_Id
			-- Privilegio de servicio
			LEFT JOIN privilege_service PSR
			ON USR.PrvSrv_Id = PSR.PrvSrv_Id
			-- Privilegio de nombramiento
			LEFT JOIN privilege_appointment PNM
			ON USR.PrvApm_Id = PNM.PrvApm_Id
			-- Login
			LEFT JOIN USER_LOGIN USRLG
			ON USR.User_Id = USRLG.User_Id
			WHERE USR.Cng_Id = $idcongregacion AND USR.User_Id = $idusuario
		";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listarCRUD($idcongregacion)
	{
		/*$sql="
			SELECT 
			 Id_Usuario
			,Nombre
			,Apellido_Paterno
			,Apellido_Materno
			,Numero_Celular
			,Numero_Telefono
			,Estado_Usuario
			,Id_Login
			,Email
			,Estado_Login
			,Id_Congregacion
			,Congregacion
			,Id_Grupo_Predicacion
			,Nombre_Grupo_Predicacion
			,Id_Privilegio
			,Nombre_Privilegio 
			FROM VW_USER WHERE Id_Congregacion = $idcongregacion
		";*/

		$sql="
			SELECT
				USR.User_Id, 
				CNG.Cng_Id, 
				--CNG.Cng_Name,
				--TPB.TypPub_Id,
				TPB.TypPub_Name,
				--USR.PrvApm_Id,
				PNM.PrvApm_Name,
				--USR.PrvSrv_Id,
				PSR.PrvSrv_Name,
				--USR.Grp_Id,
				GPR.Grp_Name,
				USR.User_Name, 
				USR.User_Last_Name, 
				USR.User_Mothers_Last_Name,
				USRLG.UsrLg_Email, 
				USR.User_Cellphone_Number, 
				USR.User_Phone_Number,
				USR.User_Status
			FROM USER USR
			-- Congregacion
			INNER JOIN CONGREGATION CNG
			ON USR.Cng_Id = CNG.Cng_Id
			-- Tipo de publicador
			LEFT JOIN TYPE_PUBLISHER TPB
			ON USR.TypPub_Id = TPB.TypPub_Id
			-- Grupo de predicacion
			LEFT JOIN group_predication GPR
			ON USR.Grp_Id = GPR.Grp_Id
			-- Privilegio de servicio
			LEFT JOIN privilege_service PSR
			ON USR.PrvSrv_Id = PSR.PrvSrv_Id
			-- Privilegio de nombramiento
			LEFT JOIN privilege_appointment PNM
			ON USR.PrvApm_Id = PNM.PrvApm_Id
			-- Login
			LEFT JOIN USER_LOGIN USRLG
			ON USR.User_Id = USRLG.User_Id
			WHERE USR.Cng_Id = $idcongregacion
		";
		return ejecutarConsulta($sql);		
	}


	public function selectOLD($idcongregacion)
	{
		$sql="SELECT Id_Usuario AS Id_Usuario, CONCAT(Apellido_Paterno, ' ', Apellido_Materno, ', ', Nombre) AS Nombre_Completo FROM VW_USER WHERE Id_Congregacion = $idcongregacion";
		return ejecutarConsulta($sql);
	}

	public function select($idcongregacion)
	{
		$sql="SELECT User_Id, CONCAT(User_Last_Name, ' ', User_Mothers_Last_Name, ', ', User_Name) AS Nombre_Completo FROM USER WHERE Cng_Id = $idcongregacion";
		return ejecutarConsulta($sql);
	}
}

?>