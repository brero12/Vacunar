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
        <li class="active">Editar Vacuna</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Editar Vacuna  </h3>
    </div><!-- /.box-header -->
    <div class="box-body" align="center">
        <div class="form-group"> 
            <div class="row">
                <div class="col-md-5" >
                    <input type="hidden" class="form-control" id="id_vaccine_schema" value="<?php echo $_POST['id_vaccine_schema']; ?>" />
                    <table border = "0" width="100%">
                        <tr >
                            <td width="30%"><label for="primerNombre" >Vacuna :</label></td>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-addon" ><i class="fa  fa-pencil"></i></span>
                                    <input type="text" class="form-control" id="nombreVacuna" value="<?php echo $_POST['nombre_vacuna']; ?>" />
                                    <div id="v_nombreVacuna" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 1 :</label></td>
                            <td >
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%"  id="dosis1" value="<?php echo $_POST['dosis1']; ?>" />
                                    <div id="v_dosis1" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 2 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="dosis2" value="<?php echo $_POST['dosis2']; ?>" />
                                    <div id="v_dosis2" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 3 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="dosis3" value="<?php echo $_POST['dosis3']; ?>" />
                                    <div id="v_dosis3" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 4 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="dosis4" value="<?php echo $_POST['dosis4']; ?>" />
                                    <div id="v_dosis4" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Dosis 5 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="dosis5" value="<?php echo $_POST['dosis5']; ?>" />
                                    <div id="v_dosis5" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Refuerzo 1 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="refuerzo1" value="<?php echo $_POST['refuerzo1']; ?>" />
                                    <div id="v_refuerzo1" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Refuerzo 2 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="refuerzo2" value="<?php echo $_POST['refuerzo2']; ?>" />
                                    <div id="v_refuerzo2" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Adicional 1 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="adicional1" value="<?php echo $_POST['adicional1']; ?>" />
                                    <div id="v_adicional1" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label >Adicional 2 :</label></td>
                            <td>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                    <input type="text" class="form-control" style="width: 30%" id="adicional2" value="<?php echo $_POST['adicional2']; ?>" />
                                    <div id="v_adicional2" style="text-align: center"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="col-xs-12" id="saveVaccine">
                                    <button type="button" class="btn btn-primary btn-block" onclick="Javascript:saveVaccineSchema(2);">Modificar vacuna</button>
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
