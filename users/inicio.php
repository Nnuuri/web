
<?php 
session_start();
include("../config.php");
require("../model/usuarios.php");
if(isset($_POST["boton_registro"])){
	$email = $_POST["input_email"];
	$contraseña = $_POST["input_contraseña"];
	$usuario = new usuario();
	if($usuario->buscarUsuario($email,$contraseña)){
		header('location:'.URL);
	}else{
		$no_user=true;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../Assets/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
</head>
<body>
	
	<?php include('../navbar.php');
	if(isset($_SESSION["login"])){
		if($_SESSION["rol"]=="admin"){
			echo '<a href="#">IR A LUGAR SECRETO</a>';
		}
	}

?>

	<div class="d-flex justify-content-center">
		
		<div class="col-6">
		<h3>INGRESAR</h3>
			<form method="POST">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Email</label>
					<input type="email" class="form-control" placeholder="nombre@ejemplo.com" name='input_email'>
				</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Contraseña</label>
						<input type="password" class="form-control" placeholder="Ingrese contraseña" name='input_contraseña'>
					</div>
					
					<?php
					if (isset($no_user)) {
						echo '<span class="text-danger">Usuario o contraseña incorrectas.</span>';
					}
					?>

				<div class="mb-3">
					<div class="d-flex justify-content-center">
					<button class="btn btn-outline-primary" type="submit" name="boton_registro">Ingresar</button>
					</div>
				</div>
			</form>
			<a href="registro.php">No tengo cuenta</a>
		</div>
	</div>
	
	<script type="text/javascript" src="../Assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>