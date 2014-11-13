<?php 
include '../controller/functions_schema.php'; 

$listVaccines = getAllVaccines();

$listNamesVaccines = array();

for($i = 0; $i< count($listVaccines); $i++){
    array_push ($listNamesVaccines , $listVaccines[$i]['nombre_vacuna']);
}


?>

<script type="text/javascript">
    $(function() {
       $('#fechaVacunacion').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        
        //("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
       /*         //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();*/
        
    });
</script>

                   
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ver Esquema
        <small>esquema de vacunaci&oacute;n </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Administraci&oacute;n</a></li>
        <li class="active">Registrar ni&ntilde;o</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Esquema de vacunaci&oacute;n </h3> 
                </div><!-- /.box-header -->

                <div class="box-body" align="center">
                    <div class="form-group"> 
                        <div class="row">
                            <div class="col-md-6" style="float: center">
                                <table border = "1" width="100%">
                                    <tr >
                                        <td width="30%"><label for="primerNombre" >Vacuna :</label></td>
                                        <td><input type="text" class="form-control" value=""  /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="primerNombre" >Dosis :</label></td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                                <select class="form-control" id="vaccine" onchange="cargarCiudadDepartamento()">
                                                     <?php 
                                                        for($i = 0; $i< count($listVaccines); $i++){
                                                            echo '<option value=' . $listVaccines[$i]['id_tbl_esquema_vacunacion']. '>' . utf8_encode($listVaccines[$i]['nombre_vacuna']) . '</option>';
                                                        }
                                                    ?>                                                        
                                                </select>    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="primerNombre" >Edad de vacunaci&oacute;n :</label></td>
                                        <td><input type="text" class="form-control" value="" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="primerNombre" >Fecha Vacunaci&oacute;n :</label></td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" class="form-control" id="fechaVacunacion" />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre Vacuna</th>
                                <th>Dosis 1</th>
                                <th>Dosis 2</th>
                                <th>Dosis 3</th>
                                <th>Dosis 4</th>
                                <th>Dosis 5</th>
                                <th>Refuerzo 1</th>
                                <th>Refuerzo 2 </th>
                                <th>Adicional 1 </th>
                                <th>Adicional 2</th>
                                <th>Tipo</th>
                            </tr

                             <?php /*getDataSchemaChild();*/ ?>                                        

                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</section><!-- /.content -->
                
