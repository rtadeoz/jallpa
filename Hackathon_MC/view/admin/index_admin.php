<?php include_once '../../view/template/admin/admin_head.php'; ?>

<?php include_once '../../view/template/admin/admin_menu.php'; ?>

<?php include_once '../../view/template/admin/admin_menu_up.php'; ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">BIENVENIDO: <?php echo $_SESSION["usuario_nombre"]; ?></h1>


<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">USUARIOS</h6>
	</div>
	<div class="card-body">
		The styling for this basic card example is created by using default Bootstrap utility classes. By using utility classes, the style of the card component can be easily modified with no need for any custom CSS!
	</div>
</div>


<?php include_once '../../view/template/admin/admin_footer.php'; ?>

<?php include_once '../../view/template/admin/admin_js.php'; ?>