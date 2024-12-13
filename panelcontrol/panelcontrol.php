
<?php  

session_start();
include("../config.php");
include("../model/productos.php");

if(!(isset($_SESSION['rol_user'])) ){
	if($_SESSION['rol_user'] !="admin"){
		header("location:.URL");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

$producto = new producto();
if(isset($_POST['boton_guardar'])){
	$detalle=$_POST["input_detalle"];
	$precio=$_POST["input_precio"];
	$imagen=$_FILES["input_imagen"];
	$producto->guardarProducto($detalle, $precio, $imagen);

}
if(isset($_POST['boton_deshabilitar'])) {
	$producto->deshabilitarProducto($_POST['boton_deshabilitar']);
}

$listado_productos = $producto->listarProductos();

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



	<script type="text/javascript" src="../Assets/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<style type="text/css">
		.boton-nuevo{
			border-radius: 50px;
		}
		#previewimg{
			width: 100px;
			height: 100px;
		}


	</style>

		<div class="container">
		<div class="row">
			<div class="col-sm-8"><h2><b>Productos</b>>Listado</h2></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-info boton-nuevo" data-bs-toggle="modal" data-bs-target="#agregar-producto"><i class="fa fa-plus"></i> Nuevo Producto</button>
			</div>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Código</th>
					<th scope="col">Detalle</th>
					<th scope="col">Precio</th>
					<th scope="col">Imagen</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>


				

				<?php 
				foreach ($listado_productos as $producto) {
					if($producto["disponible"]==0){
						$icono_disponible="fa-times-circle-o";
					}else{
						$icono_disponible="fa-check-circle";
					
					}
					echo '
					<tr>
						<th>'.$producto["codigo"].'</th>
						<td>'.$producto["detalle"].'</td>
						<td>$'.$producto["precio"].'</td>
						<td><img src="../'.$producto["imagen"].'" width=70></td>
						<td>
							
							<a class="btn" data-toggle="tooltip" href="editar.php?codigo='.$producto["codigo"].'"><i class="material-icons">&#xE254;</i></a>

							<form method="POST">
							<button class="btn" name="boton_deshabilitar" 
							value="'.$producto["codigo"].'" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#eliminar-producto">
							<i class="fa '.$icono_disponible.'" aria-hidden="true"></i>
							</button>
							</form>
							</form>
						</td>
					</tr>
					';
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="agregar-producto" tabindex="-1"  aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" enctype = "multipart/form-data">
					<div class="modal-header">
						<h1 class="modal-title fs-5">Nuevo Producto</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Detalle</label>
							<input type="text" class="form-control" name="input_detalle">
						</div>
						<div class="mb-3">
							<label class="form-label">Precio</label>
							<input type="text" class="form-control" name="input_precio">
						</div>
						<div class="mb-3">
							<label for="formFile" class="form-label">Imagen</label>
							<input class="form-control" type="file" name="input_imagen" accept="image/*" onchange="previewImage(event)">
						</div>
						<div class="mb-3">
							<img id="previewimg" alt="No hay imagen seleccionada.">
						</div>
						<hr>
						<div class="d-flex justify-content-center">
							<button type="submit" name="boton_guardar" class="btn btn-info boton-nuevo"><i class="fa fa-plus"></i> Agregar Producto</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="eliminar-producto" tabindex="-1"  aria-hidden="true">


	<script type="text/javascript">
      function previewImage(event) {
         var input = event.target;
         var image = document.getElementById('previewimg');
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>




</body>
</html>
</body>
</html>