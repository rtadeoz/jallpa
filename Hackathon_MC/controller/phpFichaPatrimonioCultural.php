<?php 
require_once "../model/classfichapatrimonio.php";
require_once "../config/php_functions.php";

$classFichaPatrimonioInmueble=new classFichaPatrimonioInmueble();

// FORMULARIO - LOGIN ---------------------------------------------------------------------------------------


$idfichapatrimoniocultural=isset($_POST["idfichapatrimoniocultural"])? limpiarCadena($_POST["idfichapatrimoniocultural"]):"";
$idpatrimonio=isset($_POST["idpatrimonio"])? limpiarCadena($_POST["idpatrimonio"]):"";
$nombrepatrimonio=isset($_POST["patrimonio"])? limpiarCadena($_POST["patrimonio"]):"";
$idubigeo=isset($_POST["ubigeo"])? limpiarCadena($_POST["ubigeo"]):"";
$idcategoria=isset($_POST["categoria"])? limpiarCadena($_POST["categoria"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$posx=isset($_POST["pos_x"])? limpiarCadena($_POST["pos_x"]):"";
$posy=isset($_POST["pos_y"])? limpiarCadena($_POST["pos_y"]):"";
// --------------------------------------------------------------------------------------- //
$fechacreacionpatrimonio="";
$tiporegistro="";
$fecharegistro="";
$fechamodificacion="";
$fechaaprovacion="";

switch ($_GET["op"]) {

    case 'guardaryeditar':
		if (empty($idpatrimonio)){
			$rspta=$classFichaPatrimonioInmueble->insertar($idpatrimonio, $nombrepatrimonio, $idubigeo, $idcategoria, $direccion, $posx, $posy, $fechacreacionpatrimonio, $tiporegistro, $fecharegistro, $fechamodificacion, $fechaaprovacion);
			echo json_encode($rspta);
		}
		else {
			$rspta=$classFichaPatrimonioInmueble->editar($idgrupopredicacion, $idcongregacion, $edit_nombre, $edit_descripcion);
			echo json_encode($rspta);
		}
    break;
    
    case 'mostrar':
		$rspta=$classFichaPatrimonioInmueble->mostrar($idfichapatrimoniocultural);
 		echo json_encode($rspta);
	break;

	case 'listarCRUD':
		$rspta=$classFichaPatrimonioInmueble->listarCRUD();
 		$data= Array();
 		while ($reg=$rspta->fetch_object()) {
 			$data[]=array(
 				"0"=>'<button type="button" class="btn btn-xs btn-warning" onclick="showEditGrupo('.$reg->id_ficha_patrimonio.')"><span class="icon text-white-50"><i class="fas fa-eye"></i></span></button>',
 				"1"=>$reg->property_name,
 				"2"=>$reg->category_name,
 				"3"=>$reg->ubigeo,
 				"4"=>$reg->type_register,
 				"5"=>$reg->date_register
 				// "2"=>($reg->Estado)?'<span class="label label-success">Activo</span>':'<span class="label label-danger">Inactivo</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;
}
?>