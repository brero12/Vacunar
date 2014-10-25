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

    /* echo '<option>'.$consulta.'</option>'; */

    $query = $mysqli->prepare($consulta);
    //if ($result = $mysqli->query($consulta)) {
    // execute

    //var_dump($query);

    $query->bind_param('issssssssiii', $fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento,$id_mom);

    $query->execute();

    //echo 'succes <br>';
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
                    where dova.id_tbl_esquema_vacunacion = esva.id_tbl_esquema_vacunacion order by esva.tipo desc';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($nombre_vacuna, $dosis1, $dosis2, $dosis3, $dosis4 , $dosis5, $refuerzo1, $refuerzo2, $adicional1, $adicional2, $tipo);

echo 'entre';
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

function getDataSchemaChild() {

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
                    where dova.id_tbl_esquema_vacunacion = esva.id_tbl_esquema_vacunacion order by esva.tipo desc';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($nombre_vacuna, $dosis1, $dosis2, $dosis3, $dosis4 , $dosis5, $refuerzo1, $refuerzo2, $adicional1, $adicional2, $tipo);

echo 'entre';
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
