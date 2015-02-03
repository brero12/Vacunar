<?php include '../controller/functions_child.php'; ?>

<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
    
     var oTable;
        var asInitVals = new Array();

        $(document).ready(function() {
            oTable = $('#tbl_ninos').dataTable({
                "oLanguage": {
                    "sSearch": "Search all columns:"
                },
                "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false,
            "iDisplayLength": 30
            });

            $("tfoot input").keyup(function() {
                /* Filter on the column (the index) of this element */
                oTable.fnFilter(this.value, $("tfoot input").index(this));
            });



            /*
             * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
             * the footer
             */
            $("tfoot input").each(function(i) {
                asInitVals[i] = this.value;
            });

            $("tfoot input").focus(function() {
                if (this.className == "search_init")
                {
                    this.className = "";
                    this.value = "";
                }
            });

            $("tfoot input").blur(function(i) {
                if (this.value == "")
                {
                    this.className = "search_init";
                    this.value = asInitVals[$("tfoot input").index(this)];
                }
            });
            
            $("#searchbox").keyup(function() {
            oTable.fnFilter(this.value);
        });

        document.getElementById("tbl_ninos_filter").style.display = "none";
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
                                <table border="0" width="70%" cellpadding="0" cellspacing="0" id="example">
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
                                <th>Apellido(s)</th>
                                <th>Nombre(s)</th>
                                <th>Edad (meses)</th>
                                <th>Reg.Afiliaci&oacute;n</th>
                                <th>Aseguradora</th>
                                <th>Estado</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php getDataChild(); ?>                                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><input type="text" name="search_engine" value="Search engines" class="search_init"></th>
                                <th><input type="text" name="search_browser" value="Search browsers" class="search_init"></th>
                                <th><input type="text" name="search_platform" value="Search platforms" class="search_init"></th>
                                <th><input type="text" name="search_version" value="Search versions" class="search_init"></th>
                                <th><input type="text" name="search_grade" value="Search grades" class="search_init"></th>
                                <th><input type="text" name="search_aseguradora" value="Search aseguradora" class="search_init"></th>
                                <th><input type="text" name="search_aseguradora" value="Search aseguradora" class="search_init"></th>
                                <th><input type="text" name="search_aseguradora" value="Search aseguradora" class="search_init"></th>
                                <th><input type="text" name="search_aseguradora" value="Search aseguradora" class="search_init"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <script>

       
    </script>

</section><!-- /.content -->
