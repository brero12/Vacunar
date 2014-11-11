<?php 

include '../controller/functions_child.php'; 

$codMapa = $_POST['label'];
$listadoNinosPunto = getDataMapChild($codMapa);

//echo "HOLALA ".$listadoNinosPunto[0]['primer_nombre'];

$fecha_actual   = new DateTime('today');
?>

<div class="box-header">
    <h3 class="box-title">Listado de Informaci&oacute;n del registro seleccionado</h3>
</div><!-- /.box-header -->
<div class="box-body" ></div><!-- /.box-body -->

    <table class="table table-hover">
        <thead>
        <tr>
            <th>No. Identificaci&oacute;n</th>
            <th>Apellido(s)</th>
            <th>Nombre(s)</th>
            <th>Edad</th>
            <th>Reg.Afiliaci&oacute;n</th>
            <th>Aseguradora</th>
        </tr>
        </thead>
        <tbody>
    <?php

    for($i = 0; $i< count($listadoNinosPunto); $i++){
        $fecha_nacimiento = new DateTime($listadoNinosPunto[$i]['fecha_nacimiento']);

        echo "
        <tr onclick='javascript:cargarInfoSelectedChild(".$listadoNinosPunto[$i]['id_tbl_personas'].")'>
            <td>".$listadoNinosPunto[$i]['numero_identificacion']."</td>
            <td>".$listadoNinosPunto[$i]['primer_apellido']." ".$listadoNinosPunto[$i]['segundo_apellido']."</td>
            <td>".$listadoNinosPunto[$i]['primer_nombre']." ".$listadoNinosPunto[$i]['segundo_nombre']."</td>
            <td>".($fecha_nacimiento->diff($fecha_actual)->y)."</td>
            <td>".$listadoNinosPunto[$i]['regimen_afiliacion']."</td>
            <td>".$listadoNinosPunto[$i]['aseguradora']."</td>
        </tr>
        ";     
    }

    /**/
    /*
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
                                                    <td>2014-12-07</td>
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
                                                    <td>2014-12-07</td>
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
                                                    <td>2014-12-07</td>
                                                </tr>
                                                <tr>
                                                    <td>SARAMPION, RUBEOLA Y PAPERAS</td>
                                                    <td><span class="label label-success">Aplicada</span></td>
                                                    <td>1</td>
                                                    <td>2014-12-07</td>
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
                                                    <td>2014-12-07</td>
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
                                                    <td>0000-00-00</td>
                                                </tr>
                                                <tr>
                                                    <td>FIEBRE TIFOIDEA</td>
                                                    <td><span class="label label-danger">No aplicada</span></td>
                                                    <td>0</td>
                                                    <td>0000-00-00</td>
                                                </tr>
                                                <tr>
                                                    <td>MENINGOCOCO</td>
                                                    <td><span class="label label-success">Aplicada</span></td>
                                                    <td>1</td>
                                                    <td>2014-12-07</td>
                                                </tr>
                                                <tr>
                                                    <td>TÉTANO Y DIFTERIA</td>
                                                    <td><span class="label label-success">Aplicada</span></td>
                                                    <td>2</td>
                                                    <td>2014-12-07</td>
                                                </tr>
                                            </table>    
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->';*/

    ?>

    <tbody>
    </table>
</div><!-- /.box -->