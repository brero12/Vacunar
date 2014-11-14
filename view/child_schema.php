<?php 
include '../controller/functions_schema.php'; 

$listVaccines = getAllVaccines();

/*$listDescriptionVaccines = array();

for($i = 0; $i< count($listVaccines); $i++){
    array_push ($listDescriptionVaccines , $listVaccines[$i]['descripcion']);
}*/


?>

<script type="text/javascript">
    var listVaccines = <?php echo json_encode($listVaccines, 128); ?>;
    
    function limpiarFormulario(){
    
    }
    
    function cargarMesesDosis(val){
        var idVacunaSeleccionada = (document.getElementById("vaccine").selectedIndex);
        var dosis_seleccionada = val;
        document.getElementById("edadVacunacion").value = listVaccines[idVacunaSeleccionada][dosis_seleccionada];
    }
    
    function agregarVacunaTabla(){
        /*
        
        PRUEBA PARA AGREGAR DINAMICAMENTE ELEMENTOS A LA TABLA SOLICITADA
        */
        
        var tbl_esquema = document.getElementById("tbl_esquema");
        var total_filas = tbl_esquema.rows.length;
        
        var row = tbl_esquema.insertRow(total_filas);

        // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        // Add some text to the new cells:
        cell1.innerHTML = document.getElementById("vaccine").options[document.getElementById("vaccine").selectedIndex].innerHTML;
        cell2.innerHTML = document.getElementById("dose").options[document.getElementById("dose").selectedIndex].innerHTML;
        cell3.innerHTML = document.getElementById("fechaVacunacion").value;
        cell4.innerHTML = "NEW CELL2";
    }
    
    $(function() {
       $('#fechaVacunacion').datetimepicker({
            format: 'YYYY/MM/DD',
            pickTime: false
        });
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
                                <table border = "0" width="100%">
                                    <tr >
                                        <td width="30%"><label for="primerNombre" >Vacuna :</label></td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                                <select class="form-control" id="vaccine" >
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
                                        <td><label >Dosis :</label></td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                                <select class="form-control" id="dose" onchange="javascript:cargarMesesDosis(this.value)">
                                                     <option value='dosis1'>Dosis 1</option>                                
                                                     <option value='dosis2'>Dosis 2</option>                                
                                                     <option value='dosis3'>Dosis 3</option>                                
                                                     <option value='dosis4'>Dosis 4</option>                                
                                                     <option value='dosis5'>Dosis 5</option>                                
                                                     <option value='refuerzo1'>Refuerzo 1</option>                                
                                                     <option value='refuerzo2'>Refuerzo 2</option>                                
                                                     <option value='adicional1'>Adicional 1</option>                                
                                                     <option value='adicional2'>Adicional 2</option>                                
                                                </select>    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="edadVacunacion" >Edad de vacunaci&oacute;n (Meses):</label></td>
                                        <td><input readonly type="text" id="edadVacunacion" class="form-control" value="<?php echo $listVaccines[0]['dosis1']; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label >Fecha Vacunaci&oacute;n :</label></td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" class="form-control" id="fechaVacunacion" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><br/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-xs-12">
                                                <button type="button" class="btn btn-primary btn-block" onclick="Javascript:agregarVacunaTabla();">Agregar</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10" style="float: center">
                            <div class="table-responsive no-padding">
                                <table id="tbl_esquema" class="table table-hover">
                                    <tr>
                                        <th>Nombre Vacuna</th>
                                        <th>Dosis </th>
                                        <th>Fecha Vacunaci&oacute;n</th>
                                        <th>Eliminar</th>
                                    </tr

                                     <?php /*getDataSchemaChild();*/ ?>                                        

                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</section><!-- /.content -->
                
