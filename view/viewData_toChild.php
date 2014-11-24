<?php include '../controller/functions_child.php'; ?>

<script type="text/javascript">
    $(function() {
        //Date range picker
        $('#fechaNace').datetimepicker({
            format: 'YYYY-MM-DD',
            pickTime: false
        });
        
        $('#fechaNaceMadre').datetimepicker({
            format: 'YYYY-MM-DD',
            pickTime: false
        });
        
    });
</script>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Informaci&oacute;n de Ni&ntilde;os
        <small>Registro</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Principal </a></li>
        <li><a href="#">Administraci&oacute;n</a></li>
        <li class="active">Registro</li>
    </ol>
</section>

<!-- Main content -->
<?php getDataToChild($_POST['idChild'],$_POST['type']); ?>
