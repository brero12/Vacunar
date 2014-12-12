<?php include '../controller/functions_child.php'; ?>

<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {

        $('#tbl_ninos').dataTable({
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
        
        document.getElementById("tbl_ninos_filter").style.display="none";
    });
</script>

<section class="content-header">
    <h1>
        Administraci&oacute;n
        <small>Ver ni&ntilde;os</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Administraci&oacute;n</a></li>
        <li class="active">Ver ni&ntilde;os</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">                           

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de ni&ntilde;os registrados</h3>
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
                        <div id="contenedor_resultado_puerta" align="center">
                        </div>
                    </div>
                    
                    <table id="tbl_ninos" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No. Identificaci&oacute;n</th>
                                <th>Nombre(s)</th>
                                <th>Apellido(s)</th>
                                <th>Fecha Nacimiento</th>
                                <th>Estado</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        </thead>
                        <tbody>
                            <?php getDataChild(); ?>                                           
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
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

</section><!-- /.content -->
