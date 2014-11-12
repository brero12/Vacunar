<?php 
    include ('../../controller/functions_child.php');

    $idPersona      = $_POST['idPersona'];
    $etiquetaPunto  = $_POST['etiquetaPunto'];
    $infoChildSelected = getDataSelectedPerson($idPersona);

    $infoMomChildSelected = getDataSelectedPerson($infoChildSelected['is_mom']);

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
            <div class="box-header">
                <h3 class="box-title">Informaci&oacute;n del registro seleccionado</h3>
                <button type="button" class="btn btn-primary" onclick="Javascript:viewDataChild('<?php echo $etiquetaPunto; ?>');">Atr&aacute;s</button>
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
                                    <tr>
                                        <th>Nombre Vacuna</th>
                                        <th>Aplicada</th>
                                        <th>Dosis</th>
                                        <th>Fecha Aplicaci&oacute;n</th>
                                    </tr
                                    <tr>
                                        <td>TUBERCULOSIS EXTRAPULMONAR</td>
                                        <td><span class="label label-success">Aplicada</span></td>
                                        <td>1</td>
                                        <td>2014-12-07</td>
                                    </tr>
                                    <tr>
                                        <td>HEPATITIS B</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>POLIOMIELITIS</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>HAEMOPHILUS INFLUENZAE TIPO B</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>DIFTERIA, TETANO Y TOSFERINA</td>
                                        <td><span class="label label-success">Aplicada</span></td>
                                        <td>2</td>
                                        <td>2014-12-07</td>
                                    </tr>
                                    <tr>
                                        <td>ROTAVIRUS</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>NEUMOCOCO</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>INFLUENZA (GRIPE)</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>TÉTANO Y DIFTERIA</td>
                                        <td><span class="label label-success">Aplicada</span></td>
                                        <td>2</td>
                                        <td>2014-12-07</td>
                                    </tr>
                                    <tr>
                                        <td>SARAMPION, RUBEOLA Y PAPERAS</td>
                                        <td><span class="label label-success">Aplicada</span></td>
                                        <td>1</td>
                                        <td>2014-12-07</td>
                                    </tr>
                                    <tr>
                                        <td>FIEBRE AMARILLA</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>HEPATITIS A</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>VARICELA</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>SARAMPIÓN Y RUBEOLA</td>
                                        <td><span class="label label-success">Aplicada</span></td>
                                        <td>1</td>
                                        <td>2014-12-07</td>
                                    </tr>
                                    <tr>
                                        <td>VIRUS PAPILOMA HUMANO</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>00-00-0000</td>
                                    </tr>
                                    <tr>
                                        <td>RABIA HUMANA</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>0000-00-00</td>
                                    </tr>
                                    <tr>
                                        <td>FIEBRE TIFOIDEA</td>
                                        <td><span class="label label-danger">No aplicada</span></td>
                                        <td>0</td>
                                        <td>0000-00-00</td>
                                    </tr>
                                    <tr>
                                        <td>MENINGOCOCO</td>
                                        <td><span class="label label-success">Aplicada</span></td>
                                        <td>1</td>
                                        <td>2014-12-07</td>
                                    </tr>
                                    <tr>
                                        <td>TÉTANO Y DIFTERIA</td>
                                        <td><span class="label label-success">Aplicada</span></td>
                                        <td>2</td>
                                        <td>2014-12-07</td>
                                    </tr>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->