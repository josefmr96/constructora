<?php
  require_once("../../services/empresaServices.php");
  require_once("../../services/domicilioServices.php");
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Obras</title>
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
							<h3>Listado de Obras </h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Listado de Obras</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Registrar nuevo Obras</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 10%;">Obra</th>
							<th style="width: 10%;">Empresa</th>
							<th style="width: 10%;">Comentario</th>
							<th style="width: 10%;">Localidad</th>
							<th style="width: 10%;">Provincia</th>
							<th style="width: 10%;">Código Postal</th>
						
							<th class="text-center" style="width: 5%;">Elementos</th>
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

	<?php require_once("modalObras.php");?>

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="obras.js"></script>

</body>
</html>
