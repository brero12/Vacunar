<?php
    include 'functions_schema.php';

    $nombre_vacuna       = $_POST['nombre_vacuna']; 
    $dosis1              = $_POST['dosis1']; 
    $dosis2              = $_POST['dosis2']; 
    $dosis3              = $_POST['dosis3']; 
    $dosis4              = $_POST['dosis4']; 
    $dosis5              = $_POST['dosis5']; 
    $refuerzo1           = $_POST['refuerzo1']; 
    $refuerzo2           = $_POST['refuerzo2']; 
    $adicional1          = $_POST['adicional1']; 
    $adicional2          = $_POST['adicional2']; 

    $tipo_guardado       = $_POST['tipo_guardado']; 

    if($tipo_guardado == '1'){ //MODO "INSERTAR" Vacuna
        $id_tbl_esquema_vacunacion  = insertVaccineSchema($nombre_vacuna);
        $id_tbl_dosis_vacuna        = insertVaccineDose($id_tbl_esquema_vacunacion, $dosis1, $dosis2, $dosis3, $dosis4, $dosis5, $refuerzo1, $refuerzo2, $adicional1, $adicional2);
		
        if(!is_null($id_tbl_dosis_vacuna)){
            echo "<div class='callout callout-info'>
                    <h5>El registro se ha guardado exitosamente</h5> ".$id_tbl_dosis_vacuna."
                 </div>";
        }
    }
    else if($tipo_guardado == '2'){ //MODO "EDITAR" Vacuna
        $id_vaccine_schema   = $_POST['id_vaccine_schema']; 
        $id_tbl_esquema_vacunacion  = updateVaccineSchema($id_vaccine_schema, $nombre_vacuna);
        $id_tbl_dosis_vacuna        = updateVaccineDose($id_vaccine_schema, $dosis1, $dosis2, $dosis3, $dosis4, $dosis5, $refuerzo1, $refuerzo2, $adicional1, $adicional2);
		
		if(!is_null($id_tbl_dosis_vacuna)){
            echo "<div class='callout callout-info'>
                    <h5>El registro se ha modificado exitosamente</h5> ".$id_tbl_dosis_vacuna."
                 </div>";
        }
    }
    
