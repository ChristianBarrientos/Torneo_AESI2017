<?php
class usuario{


	public function insert_usuario($nombre,$dni, $correo,$pass)
    	{
    		
    		if (usuario::consultar_correo($correo)) {
    			global $baseDatos;
		        $passmd5 = md5($pass);
		        
		        $sql = "INSERT INTO usuarios(id_usuario,dni_usuario,nombre,correo,pass) VALUES 
		            (0,'$dni','$nombre','$correo','$passmd5')";
		        $res = $baseDatos->query($sql);

		        return $res;
    		}
    		else
    		{
    			return false;
    		}
	        
    	}

    public function consultar_correo ($correo){
    	 global $baseDatos;
	        $results = $baseDatos->query("SELECT COUNT(*) AS cant FROM `usuarios` WHERE `correo` = '$correo'");
	        $res = $results->fetch_assoc();
	       
	        if ($res["cant"] == 0) {
	            return true;
	        } else {
	            return false;
	        }
    }

}


?>