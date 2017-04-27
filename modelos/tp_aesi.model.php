<?php
class usuario{


	public static function insert_usuario($nombre,$dni, $correo,$pass,$leng)
    	{
    		
    		if (usuario::consultar_correo($correo) && usuario::consultar_dni($dni)) {
    			global $baseDatos;
		        $passmd5 = md5($pass);
		        
		        $sql = "INSERT INTO usuarios(id_usuario,dni_usuario,nombre,correo,pass,lenguaje) VALUES 
		            (0,'$dni','$nombre','$correo','$passmd5','$leng')";
		        $res = $baseDatos->query($sql);
		     
		        return $res;
    		}
    		else
    		{
    			return false;
    		}
	        
    	}

    public static function consultar_correo ($correo){
    	 global $baseDatos;
	        $results = $baseDatos->query("SELECT COUNT(*) AS cant FROM `usuarios` WHERE `correo` = '$correo'");
	        $res = $results->fetch_assoc();
	       
	        if ($res["cant"] == 0) {
	            return true;
	        } else {
	            return false;
	        }
    }

    public static function consultar_dni ($dni){
    	 	global $baseDatos;
	        $results = $baseDatos->query("SELECT COUNT(*) AS cant FROM `usuarios` WHERE `dni_usuario` = '$dni'");
	        $res = $results->fetch_assoc();
	       
	        if ($res["cant"] == 0) {
	            return true;
	        } else {
	            return false;
	        }
    }

    function verificar_user ($correo, $pass){
	    global $baseDatos;
	    $passmd5 = md5($pass);
	    $resultsc = $baseDatos->query("SELECT * FROM usuarios WHERE correo = '$correo' and pass = '$passmd5' ");
	        
	    return $res = $resultsc->fetch_assoc();


    }

}


?>