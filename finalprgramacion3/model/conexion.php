<?php
//hace la conxion lal DB
class conexion{
	protected $conexion;
	
	function __construct(){
		$this->conexion = mysqli_connect("localhost","root","","mispedidos");
	}
}

?>