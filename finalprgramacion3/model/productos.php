
<?php
include("../config.php");
require_once("conexion.php");
class producto extends conexion{
	private $detalle;
	private $precio;
	private $imagen;
	
	public function guardarProducto($detalle, $precio, $imagen){
		$this->detalle = $detalle;
		$this->precio = $precio;
		$this->imagen = $imagen;



		$buscar = mysqli_query($this->conexion,"SELECT * FROM productos");



		if($this->imagen["error"] !=0){
			$ruta_imagen = "Assets/images/imaexample.png";
		}else{
			$ruta_imagen = "Assets/images/".$this->imagen["name"];
			$archivo = $this->imagen["tmp_name"];
			@move_uploaded_file($archivo, "../".$ruta_imagen);
		}
		
		$guardar = mysqli_query($this->conexion,"INSERT INTO productos(detalle,precio,imagen) VALUES('".$this->detalle."','".$this->precio."','".$ruta_imagen."')");
	}
	public function listarProductos(){
		$buscar = mysqli_query($this->conexion, "SELECT * FROM productos");
		$datos_encontrados = mysqli_fetch_all($buscar,MYSQLI_ASSOC);
		return $datos_encontrados;

	}

	public function listarProductosDisponibles(){
		$buscar = mysqli_query($this->conexion, "SELECT * FROM productos WHERE disponible=0");
		$datos_encontrados = mysqli_fetch_all($buscar,MYSQLI_ASSOC);
		return $datos_encontrados;

	}

	public function deshabilitarProducto($codigo){
		$buscar = mysqli_query($this->conexion, "SELECT disponible FROM productos WHERE codigo='".$codigo."'");
		$datos_encontrados = mysqli_fetch_all($buscar,MYSQLI_ASSOC);

		if($datos_encontrados[0]["disponible"] == 0){
			$nuevo_estado = 1;
		}else{
			$nuevo_estado = 0;
		}
		$buscar= mysqli_query($this->conexion,"UPDATE productos SET disponible = $nuevo_estado WHERE codigo='".$codigo."'");
	}

	public function buscarCodigo($codigo){
		$buscar = mysqli_query($this->conexion, "SELECT * FROM productos WHERE codigo='".$codigo."'");
		if(mysqli_num_rows($buscar)>0){
			$datos_encontrados = mysqli_fetch_all($buscar, MYSQLI_ASSOC);
			return $datos_encontrados;
		}else{
			return false; 
		}
	}
	public function modificarProducto($detalle,$precio,$imagen,$codigo){
		if($imagen['error']>0){
			$sql = "UPDATE productos SET detalle='".$detalle."',precio='".$precio."' WHERE codigo= '".$codigo."'";
		}else{
			$ruta_imagen = "Assets/images/".$imagen["name"];
			$archivo = $imagen["tmp_name"];
			@move_uploaded_file($archivo, "../".$ruta_imagen);
			
			$sql = "UPDATE productos SET detalle='".$detalle."',precio='".$precio."', imagen='".$ruta_imagen."' WHERE codigo= '".$codigo."'";
		}
	mysqli_query($this->conexion,$sql);
	}

}
?>