<?php include '../controller/functions_schema.php'; ?>
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>


<script type="text/javascript">
    $(function() {
        //Date range picker
       $('#fechaNace').datepicker({
            format: 'yyyy/mm/dd'
        });
        
    });
</script>

<section class="content-header">
    <h1>
        Ver Esquema
        <small>Esquema de vacunaci&oacute;n </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard" style="content:url(img/menu/home_menu.png); height:14px; width:14px"></i> Principal</a></li>
        <li><a href="#">Administraci&oacute;n</a></li>
        <li><a href="#">Esquema Vacunaci&oacute;n</a></li>
        <li class="active">Agregar Vacuna</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Agregar Vacuna  </h3>
    </div><!-- /.box-header -->
    <div class="box-body" align="center">
        <div class="form-group"> 
            <div class="row">
                <div class="col-md-3" >
                    <table border = "0" width="100%">
                        <tr >
                            <td width="35%"><label for="primerNombre" >Vacuna :</label></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon" ><i class="fa  fa-pencil"></i></span>
                                    <input type="text" class="form-control" id="nombreVacuna" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 1 :</label></td>
                            <td >
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="dosis1" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 2 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="dosis2" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 3 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="dosis3" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 4 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="dosis4" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 5 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="dosis5" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Refuerzo 1 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="refuerzo1" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Refuerzo 2 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="refuerzo2" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Adicional 1 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="adicional1" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Adicional 2 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" id="adicional2" />
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
                                <div class="col-xs-12" id="saveVaccine">
                                    <button type="button" class="btn btn-primary btn-block" onclick="Javascript:validarAgregarVacunaTabla();">Agregar vacuna</button>
                                    <button type="button" id="botonCancelar" class="btn btn-danger btn-block" onclick="javascript:viewSchema(this);">Cancelar</button>
                                </div>
                            </td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section><!-- /.content -->
