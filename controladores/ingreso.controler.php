<?php
class Ingreso_Controller{

	function login (){
        
		$tpl = new TemplatePower("templates/index.html");
		$tpl->prepare();
		return $tpl->getOutputContent();

	}

	function inscripcion (){
        
		echo "hola";

	}

}
?>