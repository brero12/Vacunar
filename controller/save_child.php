<?php
include 'functions_child.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        $primer_nombre = $_POST['primerNombre']; 
        $segundo_nombre = $_POST['segundoNombre'];
        $primer_apellido = $_POST['primerApellido'];
        $segundo_apellido = $_POST['segundoApellido'];
        $fecha_nacimiento = $_POST['fechaNace'];
        $fk_tbl_tipo_identificacion = $_POST['tipoId'];
        $numero_identificacion = $_POST['numIdetificacion'];
        $regimen_afiliacion = $_POST['regimen'];
        $aseguradora = $_POST['aseguradora'];
        $fk_tbl_entidad_salud_atencioparto = $_POST['lugar_parto'];
        $departNace = $_POST['departNace'];
        $fk_municipio_nacimiento = $_POST['ciudadNace'];
        $vacunaAldia = $_POST['vacunaAldia'];
        $primerNombreMadre = $_POST['primerNombreMadre']; 
        $segundoNombreMadre = $_POST['segundoNombre'];
        $primerApellidoMadre = $_POST['primerApellido'];
        $segundoApellidoMadre = $_POST['segundoApellido'];
        $fechaNaceMadre = $_POST['fechaNaceMadre'];
        $tipoDocMadre = $_POST['tipoDocMadre'];
        $numIdetificacionMadre = $_POST['numIdetificacionMadre'];
        $telefonoMadre = $_POST['telefonoMadre'];
        $celularMadre = $_POST['celularMadre'];
        $correoMadre = $_POST['correoMadre'];
        
        insertChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, 
                        $segundo_nombre, $primer_apellido, 
                        $segundo_apellido,$fecha_nacimiento,
                        $regimen_afiliacion, $aseguradora, 
                        $fk_tbl_entidad_salud_atencioparto,
                        $fk_municipio_nacimiento);
        
        
        echo $primer_nombre.' - '.$segundo_nombre.' - '.$primer_apellido.'<br> Nacio en : '.$fk_municipio_nacimiento;

