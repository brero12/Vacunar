<?php include '../controller/functions_schema.php'; ?>
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
                        <small>esquema de vacunaci&oacute;n </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
                        <li><a href="#">Administraci&oacute;n</a></li>
                        <li class="active">Registrar ni&ntilde;o</li>
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
                                        
                                    </table>
                               <!-- </div> /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
                
                 <!-- jQuery 2.0.2 -->
        
                
        