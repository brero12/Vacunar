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

    $id_result = $mysqli->insert_id;

    return $id_result;
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

function updateMomChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $celular, $correo_electronico, $idMapa, $etiquetaPunto) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    //echo 'on sqlput Mom<br>';


    $consulta = 'update tbl_personas set    primer_nombre = ?, 
                                            segundo_nombre = ?, 
                                            primer_apellido = ?, 
                                            segundo_apellido = ?,
                                            fecha_nacimiento = ?,
                                            telefono = ?, 
                                            correo_electronico = ?
                                           WHERE numero_identificacion = ?';

    /* echo '<option>'.$consulta.'</option>'; */



    $query = $mysqli->prepare($consulta);
    //if ($result = $mysqli->query($consulta)) {
    // execute
    //var_dump($query);

    $query->bind_param('sssssssi', $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $telefono, $correo_electronico, $numero_identificacion);

    $query->execute();

    $id_result = $mysqli->insert_id;

    return $id_result;

    // echo 'succes Mom<br>';
}

function updateChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento, $isMom, $idMapa, $etiquetaPunto) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    //echo 'on sqlput <br>';


    $consulta = 'UPDATE tbl_personas   SET     primer_nombre = ?, 
                                            segundo_nombre = ?, 
                                            primer_apellido = ?, 
                                            segundo_apellido = ?,
                                            fecha_nacimiento = ?,
                                            regimen_afiliacion = ?, 
                                            aseguradora = ?, 
                                            fk_tbl_entidad_salud_atencioparto = ?,
                                            fk_municipio_nacimiento = ?
                                            WHERE numero_identificacion = ?';

    /* echo '<option>'.$consulta.'</option>'; */



    $query = $mysqli->prepare($consulta);
    //if ($result = $mysqli->query($consulta)) {
    // execute
    // var_dump($query);

    $query->bind_param('sssssssiii', $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento, $numero_identificacion);

    $query->execute();

    $id_result = $mysqli->insert_id;

    return $id_result;
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

function getTipoIdentificacion($condicion, $select = null) {


    echo '<option value=0>Escoger una opcion</option>';

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);



    $consulta = 'select id_tbl_tipo_identificacion, tipo_identificacion, descripcion from tbl_tipo_identificacion where condicion=' . $condicion;

    /* echo '<option>'.$consulta.'</option>';  */

    if ($query = $mysqli->prepare($consulta)) {
        //if ($result = $mysqli->query($consulta)) {
        // execute
        $query->execute();
        // bind results
        $query->bind_result($id_tbl_tipo_identificacion, $tipo_identificacion, $descripcion);


        while ($query->fetch()) {

            if ($id_tbl_tipo_identificacion == $select) {
                echo '<option value=' . $id_tbl_tipo_identificacion . ' selected=true>' . utf8_encode($descripcion) . '</option>';
            } else {
                echo '<option value=' . $id_tbl_tipo_identificacion . '>' . utf8_encode($descripcion) . '</option>';
            }
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
        $query->bind_result($numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento);

        while ($query->fetch()) {

            echo '<tr>
                       <td>' . $numero_identificacion . '</td>
                                                <td>' . $primer_nombre . ' ' . $segundo_nombre . '</td>
                                                <td>' . $primer_apellido . ' ' . $segundo_apellido . '</td>
                                                <td>' . $fecha_nacimiento . '</td>
                                                <td>Estado vacunacion</td>
                                                <td><i class="fa fa-fw fa-eye" onclick="JavaScript:viewDataToChild(\'' . $numero_identificacion . '\')"></i></td>
                                                <td><i class="fa fa-edit" onclick="JavaScript:editChild(\'' . $numero_identificacion . '\')"></i></td>   
                                            </tr>';
        }
    }
}

function getIdMapa($nombreMapa) {
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $resultado = "";

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = "select id_tbl_mapas from tbl_mapas where nombre_mapa='" . $nombreMapa . ".png' LIMIT 1;";

    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_mapas);

        while ($query->fetch()) {
            $resultado = $id_tbl_mapas;
        }
    }

    return $resultado;
}

function getDataChildren($codMapa) {
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $idMapa = getIdMapa($codMapa);
    $resultChildren = array();

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, fk_tbl_puntos_etiqueta_punto from tbl_personas where is_mom <> 1 AND fk_tbl_mapas = ' . $idMapa . ' order by primer_nombre';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $etiqueta_punto);

        while ($query->fetch()) {
            $a = array(
                'numero_identificacion' => $mysqli->real_escape_string($numero_identificacion),
                'primer_nombre' => $mysqli->real_escape_string($primer_nombre),
                'segundo_nombre' => $mysqli->real_escape_string($segundo_nombre),
                'primer_apellido' => $mysqli->real_escape_string($primer_apellido),
                'segundo_apellido' => $mysqli->real_escape_string($segundo_apellido),
                'fecha_nacimiento' => $mysqli->real_escape_string($fecha_nacimiento),
                'etiqueta_punto' => $mysqli->real_escape_string($etiqueta_punto)
            );

            array_push($resultChildren, $a);
        }
    }

    return $resultChildren;
}

function getDataMapChild($codMapa) {

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
            . 'where per.is_mom <> 1 and per.fk_tbl_puntos_etiqueta_punto="' . $codMapa . '"  order by per.primer_apellido';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_personas, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora);

        while ($query->fetch()) {

            $a = array(
                'id_tbl_personas' => $mysqli->real_escape_string($id_tbl_personas),
                'numero_identificacion' => $mysqli->real_escape_string($numero_identificacion),
                'primer_nombre' => $mysqli->real_escape_string($primer_nombre),
                'segundo_nombre' => $mysqli->real_escape_string($segundo_nombre),
                'primer_apellido' => $mysqli->real_escape_string($primer_apellido),
                'segundo_apellido' => $mysqli->real_escape_string($segundo_apellido),
                'fecha_nacimiento' => $mysqli->real_escape_string($fecha_nacimiento),
                'regimen_afiliacion' => $mysqli->real_escape_string($regimen_afiliacion),
                'aseguradora' => $mysqli->real_escape_string($aseguradora)
            );

            array_push($resultChildren, $a);
        }
    }

    return $resultChildren;
}

function getDataSelectedPerson($idPersona) {
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $resultChildren = array();

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select    per.id_tbl_personas, '
            . 'per.numero_identificacion, '
            . 'tid.descripcion, '
            . 'per.primer_nombre, '
            . 'per.segundo_nombre, '
            . 'per.primer_apellido, '
            . 'per.segundo_apellido, '
            . 'per.fecha_nacimiento, '
            . 'per.regimen_afiliacion, '
            . 'per.aseguradora, '
            . 'per.is_mom, '
            . 'per.telefono, '
            . 'per.correo_electronico '
            . 'from tbl_personas per INNER JOIN tbl_tipo_identificacion tid ON tid.id_tbl_tipo_identificacion = per.fk_tbl_tipo_identificacion  '
            . 'where per.id_tbl_personas="' . $idPersona . '" ';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_personas, $numero_identificacion, $tipo_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $is_mom, $telefono, $correo_electronico);

        while ($query->fetch()) {

            $resultChildren = array(
                'id_tbl_personas' => $mysqli->real_escape_string($id_tbl_personas),
                'numero_identificacion' => $mysqli->real_escape_string($numero_identificacion),
                'descripcion' => $mysqli->real_escape_string($tipo_identificacion),
                'primer_nombre' => $mysqli->real_escape_string($primer_nombre),
                'segundo_nombre' => $mysqli->real_escape_string($segundo_nombre),
                'primer_apellido' => $mysqli->real_escape_string($primer_apellido),
                'segundo_apellido' => $mysqli->real_escape_string($segundo_apellido),
                'fecha_nacimiento' => $mysqli->real_escape_string($fecha_nacimiento),
                'regimen_afiliacion' => $mysqli->real_escape_string($regimen_afiliacion),
                'aseguradora' => $mysqli->real_escape_string($aseguradora),
                'is_mom' => $mysqli->real_escape_string($is_mom),
                'telefono' => $mysqli->real_escape_string($telefono),
                'correo_electronico' => $mysqli->real_escape_string($correo_electronico)
            );

            //array_push ($resultChildren , $a);
        }
    }

    return $resultChildren;
}

function getDataSchemaChild($idPersona) {
    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $resultChildrenSchema = array();

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select    doper.id_tbl_dosis_vacuna, '
            . 'esqvacu.nombre_vacuna, '
            . 'doper.dosis1, '
            . 'doper.fecha_vacuna_dosis1, '
            . 'doper.dosis2, '
            . 'doper.fecha_vacuna_dosis2, '
            . 'doper.dosis3, '
            . 'doper.fecha_vacuna_dosis3, '
            . 'doper.dosis4, '
            . 'doper.fecha_vacuna_dosis4, '
            . 'doper.dosis5, '
            . 'doper.fecha_vacuna_dosis5, '
            . 'doper.refuerzo1, '
            . 'doper.fecha_vacuna_refuerzo1, '
            . 'doper.refuerzo2, '
            . 'doper.fecha_vacuna_refuerzo2, '
            . 'doper.adicional1, '
            . 'doper.fecha_vacuna_adicional1, '
            . 'doper.adicional2, '
            . 'doper.fecha_vacuna_adicional2 '
            . 'from tbl_dosis_persona doper INNER JOIN tbl_esquema_vacunacion esqvacu ON doper.id_tbl_esquema_vacunacion = esqvacu.id_tbl_esquema_vacunacion  '
            . 'where doper.id_tbl_personas="' . $idPersona . '" ';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($id_tbl_dosis_vacuna, $nombre_vacuna, $dosis1, $fecha_vacuna_dosis1, $dosis2, $fecha_vacuna_dosis2, $dosis3, $fecha_vacuna_dosis3, $dosis4, $fecha_vacuna_dosis4, $dosis5, $fecha_vacuna_dosis5, $refuerzo1, $fecha_vacuna_refuerzo1, $refuerzo2, $fecha_vacuna_refuerzo2, $adicional1, $fecha_vacuna_adicional1, $adicional2, $fecha_vacuna_adicional2);

        while ($query->fetch()) {

            $a = array(
                'id_tbl_dosis_vacuna' => $mysqli->real_escape_string($id_tbl_dosis_vacuna),
                'nombre_vacuna' => $mysqli->real_escape_string($nombre_vacuna),
                'dosis1' => $mysqli->real_escape_string($dosis1),
                'fecha_vacuna_dosis1' => $mysqli->real_escape_string($fecha_vacuna_dosis1),
                'dosis2' => $mysqli->real_escape_string($dosis2),
                'fecha_vacuna_dosis2' => $mysqli->real_escape_string($fecha_vacuna_dosis2),
                'dosis3' => $mysqli->real_escape_string($dosis3),
                'fecha_vacuna_dosis3' => $mysqli->real_escape_string($fecha_vacuna_dosis3),
                'dosis4' => $mysqli->real_escape_string($dosis4),
                'fecha_vacuna_dosis4' => $mysqli->real_escape_string($fecha_vacuna_dosis4),
                'dosis5' => $mysqli->real_escape_string($dosis5),
                'fecha_vacuna_dosis5' => $mysqli->real_escape_string($fecha_vacuna_dosis5),
                'refuerzo1' => $mysqli->real_escape_string($refuerzo1),
                'fecha_vacuna_refuerzo1' => $mysqli->real_escape_string($fecha_vacuna_refuerzo1),
                'refuerzo2' => $mysqli->real_escape_string($refuerzo2),
                'fecha_vacuna_refuerzo2' => $mysqli->real_escape_string($fecha_vacuna_refuerzo2),
                'adicional1' => $mysqli->real_escape_string($adicional1),
                'fecha_vacuna_adicional1' => $mysqli->real_escape_string($fecha_vacuna_adicional1),
                'adicional2' => $mysqli->real_escape_string($adicional2),
                'fecha_vacuna_adicional2' => $mysqli->real_escape_string($fecha_vacuna_adicional2)
            );

            array_push($resultChildrenSchema, $a);
        }
    }

    return $resultChildrenSchema;
}

function getDataToChild($idChild, $type) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select numero_identificacion'
            . ', primer_nombre, segundo_nombre'
            . ', primer_apellido'
            . ', segundo_apellido'
            . ', fecha_nacimiento'
            . ', fk_tbl_puntos_etiqueta_punto'
            . ', fk_tbl_mapas'
            . ', fk_tbl_tipo_identificacion'
            . ', regimen_afiliacion'
            . ', aseguradora'
            . ', id_mom'
            . ' from tbl_personas'
            . ' where numero_identificacion=' . $idChild;


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($numero_identificacion
                , $primer_nombre
                , $segundo_nombre
                , $primer_apellido
                , $segundo_apellido
                , $fecha_nacimiento
                , $etiqueta_punto
                , $codMapa
                , $tipo_identificacion
                , $regimen_afiliacion
                , $aseguradora
                , $id_mom);

        $query->fetch();
    }

    $readonly = '';

    if ($type == 2) {
        $readonly = ' disabled';
    }


    echo '<section class="content">
    <form role="form">
        <div class="row">
        <!-- left column -->
      <div class="col-md-6">
            <!-- general form elements -->
        <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Datos del ni&ntilde;o  </h3>
                    <input id="cargarMapaRegistro" type="hidden" value="1" />
                    <input id="id_mapa" type="hidden" value="' . $etiqueta_punto . '" />
                    <input id="etiqueta_punto" type="hidden" value="' . $codMapa . '" />
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body" >
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12"> 
                                        <label for="primerNombre" >Primer Nombre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="primerNombre" placeholder="" onblur="requerido(\'primerNombre\')" value="' . $primer_nombre . '" ' . $readonly . '/>
                                        <div id="v_primerNombre" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12"> 
                                        <label for="segundoNombre">Segundo Nombre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoNombre" placeholder="" value="' . $segundo_nombre . '" ' . $readonly . ' />
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="primerApellido">Primer Apellido</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="primerApellido" placeholder="" onblur="requerido(\'primerApellido\')" value="' . $primer_apellido . '" ' . $readonly . ' />
                                        <div id="v_primerApellido" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="segundoApellido">Segundo Apellido</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoApellido" placeholder="" value="' . $segundo_apellido . '" ' . $readonly . ' />
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Fecha de Nacimiento: (Formato AAAA-MM-DD)</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" class="form-control" id="fechaNace" onblur="requerido(\'fechaNace\')" value="' . $fecha_nacimiento . '" ' . $readonly . ' />
                                        <div id="v_fechaNace" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="edad">Tipo de Identificaci&oacute;n </label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="tipoId" onchange="requerido(\'tipoId\')" disabled>
                                            ';

    getTipoIdentificacion(1, $tipo_identificacion);

    echo '                                                   
                                        </select>
                                        
                                        <div id="v_tipoId" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="numIdetificacion">N&uacute;mero de Identificaci&oacute;n</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="numIdetificacion" placeholder="" onblur="requerido(\'numIdetificacion\')" value="' . $numero_identificacion . '" disabled />
                                        <div id="v_numIdetificacion" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="regimen">R&eacute;gimen de aseguramiento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="regimen" ' . $readonly . '>';

    $selected = '';
    if ($regimen_afiliacion == 'Contributivo')
        $selected = 'selected';
    else
        $selected = '';
    echo '<option ' . $selected . '>Contributivo</option>';

    if ($regimen_afiliacion == 'No Contributivo')
        $selected = 'selected';
    else
        $selected = '';
    echo '<option ' . $selected . '>No Contributivo</option>';

    if ($regimen_afiliacion == 'Otros')
        $selected = 'selected';
    else
        $selected = '';
    echo ' <option ' . $selected . '>Otros</option>';
    echo ' </select>   
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="aseguradora">Aseguradora</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="aseguradora" ' . $readonly . '>';

    $selected = '';
    if ($aseguradora == 'Comfenalco')
        $selected = 'selected';
    else
        $selected = '';
    echo '<option ' . $selected . '>Comfenalco</option>';

    if ($aseguradora == 'Comfandi')
        $selected = 'selected';
    else
        $selected = '';
    echo '<option ' . $selected . '>Comfandi</option>';

    if ($aseguradora == 'Otros')
        $selected = 'selected';
    else
        $selected = '';
    echo '<option ' . $selected . '>Otros</option>  ';
    echo '</select> 
                                    </div>
                                </div>
                            </div>
                      </div>  
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="lugar_parto">Lugar de Atención del Parto</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="lugar_parto" ' . $readonly . '>
                                            ';
    getEntidadesSalud();
    echo'</select>  
                                        <div id="v_lugar_parto" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div> 
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="departNace">Departamento de Nacimiento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="departNace" onchange="cargarCiudadDepartamento()" ' . $readonly . '>
                                             ';
    getDepartamentos();
    echo' </select>  
                                        
                                    </div>
                                </div>
                            </div>
                      </div>   
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="ciudadNace">Ciudad de Nacimiento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="ciudadNace" ' . $readonly . '>
                                            <option>Buenaventura</option>
                                            <option>Cali</option>
                                            <option>Bogota</option>                                                
                                        </select>    
                                        <div id="v_ciudadNace" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <!--<div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <div class="input-group">
                                        <label>Registrar esquema de Vacunaci&oacute;n </label>
                                        <input type="checkbox" id="registraVacunacion" />    
                                    </div>
                                </div>
                            </div>
                      </div>-->
                  </div><!-- /.box-body -->

                    <!--<div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>-->

          </div><!-- /.box -->';

    getDataMomChild($id_mom, $type);
}

function getDataMomChild($idMon, $type) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select numero_identificacion'
            . ', primer_nombre, segundo_nombre'
            . ', primer_apellido'
            . ', segundo_apellido'
            . ', fecha_nacimiento'
            . ', fk_tbl_tipo_identificacion'
            . ', telefono'
            . ', correo_electronico'
            . ' from tbl_personas'
            . ' where id_tbl_personas=' . $idMon;


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($numero_identificacion
                , $primer_nombre
                , $segundo_nombre
                , $primer_apellido
                , $segundo_apellido
                , $fecha_nacimiento
                , $tipo_identificacion
                , $telefono
                , $correo_electronico);

        $query->fetch();
    }

    $readonly = '';

    if ($type == 2) {
        $readonly = ' disabled';
    }


    echo ' 
          <!-- Form Element sizes --><!-- /.box --><!-- /.box -->

          <!-- Input addon --><!-- /.box -->

        </div><!--/.col (left) -->
        <!-- right column -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Datos de la Madre</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                <div class="box-body">
                    <div class="form-group">
                      <div class="row">
                            <div class="col-xs-12">    
                                <label for="primerNombreMadre">Primer Nombre Madre</label>
                            </div>
                            <div class="col-xs-12"> 
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input type="text" class="form-control" id="primerNombreMadre" placeholder="" onblur="requerido(\'primerNombreMadre\')" ' . $readonly . ' value="' . $primer_nombre . '" />
                                        <div id="v_primerNombreMadre" style="text-align: center"></div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="segundoNombreMadre">Segundo Nombre Madre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoNombreMadre" placeholder="" ' . $readonly . ' value="' . $segundo_nombre . '" />
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="primerApellidoMadre">Primer Apellido Madre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="primerApellidoMadre" placeholder="" onblur="requerido(\'primerApellidoMadre\')" ' . $readonly . ' value="' . $primer_apellido . '" />
                                        <div id="v_primerApellidoMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="segundoApellidoMadre">Segundo Apellido Madre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoApellidoMadre" placeholder="" ' . $readonly . ' value="' . $segundo_apellido . '" />
                                    </div>
                                </div>
                            </div>
                      </div>

                       <!-- Date dd/mm/yyyy -->
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Fecha de Nacimiento:</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" class="form-control"  id="fechaNaceMadre" onblur="requerido(\'fechaNaceMadre\')" ' . $readonly . ' value="' . $fecha_nacimiento . '" />
                                        <div id="v_fechaNaceMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="tipoDocMadre">Tipo de Documento </label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></div>
                                        <select class="form-control" id="tipoDocMadre" onchange="requerido(\'tipoDocMadre\')" disabled >
                                            ';
    getTipoIdentificacion(2, $tipo_identificacion);

    echo '</select> 
                                        <div id="v_tipoDocMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="numIdetificacionMadre">N&uacute;mero de Documento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="numIdetificacionMadre" placeholder="" onblur="requerido(\'numIdetificacionMadre\')" disabled value="' . $numero_identificacion . '" />
                                        <div id="v_numIdetificacionMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>

                  <!-- phone mask -->
                    <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Tel&eacute;fono</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" class="form-control" data-inputmask=\'"mask": "(999) 999-9999"\' data-mask id="telefonoMadre" ' . $readonly . ' value="' . $telefono . '" />
                                    </div>
                                </div>
                            </div>
                      </div>


                    <!-- phone mask -->
                    <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Celular</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" class="form-control" data-inputmask=\'"mask": "(999) 999-9999"\' data-mask id="celularMadre" ' . $readonly . ' value="' . $telefono . '" />
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="correoMadre">Correo</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                        <input type="text" class="form-control" placeholder="" id="correoMadre" ' . $readonly . ' value="' . $correo_electronico . '" />
                                    </div>
                                </div>
                            </div>
                      </div>
                  </div><!-- /.box-body -->';

    if ($type == 1) {
        echo ' <div class="box-footer" align="center">
                        <button type="button" class="btn btn-primary" onclick="Javascript:saveEditChild();">Guardar</button>
                        <button type="button" class="btn btn-danger" onclick="">Cancelar</button>
                    </div>';
    }

    echo '</div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->  


    </form>


</section><!-- /.content -->';  /*  */
}
