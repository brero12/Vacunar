<?php 
    include ('../../controller/functions_child.php');

    $idPersona = $_POST['idPersona'];
    $listadoNinosPunto = getDataSelectedChild($idPersona);

    //echo "HOLALA ".$listadoNinosPunto[0]['primer_nombre'];

    $fecha_actual   = new DateTime('today');
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Informaci&oacute;n del registro seleccionado</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box-body" id='contenedor_aux_1'>
                    TAKE
                </div>
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
                                TAKE
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
                                MY
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
                                MONEY
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->