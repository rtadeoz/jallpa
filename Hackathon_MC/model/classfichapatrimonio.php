<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class classFichaPatrimonioInmueble
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementamos un método para insertar registros
	public function insertar ($idpatrimonio, $nombrepatrimonio, $idubigeo, $idcategoria, $direccion, $posx, $posy, $fechacreacionpatrimonio, $tiporegistro, $fecharegistro, $fechamodificacion, $fechaaprovacion)
	{
		$sql="INSERT INTO ficha_patrimonio_cultural(
			id_property, 
			property_name, 
			id_district, 
			id_category, 
			address, 
			x, 
			y, 
			creation_date, 
			type_register, 
			date_register, 
			modification_date, 
			aproval_date, 
			status
		) VALUES (
			'$idpatrimonio', 
			'$nombrepatrimonio', 
			150119, 
			2, 
			'$direccion', 
			'$posx', 
			'$posy',
			CURDATE(), 
			'$tiporegistro', 
			CURDATE(), 
			CURDATE(), 
			CURDATE(),
			1)";
		return ejecutarConsulta($sql);
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
	public function mostrar($idfichapatrimonio)
	{
		//TPB.TypPub_Name,
		//PNM.PrvApm_Name,
		//PSR.PrvSrv_Name,
		//GPR.Grp_Name,
		$sql="
        SELECT 
        p.id_ficha_patrimonio
       ,p.property_name
       ,c.category_name
       ,concat(u.department_name, '-' ,u.province_name, '-' ,u.distrct_name) as ubigeo
       ,p.type_register
       ,p.date_register
       FROM db_hackathon_mc_jallpa.FICHA_PATRIMONIO_CULTURAL p
       -- Ubigeo
       left join db_hackathon_mc_jallpa.ubigeo u 
       on p.id_district = u.id_district
       -- Categoria
       left join db_hackathon_mc_jallpa.categoria_inmuebles c 
       on p.id_category = c.id_category
           WHERE p.status = 1
			WHERE p.id_ficha_patrimonio = $idfichapatrimonio
		";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listarCRUD()
	{
		$sql="
        SELECT 
         p.id_ficha_patrimonio
        ,p.property_name
        ,c.category_name
        ,concat(u.department_name, '-' ,u.province_name, '-' ,u.distrct_name) as ubigeo
        ,p.type_register
		,p.date_register
        FROM db_hackathon_mc_jallpa.FICHA_PATRIMONIO_CULTURAL p
        -- Ubigeo
        left join db_hackathon_mc_jallpa.ubigeo u 
        on p.id_district = u.id_district
        -- Categoria
        left join db_hackathon_mc_jallpa.categoria_inmuebles c 
        on p.id_category = c.id_category
			WHERE p.status = 1
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