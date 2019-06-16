<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class classInmuebles
{
	//Implementamos nuestro constructor
	public function __construct()
	{

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
	public function editar ($id_property,$address, $x, $edit_idgenero, $y, $date_register, $modification_date, $approval_date)
	{
		$sql="UPDATE db_hackathon_mc_jallpa.inmuebles_full SET 
		address = 'SALAMANCA'
	   ,x = '10'
	   ,y = '10'
	   ,date_register = '2019-06-16'
	   ,modification_date = '2019-06-16'
	   ,approval_date = '2019-06-16'
        WHERE id_property = 3853";
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
	public function listarCRUD()
	{
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