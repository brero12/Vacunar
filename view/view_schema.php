<?php include '../controller/functions_schema.php'; ?>

<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {

       var dataTable =  $('#tbl_esquema_vacuna').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false,
            "iDisplayLength": 30
        });
        
        
        $("#searchbox").keyup(function() {
            dataTable.fnFilter(this.value);
        });  
        
        document.getElementById("tbl_esquema_vacuna_filter").style.display="none";        
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
        <li class="active">Ver Esquema</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Esquema Vacunas (Tiempo en meses)</h3> 
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div align="center">
                        <div class="row" >
                            <div class="col-xs-7" align="right" >

                            </div>
                            <div class="col-xs-5" align="right">
                                <table border="0" width="70%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td align="right" style="vertical-align:middle">
                                            <label>Buscar:</label>
                                        </td>
                                        <td style="vertical-align:middle">
                                           <input type="text" id="searchbox" class="form-control" style="width: 80%; margin: 10px; background-image: url(img/actions/search_icon.png); background-repeat: no-repeat; background-position:left center; padding-left: 20px" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary" onclick="javascript:addVaccine(this)"><i class="fa fa-plus" id="botonConfirmarCancelar"></i> Agregar vacuna</button>
                            <br/>
                        </div>
                        <div class="row" id="contenedor_resultado_esquema" align="center">
                        </div>
                    </div>

                    <table id="tbl_esquema_vacuna" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th>Nombre Vacuna</th>
                                <th>1ra Dosis</th>
                                <th>2do Dosis</th>
                                <th>3er Dosis</th>
                                <th>4ta Dosis</th>
                                <th>5ta Dosis</th>
                                <th>1er Refuerzo</th>
                                <th>2do Refuerzo</th>
                                <th>1er Adicional</th>
                                <th>2do Adicional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php getDataSchema(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div> <!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->