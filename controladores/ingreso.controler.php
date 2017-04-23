<?php
class Ingreso_Controller{

	function login (){
        
		$tpl = new TemplatePower("templates/bienvenida.html");
		$tpl->prepare();
		//$tpl->newBlock("menu_var");
		//$tpl->newBlock("bienvenida");
		return $tpl->getOutputContent();

	}

	function condiciones (){
        
		$tpl = new TemplatePower("templates/condiciones.html");
		$tpl->prepare();
		//$tpl->newBlock("menu_var");
		//$tpl->newBlock("bienvenida");
		return $tpl->getOutputContent();

	}

	function inscripcion (){
        
		$nombre = $_POST['nombre'];
		$dni = $_POST['dni'];
		$correo = $_POST['correo'];
		$pass = $_POST['pass'];

		$ok_user = usuario::insert_usuario($nombre,$dni,$correo,$pass);
		if ($ok_user) {
			$tp1 = new TemplatePower("templates/registro_exito	.html");
       		$tp1->prepare();
            return $tp1->getOutputContent();
		}

	}

}
?>