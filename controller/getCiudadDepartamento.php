<?php

include ("../model/conexion.php");



getCiudadDepartamento($_POST['id_departamento']);

function getCiudadDepartamento($id_departamento){
    
    
    echo '<option value=0>Escoger una opcion</option>';
        
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;
        
    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);
    
   
    
    $consulta = 'select id_municipio, descripcion from municipios where id_departamento='.$id_departamento;
    
    /*echo '<option>'.$consulta.'</option>';*/
     
    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($id_municipio,$descripcion);


        while ($query->fetch()) {
            
            echo '<option value='.$id_municipio.'>'.utf8_encode($descripcion).'</option>';
        }
        
    }
}



