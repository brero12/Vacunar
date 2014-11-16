<?php 
    include ('../../controller/functions_child.php');

    $idPersona      = $_POST['idPersona'];
    $etiquetaPunto  = $_POST['etiquetaPunto'];
    $infoChildSelected = getDataSelectedPerson($idPersona);

    $infoMomChildSelected = getDataSelectedPerson($infoChildSelected['is_mom']);

    $infoListVaccines = getDataSchemaChild($idPersona);

?>
<script type="text/javascript">
(function($) {
	$(document).ready(function() {
        $('.panel').on('hide.bs.collapse', function (e) {
            
            //alert("hide");
            //$(this).find(".close_link_content").hide();
            //$(this).find(".open_link_content").show();
        })

        $('.panel').on('show.bs.collapse', function (e) {
            //alert("show");
            //$(this).find(".close_link_content").show();
            //$(this).find(".open_link_content").hide();
        })
  });
})(jQuery);
</script>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <button type="button" class="btn btn-primary btn-block" onclick="Javascript:viewDataChild('<?php echo $etiquetaPunto; ?>');"><< Regresar</button>
            <div class="box-header" valign="bottom">
                <h3 class="box-title">Informaci&oacute;n del registro seleccionado</h3>                
            </div><!-- /.box-header -->
            <div class="box-body">
                <!--<div class="box-body" id='contenedor_aux_1'>
                    TAKE
                </div>-->
                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                        <div class="box-header">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Datos ni&ntilde;o
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body" id="container_info_child">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12" align="center"> 
                                            <table border = "0" width="70%">
                                                <tr >
                                                    <td width="30%"><label for="primerNombre" >Primer Nombre :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['primer_nombre']; ?>"  /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Segundo Nombre :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['segundo_nombre']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Primer Apellido :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['primer_apellido']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Segundo Apellido :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['segundo_apellido']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Fecha de Nacimiento: <br/> (AAAA-MM-DD)</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['fecha_nacimiento']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Tipo de Identificaci&oacute;n :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['descripcion']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >N&uacute;mero de Identificaci&oacute;n :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['numero_identificacion']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >R&eacute;gimen de aseguramiento :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['regimen_afiliacion']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Aseguradora :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoChildSelected['aseguradora']; ?>" /></td>
                                                </tr>
                                            </table>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-danger">
                        <div class="box-header">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Datos madre
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body" id="container_info_mother">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12" align="center"> 
                                            <table border = "0" width="70%">
                                                <tr >
                                                    <td width="30%"><label for="primerNombre" >Primer Nombre :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['primer_nombre']; ?>"  /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Segundo Nombre :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['segundo_nombre']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Primer Apellido :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['primer_apellido']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Segundo Apellido :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['segundo_apellido']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Fecha de Nacimiento: <br/>(AAAA-MM-DD)</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['fecha_nacimiento']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Tipo de Identificaci&oacute;n :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['descripcion']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >N&uacute;mero de Identificaci&oacute;n :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['numero_identificacion']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Telefono :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['telefono']; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="primerNombre" >Correo electr&oacute;nico :</label></td>
                                                    <td><input readonly type="text" class="form-control" value="<?php echo $infoMomChildSelected['correo_electronico']; ?>" /></td>
                                                </tr>
                                            </table>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Esquema de vacunaci&oacute;n ni&ntilde;o
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="box-body" id="container_info_vaccination">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nombre Vacuna</th>
                                        <th>Aplicada</th>
                                        <th>Dosis</th>
                                        <th>Fecha Aplicaci&oacute;n</th>
                                    </tr>
                                    </thead>
                                    <?php
                                        for($i = 0; $i< count($infoListVaccines); $i++){
                                            //$fecha_nacimiento = new DateTime($infoListVaccines[$i]['fecha_nacimiento']);

                                            echo "
                                            <tr>
                                                <td>".$infoListVaccines[$i]['nombre_vacuna']."</td>";
                                            
                                            if(!empty($infoListVaccines[$i]['dosis1'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Dosis 1</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_dosis1']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['dosis2'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Dosis 2</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_dosis2']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['dosis3'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Dosis 3</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_dosis3']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['dosis4'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Dosis 4</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_dosis4']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['dosis5'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Dosis 5</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_dosis5']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['refuerzo1'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Refuerzo 1</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_refuerzo1']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['refuerzo2'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Refuerzo 2</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_refuerzo2']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['adicional1'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Adicional 1</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_adicional1']."</td>
                                            </tr>
                                            ";     
                                            }
                                            else if(!empty($infoListVaccines[$i]['adicional2'])){
                                            echo "
                                                <td><span class='label label-success'>Aplicada</span></td>
                                                <td>Adicional 2</td>
                                                <td>".$infoListVaccines[$i]['fecha_vacuna_adicional2']."</td>
                                            </tr>
                                            ";     
                                            }
                                            
                                        }
                                        
                                    ?>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->