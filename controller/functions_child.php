<?php

include ("../model/conexion.php");

function insertChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento,$id_mom) {

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

function insertMomChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $celular, $correo_electronico) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    //echo 'on sqlput Mom<br>';


    $consulta = 'insert into tbl_personas (fk_tbl_tipo_identificacion, 
						numero_identificacion, primer_nombre, 
                        segundo_nombre, primer_apellido, 
                        segundo_apellido,fecha_nacimiento,
                        telefono, correo_electronico ,is_mom) values (?,?,?,?,?,?,?,?,?,1)';

    /* echo '<option>'.$consulta.'</option>'; */


    $query = $mysqli->prepare($consulta);
    //if ($result = $mysqli->query($consulta)) {
    // execute

    //var_dump($query);

    $query->bind_param('issssssss', $fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $correo_electronico);

    $query->execute();
    
    $id_result = $mysqli->insert_id;
    
    return $id_result;

    //echo 'succes Mom<br>';
}

function getEntidadesSalud() {


    echo '<option value=0>Escoger una opcion</option>';

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);



    $consulta = 'select id_tbl_entidad_salud,nombre_entidad from tbl_entidad_salud';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($id_tbl_entidad_salud, $nombre_entidad);


        while ($query->fetch()) {

            echo '<option value=' . $id_tbl_entidad_salud . '>' . utf8_encode($nombre_entidad) . '</option>';
        }
    }
}

function getDepartamentos() {


    echo '<option value=0>Escoger una opcion</option>';

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);



    $consulta = 'select id_departamento, descripcion from departamentos';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($id_departamento, $descripcion);


        while ($query->fetch()) {

            echo '<option value=' . $id_departamento . '>' . utf8_encode($descripcion) . '</option>';
        }
    }
}

function getCiudadDepartamento($id_departamento) {


    echo '<option value=0>Escoger una opcion</option>';

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);



    $consulta = 'select idtbl_municipio, nombre_municipio from municipios where id_departamento=' . $id_departamento;

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($id_municipio, $nombre_municipio);


        while ($query->fetch()) {

            echo '<option value=' . $id_municipio . '>' . utf8_encode($nombre_municipio) . '</option>';
        }
    }
}

function getTipoIdentificacion($condicion) {


    echo '<option value=0>Escoger una opcion</option>';

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);



    $consulta = 'select id_tbl_tipo_identificacion, tipo_identificacion, descripcion from tbl_tipo_identificacion where condicion=' . $condicion;

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($id_tbl_tipo_identificacion, $tipo_identificacion, $descripcion);


        while ($query->fetch()) {

            echo '<option value=' . $id_tbl_tipo_identificacion . '>' . utf8_encode($descripcion) . '</option>';
        }
    }
}

function getDataChild() {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    

    $consulta = 'select numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento from tbl_personas where is_mom !=0 order by primer_nombre';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido , $fecha_nacimiento);

echo 'entre';
        while ($query->fetch()) {

            echo '<tr>
                       <td>'.$numero_identificacion.'</td>
                                                <td>'.$primer_nombre.' '.$segundo_nombre.'</td>
                                                <td>'.$primer_apellido.' '.$segundo_apellido.'</td>
                                                <td>'.$fecha_nacimiento.'</td>
                                                <td>Estado vacunacion</td>
                                            </tr>';
        }
    }
}
