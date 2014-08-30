<?php
	include ("../conf/php.conf.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

		$nombres = $_POST['nombres']; 
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $fechaNace = $_POST['fechaNace'];
        $tipoId = $_POST['tipoId'];
        $numIdetificacion = $_POST['numIdetificacion'];
        $regimen = $_POST['regimen'];
        $aseguradora = $_POST['aseguradora'];
        $lugar_parto = $_POST['lugar_parto'];
        $departNace = $_POST['departNace'];
        $ciudadNace = $_POST['ciudadNace'];
        $vacunaAldia = $_POST['vacunaAldia'];
        $nombresMadre = $_POST['nombresMadre'];
        $apellidosMadre = $_POST['apellidosMadre'];
        $fechaNaceMadre = $_POST['fechaNaceMadre'];
        $edadMadre = $_POST['edadMadre'];
        $tipoDocMadre = $_POST['tipoDocMadre'];
        $numIdetificacionMadre = $_POST['numIdetificacionMadre'];
        $telefonoMadre = $_POST['telefonoMadre'];
        $celularMadre = $_POST['celularMadre'];
        $correoMadre = $_POST['correoMadre'];
		
		
		
		//Comenzamos con un 'try', por si algo falla(BD, conexión, etc)
        try{
            //Abrimos una conexión con el servidor
            $conexion = crearConexion();
			
			//print_r ($conexion);	
            //Declaramos nuestra consulta
            $sql = "INSERT INTO tbl_personas (numero_identificacion, primer_nombre ,primer_apellido,fecha_nacimiento, fk_tbl_tipo_identificacion, regimen_afiliacion,aseguradora, fk_tbl_entidad_salud_atencioparto, fk_municipio_nacimiento, esquema_completo_edad) VALUES (?,?,?,?,?,?,?,?,?,?)";
            //Preparamos la consulta
			
			$sentencia = $conexion->prepare($sql);
            /* Le damos los parámetros (símbolos '?'),
				* pueden ser de tipo 'i' = integer
				*                    'd' = double
				*                    's' = string
				*                    'b' = BLOB
			*/
            $sentencia->bind_param("ssssssssss",$numIdetificacion,$nombres,$apellidos,$fechaNace,$tipoId,$regimen,$aseguradora,$lugar_parto,$ciudadNace,$vacunaAldia);
            //Ejecutamos la consulta, si resulta exitosa el método execute()
            //retornará true
            if($sentencia->execute()){
				
				$idCreado =  $sentencia->insert_id;
				//echo "IdCreado ".$idCreado;
				//Cerramos la conexión y la sentencia
                $conexion->close();
                $sentencia->close();
                //Retornamos true, consulta satisfactoria		
				
                //return true;
			}
            //Sino surgió algún error y retornamos una cadena de error.
            else{
			
			echo $sentencia->error;
                $conexion->close();
                $sentencia->close();
				
				
                return false;
			}
            //Si surge alguna excepción la capturamos e imprimimos,
            //retornamos false
			}catch(Exception $e){
            echo $e;
            $conexion->close();
            $sentencia->close();
			echo "false 2";
            return false;
		}
	
        
        
        echo '<br><br>Registro realizado exitosamente <a href="JavaScript:addChild(this);"><i class="fa fa-angle-double-right"></i> Registrar Nuevo Niño</a>';

	?>
