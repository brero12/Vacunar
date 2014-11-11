<?php

//include (dirname(__FILE__)."\\..\\model\\conexion.php");


$dataInclFile = get_included_files();

/* print_r($dataInclFile);
  die(); */

$resultInclFile = preg_grep('~' . 'conexion.php' . '~', $dataInclFile);


if (count($resultInclFile) == 0) {
    if (file_exists("../model/conexion.php")) {
    include ("../model/conexion.php");       
} else {
    include ("../../model/conexion.php");      
}

}

function insertChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento, $isMom, $idMapa, $etiquetaPunto) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    //echo 'on sqlput <br>';


    $consulta = 'insert into tbl_personas ( fk_tbl_tipo_identificacion, 
						                    numero_identificacion, 
                                            primer_nombre, 
                                            segundo_nombre, 
                                            primer_apellido, 
                                            segundo_apellido,
                                            fecha_nacimiento,
                                            regimen_afiliacion, 
                                            aseguradora, 
                                            fk_tbl_entidad_salud_atencioparto,
                                            fk_municipio_nacimiento, 
                                            is_mom,
                                            fk_tbl_mapas, 
                                            fk_tbl_puntos_etiqueta_punto) 
                 values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

    /* echo '<option>'.$consulta.'</option>'; */



    $query = $mysqli->prepare($consulta);
    //if ($result = $mysqli->query($consulta)) {
    // execute

   // var_dump($query);

    $query->bind_param('issssssssiiiis', $fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento, $isMom, $idMapa, $etiquetaPunto);

    $query->execute();

    //echo 'succes <br>';
}

function insertMomChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $celular, $correo_electronico, $idMapa, $etiquetaPunto) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    //echo 'on sqlput Mom<br>';


    $consulta = 'insert into tbl_personas ( fk_tbl_tipo_identificacion, 
                                            numero_identificacion, 
                                            primer_nombre, 
                                            segundo_nombre, 
                                            primer_apellido, 
                                            segundo_apellido,
                                            fecha_nacimiento,
                                            telefono, 
                                            correo_electronico ,
                                            is_mom,
                                            fk_tbl_mapas, 
                                            fk_tbl_puntos_etiqueta_punto) 
                  values (?,?,?,?,?,?,?,?,?,1,?,?)';

    /* echo '<option>'.$consulta.'</option>'; */



    $query = $mysqli->prepare($consulta);
    //if ($result = $mysqli->query($consulta)) {
    // execute

    //var_dump($query);

    $query->bind_param('issssssssis', $fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $correo_electronico, $idMapa, $etiquetaPunto);

    $query->execute();
    
    $id_result = $mysqli->insert_id;
    
    return $id_result;

   // echo 'succes Mom<br>';
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

    

    $consulta = 'select numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento from tbl_personas where is_mom<>1 order by primer_nombre';

    /* echo '<option>'.$consulta.'</option>'; */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido , $fecha_nacimiento);

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

function getIdMapa($nombreMapa){
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $resultado = "";

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = "select id_tbl_mapas from tbl_mapas where nombre_mapa='".$nombreMapa.".png' LIMIT 1;";

    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_mapas);

        while ($query->fetch()) {
            $resultado =  $id_tbl_mapas;
        }
    }
    
    return $resultado;
}

function getDataChildren($codMapa){
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $idMapa = getIdMapa($codMapa);
    $resultChildren = array();
    
    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, fk_tbl_puntos_etiqueta_punto from tbl_personas where is_mom <> 1 AND fk_tbl_mapas = '.$idMapa.' order by primer_nombre';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido , $fecha_nacimiento, $etiqueta_punto);

        while ($query->fetch()) {
            $a = array(
                'numero_identificacion'  => $mysqli->real_escape_string($numero_identificacion),
                'primer_nombre'          => $mysqli->real_escape_string($primer_nombre),
                'segundo_nombre'         => $mysqli->real_escape_string($segundo_nombre),
                'primer_apellido'        => $mysqli->real_escape_string($primer_apellido),
                'segundo_apellido'       => $mysqli->real_escape_string($segundo_apellido),
                'fecha_nacimiento'       => $mysqli->real_escape_string($fecha_nacimiento),
                'etiqueta_punto'         => $mysqli->real_escape_string($etiqueta_punto)
            );
            
            array_push ($resultChildren , $a);
        }
    }
    
    return $resultChildren;
}

function getDataMapChild($codMapa){

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    //$idMapa = getIdMapa($codMapa);
    $resultChildren = array();

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select    per.id_tbl_personas, ' 
                        . 'per.numero_identificacion, '
                        . 'per.primer_nombre, '
                        . 'per.segundo_nombre, '
                        . 'per.primer_apellido, '
                        . 'per.segundo_apellido, '
                        . 'per.fecha_nacimiento, '
                        . 'per.regimen_afiliacion, '
                        . 'per.aseguradora '
                . 'from tbl_personas per '
                . 'where per.is_mom <> 1 and per.fk_tbl_puntos_etiqueta_punto="'.$codMapa.'"  order by per.primer_apellido';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_personas, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido , $fecha_nacimiento, $regimen_afiliacion, $aseguradora);

        while($query->fetch()){ 

            $a = array(
                'id_tbl_personas'        => $mysqli->real_escape_string($id_tbl_personas),
                'numero_identificacion'  => $mysqli->real_escape_string($numero_identificacion),
                'primer_nombre'          => $mysqli->real_escape_string($primer_nombre),
                'segundo_nombre'         => $mysqli->real_escape_string($segundo_nombre),
                'primer_apellido'        => $mysqli->real_escape_string($primer_apellido),
                'segundo_apellido'       => $mysqli->real_escape_string($segundo_apellido),
                'fecha_nacimiento'       => $mysqli->real_escape_string($fecha_nacimiento),
                'regimen_afiliacion'     => $mysqli->real_escape_string($regimen_afiliacion),
                'aseguradora'            => $mysqli->real_escape_string($aseguradora)
            );

            array_push ($resultChildren , $a);
        }



    }

    return $resultChildren;
}


function getDataSelectedChild($idPersona){
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $resultChildren = array();

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select    per.id_tbl_personas, ' 
                        . 'per.numero_identificacion, '
                        . 'per.primer_nombre, '
                        . 'per.segundo_nombre, '
                        . 'per.primer_apellido, '
                        . 'per.segundo_apellido, '
                        . 'per.fecha_nacimiento, '
                        . 'per.regimen_afiliacion, '
                        . 'per.aseguradora '
                . 'from tbl_personas per '
                . 'where per.is_mom <> 1 and per.id_tbl_personas="'.$idPersona.'" ';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_personas, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido , $fecha_nacimiento, $regimen_afiliacion, $aseguradora);

        while($query->fetch()){ 

            $resultChildren = array(
                'id_tbl_personas'        => $mysqli->real_escape_string($id_tbl_personas),
                'numero_identificacion'  => $mysqli->real_escape_string($numero_identificacion),
                'primer_nombre'          => $mysqli->real_escape_string($primer_nombre),
                'segundo_nombre'         => $mysqli->real_escape_string($segundo_nombre),
                'primer_apellido'        => $mysqli->real_escape_string($primer_apellido),
                'segundo_apellido'       => $mysqli->real_escape_string($segundo_apellido),
                'fecha_nacimiento'       => $mysqli->real_escape_string($fecha_nacimiento),
                'regimen_afiliacion'     => $mysqli->real_escape_string($regimen_afiliacion),
                'aseguradora'            => $mysqli->real_escape_string($aseguradora)
            );

            //array_push ($resultChildren , $a);
        }



    }

    return $resultChildren;
}