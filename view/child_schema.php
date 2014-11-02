<?php include '../controller/functions_schema.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>


<script type="text/javascript">
    $(function() {
        //Date range picker
       $('#fechaNace').datepicker({
            format: 'yyyy/mm/dd'
        });
        
        //("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
       /*         //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();*/
        
    });
</script>

           
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ver Esquema
                        <small>esquema de vacunación </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Admon</a></li>
                        <li class="active">Esquema</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Esquema Vacunas (Tiempo en meses)</h3> 
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                
                               
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Nombre Vacuna</th>
                                            <th>Dosis 1</th>
                                            <th>Dosis 2</th>
                                            <th>Dosis 3</th>
                                            <th>Dosis 4</th>
                                            <th>Dosis 5</th>
                                            <th>Refuerzo 1</th>
                                            <th>Refuerzo 2 </th>
                                            <th>Adicional 1 </th>
                                            <th>Adicional 2</th>
                                            <th>Tipo</th>
                                        </tr
                                        
                                         <?php getDataSchemaChild(); ?>                                        
                                        
                                        <!--<tr>
                                            <td>183</td>
                                            <td>John Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-success">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Jane Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-warning">Pending</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                            <td>657</td>
                                            <td>Bob Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-primary">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                            <td>175</td>
                                            <td>Mike Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="label label-danger">Denied</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>-->
                                    </table>
                               <!-- </div> /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
                
                 <!-- jQuery 2.0.2 -->
        
                
        