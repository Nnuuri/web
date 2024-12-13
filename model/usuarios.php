
<?php
require_once("conexion.php");
class usuario extends conexion{
	private $email;
	private $contraseña;
	public function buscarUsuario($email, $contraseña){
		$this->email = $email;
		$this->contraseña = $contraseña;
		$buscar = mysqli_query($this->conexion,"SELECT email_user,rol_user FROM usuarios WHERE email_user='".$this->email."' AND password_user='".$this->contraseña."'");
		if(mysqli_num_rows($buscar)>0){
			$datos_encontrados = mysqli_fetch_all($buscar,MYSQLI_ASSOC);

			$_SESSION['email_user']= $datos_encontrados[0]["email_user"];
			$_SESSION['rol_user']=$datos_encontrados[0]["rol_user"];

		return true; 

		}
		return false;
	}
	public function registrarUsuario($email,$contraseña){
		$this->email = $email;
		$this->contraseña = $contraseña;
		$guardar = mysqli_query($this->conexion,"INSERT INTO usuarios(email_user,password_user) VALUES('".$this->email."','".$this->contraseña."')");
		if($guardar){
		$_SESSION['email_user']= $datos_encontrados[0]["email_user"];
		$_SESSION['rol_user']=$datos_encontrados[0]["rol_user"];
		return true;
	}else{
		return false;
	}
	}
}
?>