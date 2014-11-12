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
            <th>Edad (meses)</th>
            <th>Reg.Afiliaci&oacute;n</th>
            <th>Aseguradora</th>
        </tr>
        </thead>
        <tbody>
    <?php

    for($i = 0; $i< count($listadoNinosPunto); $i++){
        $fecha_nacimiento = new DateTime($listadoNinosPunto[$i]['fecha_nacimiento']);

        echo "
        <tr onclick='javascript:cargarInfoSelectedChild(".$listadoNinosPunto[$i]['id_tbl_personas'].", \"".$codMapa."\")'>
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
                echo '';*/

    ?>

    <tbody>
    </table>
</div><!-- /.box -->