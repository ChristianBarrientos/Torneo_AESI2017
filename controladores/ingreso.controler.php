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

	function nosotros (){
        
		$tpl = new TemplatePower("templates/nosotros.html");
		$tpl->prepare();
		//$tpl->newBlock("menu_var");
		//$tpl->newBlock("bienvenida");
		return $tpl->getOutputContent();

	}

	function inscripcion (){
        
		$nombre = mysql_real_escape_string($_POST['nombre']);
		$dni = mysql_real_escape_string($_POST['dni']);
		$correo = mysql_real_escape_string($_POST['correo']);
		$pass = mysql_real_escape_string($_POST['pass']);

		$ok_user = usuario::insert_usuario($nombre,$dni,$correo,$pass);
		if ($ok_user) {
			$tp1 = new TemplatePower("templates/registro_exito.html");
       		$tp1->prepare();
       		  $tp1->newBlock("ok_registro");
            return $tp1->getOutputContent();
		}
		else{
			$tp1 = new TemplatePower("templates/registro_exito.html");
       		$tp1->prepare();
       		  $tp1->newBlock("nok_registro");
            return $tp1->getOutputContent();
		}

	}

	function login_torneo(){

		$tpl = new TemplatePower("templates/login.html");
		$tpl->prepare();

		if (isset($_SESSION["nombre"])){
			return $this->ejercicios();
			
		}
		else{
			$tpl->newBlock("login_form");
			return $tpl->getOutputContent();
		}
		
		
	}


	function verificar_usuario(){
		$correo = $_POST['correo'];
		$pass = ($_POST['pass']);
		$usuario = new usuario();
		$_user = $usuario -> verificar_user($correo,$pass);
		
		if($_user){
				
				$this->iniciar_session($_user);
				return $this->ejercicios();
			}
			else{

				$tpl = new TemplatePower("templates/login.html");
				$tpl->prepare();
				$tpl->newBlock("login_fail");
				return $tpl->getOutputContent();

	  		
				}
	}


	function iniciar_session ($_user){
		$_SESSION["nombre"] = $_user["nombre"];    
		$_SESSION["correo"] = $_user["correo"];
	    $_SESSION["id_usuario"] = $_user["id_usuario"];
	}

	
	function cerrar_sesion(){
		session_destroy();
		return Ingreso_Controller::login();
       
	}

	function bienvenida_usuario(){
		$tpl = new TemplatePower("templates/menu_usuario.html");
		$tpl->prepare();
		
		return $tpl->getOutputContent();
	}

	function ejercicios(){
	if (!isset($_SESSION["nombre"])){
			return $this->login_torneo();
		}
		$tpl = new TemplatePower("templates/ejercicios.html");
		$tpl->prepare();
		//$tpl->newBlock("ejercicio_1");
		return $tpl->getOutputContent();
	}

	function control_respuesta(){
		
	}

}
?>