<?php 
include '../controller/functions_schema.php'; 

$listVaccines = getAllVaccines();

?>

<script type="text/javascript">
    //128 = jpretty_form
    var listVaccines = <?php echo json_encode($listVaccines, 128); ?>;
    
    
    function limpiarFormulario(){
        document.getElementById("vaccine").selectedIndex = 0;
        document.getElementById("dose").selectedIndex = 0;
        cargarMesesDosis('dosis1');
        document.getElementById("fechaVacunacion").value = "";
        //DIV'S ERROR
        document.getElementById("divError").style.display = "none";
        document.getElementById("subDivError").innerHTML = "";
    }
    
    function agregarErrorDiv(mensajeError){
        document.getElementById("divError").style.display = "block";
        var anteriorMensajeError = document.getElementById("subDivError").innerHTML;
        
       document.getElementById("subDivError").innerHTML = anteriorMensajeError + "#- "+mensajeError + "<br/> ";
    }
    
    function cargarMesesDosis(dosis_seleccionada){
        var idVacunaSeleccionada = (document.getElementById("vaccine").selectedIndex);
        document.getElementById("edadVacunacion").value = listVaccines[idVacunaSeleccionada][dosis_seleccionada];
    }
    
    /*
        INICIO VALIDADORES
    */
    function validarVacunaDuplicada(idVacuna, dosisAplicada){
        var duplicado = false;
        var tbl_esquema = document.getElementById("tbl_esquema");
        var total_filas = tbl_esquema.rows.length;
        
        //Se inicia el indice en 1 debido a que la primera fila (0) contiene el encabezado de la tabla y este no tiene informacion necesaria
        for(var i = 1; i< total_filas; i++){
            var x = tbl_esquema.rows[i].cells;
            
            //Compara el id de la vacuna (que se encuentra oculto) y el nombre de la dosis
            //if(x[0].innerHTML === idVacuna && x[2].innerHTML === dosisAplicada){
            if(x[0].innerHTML === idVacuna){
                duplicado = true;
                break;
            }
        }
        
        return duplicado;
    }
    
    function validarAgregarVacunaTabla(){
        document.getElementById("divError").style.display = "none";
        document.getElementById("subDivError").innerHTML = "";
        
        var fechaVacunacion = document.getElementById("fechaVacunacion").value;
        var patronFecha =/^([0-9]{4})\/([0-9]{1,2})\/([0-9]{1,2})$/;  //FORMATO -> YYYY/MM/DD
        
        if(!patronFecha.test(fechaVacunacion)){
            agregarErrorDiv("La fecha de vacunaci&oacute;n NO cumple con el formato");
            return;
        }
        else if(validarVacunaDuplicada(document.getElementById("vaccine").value, document.getElementById("dose").options[document.getElementById("dose").selectedIndex].innerHTML)){
            //Este condicional evalua si la vacuna con la misma dosis ya fue registrada en la tabla de esquema de vacunacion
            agregarErrorDiv("Vacuna con misma dosis duplicada. Por favor verifique los datos.");
            return;
        }
        else{agregarVacunaTabla();}
    }
    
    /*
        FIN VALIDADORES
    */
    function agregarVacunaTabla(){
        var tbl_esquema = document.getElementById("tbl_esquema");
        var total_filas = tbl_esquema.rows.length;
        
        var row = tbl_esquema.insertRow(total_filas);

        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);

        cell0.style.display = "none";
        cell0.innerHTML = document.getElementById("vaccine").value;
        cell1.style.display = "none";
        cell1.innerHTML = document.getElementById("dose").value;
        cell2.innerHTML = document.getElementById("vaccine").options[document.getElementById("vaccine").selectedIndex].innerHTML;
        cell3.innerHTML = document.getElementById("dose").options[document.getElementById("dose").selectedIndex].innerHTML;
        cell4.innerHTML = document.getElementById("fechaVacunacion").value;
        //CREA EL BOTON DE ELIMINAR Y SE ASOCIA LA ACCION AL NUMERO DE FILA CORRESPONDIENTE EN LA TABLA DE FORMA DINAMICA
        cell5.innerHTML = "<button type='button' class='btn btn-danger' data-dismiss='modal' onclick='javascript:borrarFilaVacunaTabla(this.parentNode.parentNode.rowIndex)'><i class='fa fa-times'></i></button>";
        
        limpiarFormulario();
    }
    
    function borrarFilaVacunaTabla(nfila){
        document.getElementById("tbl_esquema").deleteRow(nfila);
    }
    
    $(function() {
        $('#fechaVacunacion').datetimepicker({
            format: 'YYYY/MM/DD',
            pickTime: false
        });
        
        $('#botonConfirmarCancelar').click(function() {
            cargarMapas(1);
        });
        
        $('#botonConfirmarGuardar').click(function() {
            saveChildSchema();
            
            document.getElementById("compose-modal-finalizar").style.display = "none";
        });
        /*$( "#dialog" ).dialog({autoOpen: false});
        
        $('#botonCancelar').click(function() {
            $( "#dialog" ).dialog({
                title: "Cancelar esquema",
                modal:true,
                resizable: false,
                buttons: {
                    "Sí": function() {
                        cargarMapas(1);
                        $( this ).dialog( "close" );
                    },
                    "No": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
            $('#dialog').dialog('open');
        });*/
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
                    <input type="hidden" id="idChild" value="<?php echo $idChild;?>" />
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
                                        <td><label >Fecha Vacunaci&oacute;n : (YYYY/MM/DD)</label></td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" class="form-control" id="fechaVacunacion" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <br/>
                                            <div id="divError" class="callout callout-danger" style="display:none">
                                                <div id="subDivError"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-xs-12" id="saveSchema">
                                                <button type="button" class="btn btn-primary btn-block" onclick="Javascript:validarAgregarVacunaTabla();">Agregar vacuna</button>
                                                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#compose-modal-finalizar">Finalizar esquema</button>
                                                <!--<button type="button" id="botonCancelar" class="btn btn-danger btn-block" >Cancelar esquema</button>-->
                                                <button type="button" id="botonCancelar" class="btn btn-danger btn-block" data-toggle="modal" data-target="#compose-modal">Cancelar esquema</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <br/>
                                            <!--<div id="dialog" class="col-xs-12" style="display:none"> 
                                                ¿Desea cancelar el esquema de vacunaci&oacute;n?.<br/><br/> Si lo cancela no se guardar&aacute;n los cambios realizados en el esquema
                                            </div> 
                                            -->
                                            <div class="modal fade" id="compose-modal-finalizar" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                                                            <h4 class="modal-title"><i class="fa fa-chevron-right"></i> <label>Guardar esquema</label></h4>
                                                        </div>
                                                        <div class="modal-body">                                                            
                                                            <p >
                                                                &iquest;Desea guardar el esquema de vacunaci&oacute;n&#63;.<br/>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"><i class="fa fa-check" id="botonConfirmarGuardar"></i> S&iacute;</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            
                                            <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                                                            <h4 class="modal-title"><i class="fa fa-chevron-right"></i> <label>Cancelar esquema</label></h4>
                                                        </div>
                                                        <div class="modal-body">                                                            
                                                            <p >
                                                                &iquest;Desea cancelar el esquema de vacunaci&oacute;n&#63;.<br/><br/> Si lo cancela no se guardar&aacute;n los cambios realizados en el esquema
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"><i class="fa fa-check" id="botonConfirmarCancelar"></i> S&iacute;</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            
                                            
                                            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8" style="float: center">
                            <div class="table-responsive no-padding">
                                <table id="tbl_esquema" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID Vacuna</th>
                                        <th style="display: none;">ID Dosis</th>
                                        <th>Nombre Vacuna</th>
                                        <th>Dosis </th>
                                        <th>Fecha Vacunaci&oacute;n</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</section><!-- /.content -->
                
