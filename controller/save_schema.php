<?php
include 'functions_schema.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        $listVaccines   = $_POST['listVaccines']; 
        $idChild        = $_POST['idChild'];

        
        $lastId = insertChildSchema($listVaccines, $idChild);
        
        if($lastId !== -1){
            echo "Se realiz&oacute; registro de forma exitosa";
        }else{             

            //echo $primer_nombre.' - '.$segundo_nombre.' - '.$primer_apellido.'<br> Nacio en : '.$fk_municipio_nacimiento;

        }               
