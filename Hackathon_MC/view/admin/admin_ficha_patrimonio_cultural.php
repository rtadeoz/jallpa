<?php include_once '../../view/template/admin/admin_head.php'; ?>

<?php include_once '../../view/template/admin/admin_menu.php'; ?>

<?php include_once '../../view/template/admin/admin_menu_up.php'; ?>

<!-- Page Heading -->


<div class="row">
    <div class="col clearfix">
        <span class="float-left"><h1 class="h3 mb-4 text-gray-800">FICHA DE PATRIMONIO CULTURAL</h1></span>
        <span class="float-right">
            <a onclick="showForm('save')" href="#" class="btn btn-primary btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Crear Ficha de Patrimonio</span>
            </a>
        </span>
    </div>
</div>

<!-- LISTADO DE INMUEBLES -->
<div class="card shadow mb-4" id="cardListadoRegistros">
	<div class="card-header py-3">
        <div class="col clearfix">
    		<h6 class="m-0 font-weight-bold text-primary">Listado de Patrimonios Culturales</h6>
        </div>
	</div>
	<div class="card-body">
        <div id="mensaje">
            <!-- Mensaje -->
        </div>
		<div class="table-responsive">
			<table id="tbllistado" class="table table-bordered table-striped table-hover dataTable js-exportable">
				<thead>
					<tr>
						<th>Ver</th>
						<th>Patrimonio</th>
						<th>Categoria</th>
						<th>Ubigeo</th>
						<th>Tipo Registro</th>
						<th>Fecha Registro</th>
					</tr>
				</thead>
				<tfoot>
		 			<tr>
                        <th>Ver</th>
						<th>Patrimonio</th>
						<th>Categoria</th>
						<th>Ubigeo</th>
						<th>Tipo Registro</th>
						<th>Fecha Registro</th>
					</tr>
				</tfoot>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- MODIFICAR INMUEBLES -->
<div class="card shadow mb-4" id="cardEditarRegistro">
	<div class="card-header py-3">
        <div class="col clearfix">
    		<h6 class="m-0 font-weight-bold text-primary">Editar Patrimonios Culturales</h6>
        </div>
	</div>
	<div class="card-body">
        <div id="mensaje">
            <!-- Mensaje -->
        </div>
		<form action="" id="frmEditFichaPatrimonioCultural">
            <input type="hidden" name="idfichapatrimoniocultural" id="idfichapatrimoniocultural">											
            <input type="hidden" name="idpatrimonio" id="idpatrimonio">											
            <div class="form-group">
                <div class="form-line">
                    <label for="patrimonio">Patrimonio:</label>
                    <input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Ingrese Patrimonio">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="categoria">Categoria:</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese Categoria">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="ubigeo">Ubigeo:</label>
                    <input type="text" class="form-control" id="ubigeo" name="ubigeo" placeholder="Ingrese Ubigeo">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="direccion">Direccion:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Direccion">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="pos_x">Posicion X:</label>
                    <input type="text" class="form-control" id="pos_x" name="pos_x" placeholder="Ingrese Posicion X">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="pos_y">Posicion Y:</label>
                    <input type="text" class="form-control" id="pos_y" name="pos_y" placeholder="Ingrese Posicion Y">
                </div>
            </div>

            <div class="row">
                <div class="col clearfix">
                    <!-- <span class="float-left"><h1 class="h3 mb-4 text-gray-800">FICHA DE PATRIMONIO CULTURAL</h1></span> -->
                    <span class="float-left">
                        <a onclick="cancelarform()" href="#" class="btn btn-danger btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </a>
                    </span>
                    <span class="float-right">
                        <button type="submit" id="btnEditar" class="btn btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Aprobar</span>
                        </button>
                    </span>
                </div>
            </div>

        </form>
	</div>
</div>


<!-- INGRESO INMUEBLES -->
<div class="card shadow mb-4" id="cardGuardarRegistro">
	<div class="card-header py-3">
        <div class="col clearfix">
    		<h6 class="m-0 font-weight-bold text-primary">Editar Patrimonios Culturales</h6>
        </div>
	</div>
	<div class="card-body">
        <div id="mensaje">
            <!-- Mensaje -->
        </div>
		<form action="" id="frmAddFichaPatrimonioCultural">
            <input type="hidden" name="idfichapatrimoniocultural" id="idfichapatrimoniocultural">											
            <input type="hidden" name="idpatrimonio" id="idpatrimonio">	
            <div class="form-group">
                <div class="form-line">
                    <label for="patrimonio">Patrimonio:</label>
                    <input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Ingrese Patrimonio">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="categoria">Categoria:</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese Categoria">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="ubigeo">Ubigeo:</label>
                    <input type="text" class="form-control" id="ubigeo" name="ubigeo" placeholder="Ingrese Ubigeo">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="direccion">Direccion:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Direccion">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="pos_x">Posicion X:</label>
                    <input type="text" class="form-control" id="pos_x" name="pos_x" placeholder="Ingrese Posicion X">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="pos_y">Posicion Y:</label>
                    <input type="text" class="form-control" id="pos_y" name="pos_y" placeholder="Ingrese Posicion Y">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <a onclick="cancelarform()" href="#" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-camera"></i>
                        </span>
                        <span class="text">Subir Fotos</span>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col clearfix">
                    <!-- <span class="float-left"><h1 class="h3 mb-4 text-gray-800">FICHA DE PATRIMONIO CULTURAL</h1></span> -->
                    <span class="float-left">
                        <a onclick="cancelarform()" href="#" class="btn btn-danger btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </a>
                    </span>
                    <span class="float-right">
                        <button type="submit" id="btnGuardar" class="btn btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Aprobar</span>
                        </button>
                    </span>
                </div>
            </div>

        </form>
	</div>
</div>

<?php include_once '../../view/template/admin/admin_footer.php'; ?>

<?php include_once '../../view/template/admin/admin_js.php'; ?>

<script src="../../js/mainFunctions.js"></script>
<script src="../../js/admin/jsFichaPatrimonioCultural.js"></script>
