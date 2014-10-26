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
        $primer_nombreMadre = $_POST['primerNombreMadre']; 
        $segundo_nombreMadre = $_POST['segundoNombreMadre'];
        $primer_apellidoMadre = $_POST['primerApellidoMadre'];
        $segundo_apellidoMadre = $_POST['segundoApellidoMadre'];
        $fecha_nacimientoMadre = $_POST['fechaNaceMadre'];
        $fk_tbl_tipo_identificacionMadre = $_POST['tipoDocMadre'];
        $numero_identificacionMadre = $_POST['numIdetificacionMadre'];
        $telefonoMadre = $_POST['telefonoMadre'];
        $celularMadre = $_POST['celularMadre'];
        $correoMadre = $_POST['correoMadre'];
        $codMapa = $_POST['codMapa'];
        $etiquetaPunto = $_POST['etiquetaPunto'];
        
        
        $id_mom =  insertMomChild($fk_tbl_tipo_identificacionMadre, $numero_identificacionMadre, $primer_nombreMadre, 
                        $segundo_nombreMadre, $primer_apellidoMadre, 
                        $segundo_apellidoMadre,$fecha_nacimientoMadre,
                        $telefonoMadre, $celularMadre, 
                        $correoMadre,$codMapa,$etiquetaPunto);
        
        insertChild($fk_tbl_tipo_identificacion, $numero_identificacion, $primer_nombre, 
                        $segundo_nombre, $primer_apellido, 
                        $segundo_apellido,$fecha_nacimiento,
                        $regimen_afiliacion, $aseguradora, 
                        $fk_tbl_entidad_salud_atencioparto,
                        $fk_municipio_nacimiento,$id_mom,$codMapa,$etiquetaPunto);
        
        if($registraVacunacion=='on')
        {
            include '../view/child_schema.php';
        }else{             
        
        echo $primer_nombre.' - '.$segundo_nombre.' - '.$primer_apellido.'<br> Nacio en : '.$fk_municipio_nacimiento;

        }               
        
        echo $primer_nombre.' - '.$segundo_nombre.' - '.$primer_apellido.'<br> Nacio en : '.$fk_municipio_nacimiento;

        