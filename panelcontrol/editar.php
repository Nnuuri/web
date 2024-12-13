<?php 
session_start();
include("../config.php");
include("../model/productos.php");

if(!(isset($_SESSION['rol_user'])) ){
	if($_SESSION['rol_user'] !="admin"){
		header("location:.URL");
	}
}
$producto = new producto();
//
$codigo = $_GET['codigo'];

if(isset($_POST["boton_modificar"])){
	$detalle = $_POST['input_detalle'];
	$precio = $_POST['input_precio'];
	$imagen = $_FILES['input_imagen'];

	$producto->modificarProducto($detalle,$precio,$imagen,$codigo);
}

$datos_encontrados= $producto->buscarCodigo($codigo);
if(!$datos_encontrados){
header('location:panelcontrol.php');

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 	<meta charset="uft-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>misPedidos</title>
 	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">

	<script type="text/javascript" src="../Assets/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><style type="text/css">
		.boton-nuevo{
			border-radius: 50px;
		}
		#previewimg{
			width: 100px;
			height: 100px;
		}
		.imgProducto{
			width: 50px;
			height: 50px;			
		}
	</style>
</head>
</body>
	<?php include('../navbar.php');  ?>
	<div class="container">
		<form method="POST" enctype="multipart/form-data">
			<div class="modal-header">
				<h1 class="modal-title fs-5 mb-5">Editar Producto</h1>
			<hr>
		</div>
		<div class="modal-body">
			<div class="mb-3">
				<label class="form-label">Detalle</label>
				<input type="text" class="form-control" name="input_detalle" value='<?php
				echo $datos_encontrados[0]["detalle"] ?>'>
			</div>
		</div>

			<div class="mb-3">
				<label class="form-label">Precio</label>
				<input type="text" class="form-control" name="input_precio" value='<?php
				echo $datos_encontrados[0]["precio"] ?>'>
			</div>
			<div class="mb-3">
				<label class="form-label">Imagen</label>
				<input class="form-control" type="file" name="input_imagen" accept="image/*" onchange="previewImage(event)">
			</div>

			<div class="mb-3">
				<img id="previewimg" src="<?php
				echo URL.$datos_encontrados[0]['imagen'] ?>" alt="No hay imagen seleccionada.">
			</div>
			<hr>
			<div class="d-flex justify-content-center">
				<button type="submit" name="boton_modificar" class="btn btn-info boton-nuevo"><i class="fa fa-plus"></i>Modificar Producto</button>
			</div>
		</div> 
	</form>   
</body>
</html>