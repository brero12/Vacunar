<?php

include ("../controller/functions_child.php");



$fk_tbl_tipo_identificacion = $_POST['fk_tbl_tipo_identificacion'];
$numero_identificacion = $_POST['numero_identificacion'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre= $_POST['segundo_nombre'];
                        $primer_apellido= $_POST['primer_apellido'];
                        $segundo_apellido= $_POST['segundo_apellido'];
                        $fecha_nacimiento= $_POST['fecha_nacimiento'];
                        $regimen_afiliacion= $_POST['regimen_afiliacion'];
                        $aseguradora= $_POST['aseguradora'];
                        $fk_tbl_entidad_salud_atencioparto= $_POST['fk_tbl_entidad_salud_atencioparto'];
                        $fk_municipio_nacimiento = $_POST['fk_municipio_nacimiento'];
                        
                        
 insertChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, 
                        $segundo_nombre, $primer_apellido, 
                        $segundo_apellido,$fecha_nacimiento,
                        $regimen_afiliacion, $aseguradora, 
                        $fk_tbl_entidad_salud_atencioparto,
                        $fk_municipio_nacimiento);





