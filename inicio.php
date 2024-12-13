<?php
session_start();
if(isset($_SESSION["login"])){
	echo "usted esta conectado";
}else{
	echo "todavia no inicio sesion";
}
require_once("consultas.php");
if(isset($_POST["boton_inicio"])){
	$email = $_POST['input_email'];
	$clave = $_POST['input_clave'];
	iniciar_sesion($email,$clave);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página</title>
</head>
<body>
		<form method="POST">
		    <div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Email address</label>
			  <input type="email" name="input_email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
		</div>
		<div class="mb-3">
		   <div class="mb-3">
			  <label class="form-label">Contraseña</label>
			  <input type="password" name="input_clave" class="form-control">
			</div>
			<div class="mb-3">  

		</div>
		<div class="mb-3">
		   <button type="submit" name="boton_inicio">Iniciar sesión</button>
			</div>

	</form>

</body>
</html>