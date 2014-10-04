<?php include '../controller/functions_child.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
 <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>


 <script type="text/javascript">
            $(function() {
                
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

           
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ni&ntilde;os
                        <small>Listado de ni&ntilde;os registrados</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Admon</a></li>
                        <li class="active">Ver ni&ntilde;os</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Hover Data Table</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. Id</th>
                                                <th>Nombre(s)</th>
                                                <th>Apellido(s)</th>
                                                <th>Fecha Nacimiento</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  getDataChild();?>                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No. Id</th>
                                                <th>Nombre(s)</th>
                                                <th>Apellido(s)</th>
                                                <th>Fecha Nacimiento</th>
                                                <th>Estado</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                        </div>
                    </div>

                </section><!-- /.content -->
                
                 <!-- jQuery 2.0.2 -->
        
                
        