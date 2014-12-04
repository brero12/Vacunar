<?php

include ("../model/conexion.php");

function insertSchema($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento,$id_mom) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

   // echo 'on sqlput <br>';

    $consulta = 'insert into tbl_personas (fk_tbl_tipo_identificacion, 
						numero_identificacion, primer_nombre, 
                        segundo_nombre, primer_apellido, 
                        segundo_apellido,fecha_nacimiento,
                        regimen_afiliacion, aseguradora, 
                        fk_tbl_entidad_salud_atencioparto,
                        fk_municipio_nacimiento, is_mom) values (?,?,?,?,?,?,?,?,?,?,?,?)';

    $query = $mysqli->prepare($consulta);

    $query->bind_param('issssssssiii', $fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento,$id_mom);

    $query->execute();
}

function insertChildSchema($listVaccine, $idChild) {
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);
    
    $array=json_decode($listVaccine);
    
    $lastId = -1;
        
    for($i = 0; $i< count($array); $i++){
        $sentence = 'insert into tbl_dosis_persona (
                              id_tbl_esquema_vacunacion, 
						      id_tbl_personas,
                              '.$array[$i][1].',
                              fecha_vacuna_'.$array[$i][1].') 
                      values (?,?,?,?)';
        
        $dose = 1; // Dosis con valor 1, lo que indica que se aplica esa dosis como tal
        
        $query = $mysqli->prepare($sentence);
        $query->bind_param('iiis', $array[$i][0], $idChild, $dose, $array[$i][2]);

        $query->execute();
        
        // Asigna ultimo id insertado
        $lastId = $mysqli->insert_id;
    }
    
    return $lastId;
}



function getDataSchema() {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    

    $consulta = 'select esva.nombre_vacuna, dova.dosis1, dova.dosis2, 
                    dova.dosis3, dova.dosis4, dova.dosis5, dova.refuerzo1, 
                    dova.refuerzo2, dova.adicional1, dova.adicional2, esva.tipo
                    from tbl_dosis_vacuna dova, 
                    tbl_esquema_vacunacion esva
                    where dova.id_tbl_esquema_vacunacion = esva.id_tbl_esquema_vacunacion order by esva.nombre_vacuna asc';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($nombre_vacuna, $dosis1, $dosis2, $dosis3, $dosis4 , $dosis5, $refuerzo1, $refuerzo2, $adicional1, $adicional2, $tipo);

        while ($query->fetch()) {
            
            if($tipo==0)
            {
                $tipo_e = 'no pai';
            }
            if($tipo==1)
            {
                $tipo_e = 'pai';
            }

            echo ' <tr>
                        <td>'.$nombre_vacuna.'</td>
                        <td>'.$dosis1.'</td>
                        <td>'.$dosis2.'</td>
                        <td>'.$dosis3.'</td>
                        <td>'.$dosis4.'</td>
                        <td>'.$dosis5.'</td>
                        <td>'.$refuerzo1.'</td>
                        <td>'.$refuerzo2.'</td>
                        <td>'.$adicional1.'</td>
                        <td>'.$adicional2.'</td>
                        <td>'.$tipo_e.'</td>
                   </tr>';
        }
    }
}

function getDataVaccineSchemaChild() {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    

    $consulta = 'select esva.nombre_vacuna, dova.dosis1, dova.dosis2, 
                    dova.dosis3, dova.dosis4, dova.dosis5, dova.refuerzo1, 
                    dova.refuerzo2, dova.adicional1, dova.adicional2, esva.tipo
                    from tbl_dosis_vacuna dova, 
                    tbl_esquema_vacunacion esva
                    where dova.id_tbl_esquema_vacunacion = esva.id_tbl_esquema_vacunacion 
                    order by esva.tipo desc';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($nombre_vacuna, $dosis1, $dosis2, $dosis3, $dosis4 , $dosis5, $refuerzo1, $refuerzo2, $adicional1, $adicional2, $tipo);

        while ($query->fetch()) {
            
            if($tipo==0)
            {
                $tipo_e = 'no pai';
            }
            if($tipo==1)
            {
                $tipo_e = 'pai';
            }

            echo '<tr>
                       <td>'.$nombre_vacuna.'</td>
                                                <td><input type="checkbox" /></td>
                                               <td><input type="checkbox" /></td>
                                                   <td><input type="checkbox" /></td>
                                                       <td><input type="checkbox" /></td>
                                                           <td><input type="checkbox" /></td>
                                                               <td><input type="checkbox" /></td>
                                                                   <td><input type="checkbox" /></td>
                                                                       <td><input type="checkbox" /></td>
                                                                           <td><input type="checkbox" /></td>
                                                                       <td>'.$tipo_e.'</td>
                                                                           </tr>';
        }
    }
}


function getMonth($fech_ini,$fech_fin) {
   
   //SEPARO LOS VALORES DEL ANIO, MES Y DIA PARA LA FECHA INICIAL EN DIFERENTES
   //VARIABLES PARASU MEJOR MANEJO

   $fIni_yr=substr($fech_ini,0,4);
    $fIni_mon=substr($fech_ini,5,2);
    $fIni_day=substr($fech_ini,8,2);

   //SEPARO LOS VALORES DEL ANIO, MES Y DIA PARA LA FECHA FINAL EN DIFERENTES
   //VARIABLES PARASU MEJOR MANEJO
   $fFin_yr=substr($fech_fin,0,4);
    $fFin_mon=substr($fech_fin,5,2);
    $fFin_day=substr($fech_fin,8,2);

   $yr_dif=$fFin_yr - $fIni_yr;
   //echo "la diferencia de años es -> ".$yr_dif."<br>";
   //LA FUNCION strtotime NOS PERMITE COMPARAR CORRECTAMENTE LAS FECHAS
   //TAMBIEN ES UTIL CON LA FUNCION date
   if(strtotime($fech_ini) > strtotime($fech_fin)){
      echo 'ERROR -> la fecha inicial es mayor a la fecha final <br>';
      exit();
   }
   else{
       if($yr_dif == 1){
         $fIni_mon = 12 - $fIni_mon;
         $meses = $fFin_mon + $fIni_mon;
         return $meses;
         //LA FUNCION utf8_encode NOS SIRVE PARA PODER MOSTRAR ACENTOS Y
         //CARACTERES RAROS
         //echo utf8_encode("la diferencia de meses con un año de diferencia es -> ".$meses."<br>");
      }
      else{
          if($yr_dif == 0){
             $meses=$fFin_mon - $fIni_mon;
            return $meses;
            //echo utf8_encode("la diferencia de meses con cero años de diferencia es -> ".$meses.", donde el mes inicial es ".$fIni_mon.", el mes final es ".$fFin_mon."<br>");
         }
         else{
             if($yr_dif > 1){
               $fIni_mon = 12 - $fIni_mon;
               $meses = $fFin_mon + $fIni_mon + (($yr_dif - 1) * 12);
               return $meses;
               //echo utf8_encode("la diferencia de meses con mas de un año de diferencia es -> ".$meses."<br>");
            }
            else
               echo "ERROR -> la fecha inicial es mayor a la fecha final <br>";
               exit();
         }
      }
   }

}

function getAllVaccines(){

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);
    
    $resultVaccines = array();

    $consulta = 'select    ev.id_tbl_esquema_vacunacion, ' 
                        . 'ev.nombre_vacuna, '
                        . 'ev.descripcion, '
                        . 'ev.tipo, '
                        . 'dv.dosis1, '
                        . 'dv.dosis2, '
                        . 'dv.dosis3, '
                        . 'dv.dosis4, '
                        . 'dv.dosis5, '
                        . 'dv.refuerzo1, '
                        . 'dv.refuerzo2, '
                        . 'dv.adicional1, '
                        . 'dv.adicional2 '
                . 'from tbl_esquema_vacunacion ev INNER JOIN tbl_dosis_vacuna dv ON dv.id_tbl_esquema_vacunacion = ev.id_tbl_esquema_vacunacion '
                . ' order by ev.nombre_vacuna';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_esquema_vacunacion, 
                            $nombre_vacuna, 
                            $descripcion,
                            $tipo, 
                            $dosis1, 
                            $dosis2, 
                            $dosis3, 
                            $dosis4, 
                            $dosis5, 
                            $refuerzo1, 
                            $refuerzo2, 
                            $adicional1, 
                            $adicional2);

        while($query->fetch()){ 

            $a = array(
                'id_tbl_esquema_vacunacion' => $mysqli->real_escape_string($id_tbl_esquema_vacunacion),
                'nombre_vacuna'             => $mysqli->real_escape_string($nombre_vacuna),
                'descripcion'               => $mysqli->real_escape_string($descripcion),
                'tipo'                      => $mysqli->real_escape_string($tipo),
                'dosis1'                    => $mysqli->real_escape_string($dosis1),
                'dosis2'                    => $mysqli->real_escape_string($dosis2),
                'dosis3'                    => $mysqli->real_escape_string($dosis3),
                'dosis4'                    => $mysqli->real_escape_string($dosis4),
                'dosis5'                    => $mysqli->real_escape_string($dosis5),
                'refuerzo1'                 => $mysqli->real_escape_string($refuerzo1),
                'refuerzo2'                 => $mysqli->real_escape_string($refuerzo2),
                'adicional1'                => $mysqli->real_escape_string($adicional1),
                'adicional2'                => $mysqli->real_escape_string($adicional2)
            );

            array_push ($resultVaccines , $a);
        }



    }

    return $resultVaccines;
}
