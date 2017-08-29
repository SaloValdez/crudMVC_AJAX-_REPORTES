<?php
require_once "../../b_controlador/controlador.php";
require_once "../../a_modelo/crud.php";

class Ajax{

	public $validarUsuario;
	public $validarEmail;


	public function validarUsuarioAjax(){

		$datos = $this->validarUsuario;

		$respuesta = MvcController::validarUsuarioController($datos);

		echo $respuesta;

	}

	public function validarEmailAjax(){

		$datos = $this->validarEmail;

		$respuesta = MvcController::validarEmailController($datos);

		echo $respuesta;

	}

}
 if (isset($_POST["validarUsuario"])) {
	 $a = new Ajax();
	 $a -> validarUsuario = $_POST["validarUsuario"]; //viene de AJAX .JS (((datos.append("validarEmail", usuario);)))
	 $a -> validarUsuarioAjax();
 }


 if (isset($_POST["validarEmail"])) {
	 $b = new Ajax();
	 $b -> validarEmail = $_POST["validarEmail"];
	 $b -> validarEmailAjax();
 }






 ?>
