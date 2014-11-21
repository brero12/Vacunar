<?php include '../controller/functions_child.php'; ?>

<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

 <script type="text/javascript">
    $(function() {

        $('#example2').dataTable({
            "bPaginate"     : true,
            "bLengthChange" : false,
            "bFilter"       : false,
            "bSort"         : true,
            "bInfo"         : true,
            "bAutoWidth"    : false,
            "iDisplayLength": 30
        });
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
                    <div class="box-tools">
                        <div class="input-group">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar"/>
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
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
                        <tbody>
                            <?php  getDataChild();?>                                           
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->