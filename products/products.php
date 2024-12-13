<?php 
session_start();

include("../config.php");
include("../model/productos.php");


$producto = new producto();
$listado_productos = $producto->listarProductosDisponibles();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
	<?php include('../navbar.php'); ?>
 <div class="container">
 		<div class="row">
	<?php 
	foreach ($listado_productos as $producto) {
		echo '
			<div class="card col-3 m-4" style="width: 18rem;">
				<img src="../'.$producto["imagen"].'" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">'.$producto["detalle"].'</h5>
					<p class="card-text">$'.$producto["precio"].'</p>
					<a href="#" class="btn btn-primary">Agregar al carrito</a>
				</div>
			</div>
		';
	}
	?>

	<div/>

	<script type="text/javascript" src="../Assets/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">


</body>
</html>