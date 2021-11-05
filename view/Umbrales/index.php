<?php
  require_once("../../services/UmbralServices.php");


?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Mantenimiento Umbrales</title>
</head>
<body class="with-side-menu theme-side-caesium-dark-caribbean">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3> Umbrales</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active"> Umbrals</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Agregar nuevo Umbral</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;">Umbral</th>
							<th style="width: 10%;">Descripcion</th>
							<th class="text-center" style="width: 5%;">Editar</th>
							<th class="text-center" style="width: 5%;">Eliminar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("modalUmbral.php");?>

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="Umbral.js"></script>

</body>
</html>
