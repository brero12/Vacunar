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
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar"/>
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
                                            <th>1ra Dosis</th>
                                            <th>2do Dosis</th>
                                            <th>3er Dosis</th>
                                            <th>4ta Dosis</th>
                                            <th>5ta Dosis</th>
                                            <th>1er Refuerzo</th>
                                            <th>2do Refuerzo</th>
                                            <th>1er Adicional</th>
                                            <th>2do Adicional</th>
                                            <th>Tipo</th>
                                        </tr
                                         <?php getDataSchema(); ?>
                                    </table>
                               <!-- </div> /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
                
                 <!-- jQuery 2.0.2 -->
        
                
        