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

function insertChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento, $idMapa, $etiquetaPunto) {

    global $bd_host;
    global $bd_usuario;
    global $bd_password;
    global $bd_base;

    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    //echo 'on sqlput <br>';


    $consulta = 'insert into tbl_personas (fk_tbl_tipo_identificacion, 
						numero_identificacion, primer_nombre, 
                        segundo_nombre, primer_apellido, 
                        segundo_apellido,fecha_nacimiento,
                        regimen_afiliacion, aseguradora, 
                        fk_tbl_entidad_salud_atencioparto,
                        fk_municipio_nacimiento, 
                        fk_tbl_mapas, fk_tbl_puntos_etiqueta_punto) values (?,?,?,?,?,?,?,?,?,?,?,?,?)';

    /* echo '<option>'.$consulta.'</option>'; */



    $query = $mysqli->prepare($consulta);
    //if ($result = $mysqli->query($consulta)) {
    // execute

   // var_dump($query);

    $query->bind_param('issssssssiiis', $fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $regimen_afiliacion, $aseguradora, $fk_tbl_entidad_salud_atencioparto, $fk_municipio_nacimiento, $idMapa, $etiquetaPunto);

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


    $consulta = 'insert into tbl_personas (fk_tbl_tipo_identificacion, 
						numero_identificacion, primer_nombre, 
                        segundo_nombre, primer_apellido, 
                        segundo_apellido,fecha_nacimiento,
                        telefono, correo_electronico ,is_mom,
                        fk_tbl_mapas, fk_tbl_puntos_etiqueta_punto) values (?,?,?,?,?,?,?,?,?,1,?,?)';

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
    //$resultChildren = array();
    
    $mysqli = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);

    $consulta = 'select per.numero_identificacion, per.primer_nombre, '
            . 'per.segundo_nombre, per.primer_apellido, '
            . 'per.segundo_apellido, per.fecha_nacimiento, '
            . 'per.regimen_afiliacion, per.aseguradora '
            . 'from tbl_personas per '
            . 'where per.is_mom <> 0 and per.fk_tbl_puntos_etiqueta_punto="'.$codMapa.'"  order by per.primer_nombre';


    if ($query = $mysqli->prepare($consulta)) {
        $query->execute();
        $query->bind_result($numero_identificacion, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido , $fecha_nacimiento, $regimen_afiliacion,$aseguradora);

        while($query->fetch())
        { 
           /* echo 'numero_identificacion : '.$numero_identificacion.'<br>'.
                'primer_nombre  : '          .$primer_nombre.'<br>'.
                'segundo_nombre : '         .$segundo_nombre.'<br>'.
                'primer_apellido : '        .$primer_apellido.'<br>'.
                'segundo_apellido : '       .$segundo_apellido.'<br>'.
                'fecha_nacimiento : '       .$fecha_nacimiento.'<br>'.
                'regimen_afiliacion : '         .$regimen_afiliacion.'<br>'.
                'aseguradora : '         .$aseguradora;    */
            
            
        
        
        echo ' <!-- Warning box -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">'.$primer_nombre.' '.$segundo_nombre.' '.$primer_apellido.' '.$segundo_apellido.'</h3>
                                    <div class="box-tools pull-right">
                                        <ul class="pagination pagination-sm inline">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box-body">
                                    Fecha de Nacimiento: <code>'.$fecha_nacimiento.'</code>
                                    <p>
                                        Regimen de Afiliacion   :     '.$regimen_afiliacion.'<br/>
                                        Aseguradora             :     '.$aseguradora.'<br/>
                                    </p>
                                    
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Nombre Vacuna</th>
                                            <th>Aplicada</th>
                                            <th>Dosis</th>
                                            <th>Fecha Aplicaci&oacute;n</th>
                                        </tr
                                        <tr>
                                            <td>TUBERCULOSIS EXTRAPULMONAR</td>
                                            <td><span class="label label-success">Aplicada</span></td>
                                            <td>1</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>HEPATITIS B</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>POLIOMIELITIS</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>HAEMOPHILUS INFLUENZAE TIPO B</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>DIFTERIA, TETANO Y TOSFERINA</td>
                                            <td><span class="label label-success">Aplicada</span></td>
                                            <td>2</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>ROTAVIRUS</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>NEUMOCOCO</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>INFLUENZA (GRIPE)</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>TÉTANO Y DIFTERIA</td>
                                            <td><span class="label label-success">Aplicada</span></td>
                                            <td>2</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>SARAMPION, RUBEOLA Y PAPERAS</td>
                                            <td><span class="label label-success">Aplicada</span></td>
                                            <td>1</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>FIEBRE AMARILLA</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>HEPATITIS A</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>VARICELA</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>SARAMPIÓN Y RUBEOLA</td>
                                            <td><span class="label label-success">Aplicada</span></td>
                                            <td>1</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>VIRUS PAPILOMA HUMANO</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>00-00-0000</td>
                                        </tr>
                                        <tr>
                                            <td>RABIA HUMANA</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>FIEBRE TIFOIDEA</td>
                                            <td><span class="label label-danger">No aplicada</span></td>
                                            <td>0</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>MENINGOCOCO</td>
                                            <td><span class="label label-success">Aplicada</span></td>
                                            <td>1</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                        <tr>
                                            <td>TÉTANO Y DIFTERIA</td>
                                            <td><span class="label label-success">Aplicada</span></td>
                                            <td>2</td>
                                            <td>11-7-2014</td>
                                        </tr>
                                    </table>    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->';
    }
    
    }
    
    
}