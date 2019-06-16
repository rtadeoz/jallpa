<?php include_once '../../view/template/admin/admin_head.php'; ?>

<?php include_once '../../view/template/admin/admin_menu.php'; ?>

<?php include_once '../../view/template/admin/admin_menu_up.php'; ?>

<!-- Page Heading -->


<div class="row">
    <div class="col clearfix">
        <span class="float-left"><h1 class="h3 mb-4 text-gray-800">PATRIMONIO CULTURAL</h1></span>
        <span class="float-right">
            <a onclick="showForm('save')" href="#" class="btn btn-primary btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Nuevo</span>
            </a>
        </span>
    </div>
</div>

<!-- LISTADO DE INMUEBLES -->
<div class="card shadow mb-4" id="cardListadoInmuebles">
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
						<th>Opciones</th>
						<th>Nombre</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tfoot>
		 			<tr>
						<th>Opciones</th>
						<th>Nombre</th>
						<th>Estado</th>
					</tr>
				</tfoot>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php include_once '../../view/template/admin/admin_footer.php'; ?>

<?php include_once '../../view/template/admin/admin_js.php'; ?>