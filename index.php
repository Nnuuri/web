<?php 

session_start();
include("config.php");
if(isset($_GET['cerrar_sesion'])){
	session_destroy();
	header('location:'.URL);
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">
</head>
<body>
	
	<?php include('navbar.php');
	if(isset($_SESSION["login"])){
		if($_SESSION["rol"]=="admin"){
			echo '<a href="#">IR A LUGAR SECRETO</a>';
		}
	}



?>
	
	<div class="d-flex justify-content-center">
		<img src="Assets/images/imexample.png">
	</div>
	
	<script type="text/javascript" src="Assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>