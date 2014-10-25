<?php include '../controller/functions_child.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>


<script type="text/javascript">
    $(function() {
        //Date range picker
       $('#fechaNace').datepicker({
            format: 'mm/dd/yyyy'
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
                        Informaci&oacute;n de Ni&ntilde;os
                        <small>Registro</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Administracion</a></li>
                        <li class="active">Registro</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <form role="form">
                        <div class="row">
                        <!-- left column -->
                      <div class="col-md-6">
                            <!-- general form elements -->
                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Datos del niño</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                
                                  <div class="box-body">
                                    <div class="input-group">
                                          <label for="primerNombre">Primer Nombre</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="primerNombre" placeholder="Ingrese Primer Nombre">
                                        </div>
                                      <br>
                                      <div class="input-group">
                                          <label for="segundoNombre">Segundo Nombre</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="segundoNombre" placeholder="Ingrese Segundo Nombre">
                                        </div>
                                      <br>
                                        <div class="input-group">
                                          <label for="primerApellido">Primer Apellido</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="primerApellido" placeholder="Ingrese Primer Apellido">
                                        </div>                                      
                                      <br>
                                       <div class="input-group">
                                          <label for="segundoApellido">Segundo Apellido</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="segundoApellido" placeholder="Ingrese Segundo Apellido">
                                        </div>                                      
                                      <br>
                                         <div class="form-group">
                                        
                                        <div class="input-group">
                                            <label>Fecha de Nacimiento:</label>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="fechaNace" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                                                                                                   
   
                                <br>
                                    
                                <div class="input-group"> 
                                    <label for="edad">Tipo de Identificaci&oacute;n </label>
                                             <select class="form-control" id="tipoId">
                                                <?php getTipoIdentificacion(1); ?>                                                  
                                            </select>                                       
                                        </div>
                                
                                
                                <br>
                                        <div class="input-group">
                                            <label for="numIdetificacion">N&uacute;mero de Identificaci&oacute;n</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="numIdetificacion" placeholder="Ingrese Identificacion">
                                        </div>
                                <br>        
                                    <div class="input-group">
                                        <label for="regimen">R&eacute;gimen de aseguramiento</label>
                                          <!--<span class="input-group-addon"><i class="fa fa-check"></i></span>-->
                                          <select class="form-control" id="regimen">
                                                <option>Contributivo</option>
                                                <option>No Contributivo</option>
                                                <option>Otros</option>                                                
                                            </select>   
                                        </div>
                                
                                
                                <br>        
                                    <div class="input-group">
                                        <label for="aseguradora">Aseguradora</label>
                                          <!--<span class="input-group-addon"><i class="fa fa-check"></i></span>-->
                                          <select class="form-control" id="aseguradora">
                                                <option>Comfenalco</option>
                                                <option>Comfandi</option>
                                                <option>Otros</option>                                                
                                            </select>   
                                        </div>
                                
                                <br>        
                                    <div class="input-group">
                                        <label for="lugar_parto">Lugar de Atención del Parto</label>
                                          <!--<span class="input-group-addon"><i class="fa fa-check"></i></span>-->
                                          <select class="form-control" id="lugar_parto">
                                                <?php getEntidadesSalud(); ?>                                                 
                                            <!--  --></select>  
                                        </div>
                                
                                
                               <br>        
                                    <div class="input-group">
                                        <label for="departNace">Departamento de Nacimiento</label>
                                          <!--<span class="input-group-addon"><i class="fa fa-check"></i></span>-->
                                        <select class="form-control" id="departNace" onchange="cargarCiudadDepartamento()">
                                                 <?php getDepartamentos(); ?>                                                        
                                            </select>   
                                        </div>
                               
                               <br>        
                                    <div class="input-group">
                                        <label for="ciudadNace">Ciudad de Nacimiento</label>
                                          <!--<span class="input-group-addon"><i class="fa fa-check"></i></span>-->
                                          <select class="form-control" id="ciudadNace">
                                                <option>Buenaventura</option>
                                                <option>Cali</option>
                                                <option>Bogota</option>                                                
                                            </select>   
                                        </div>
                                <br>
                                <div class="input-group">
                                            <label>
                                                 Registrar esquema de Vacunaci&oacute;n 
                                            </label>
                                            <input type="checkbox" id="registraVacunacion">
                                        </div>
                                  </div><!-- /.box-body -->

                                    <!--<div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>-->
                               
                          </div><!-- /.box -->

                          <!-- Form Element sizes --><!-- /.box --><!-- /.box -->

                          <!-- Input addon --><!-- /.box -->

                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Datos de la Madre</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                   
                                  <div class="box-body">
                                   <div class="input-group">
                                          <label for="primerNombreMadre">Primer Nombre Madre</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="primerNombreMadre" placeholder="Ingrese Primer Nombre">
                                        </div>
                                      <br>
                                      <div class="input-group">
                                          <label for="segundoNombreMadre">Segundo Nombre Madre</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="segundoNombreMadre" placeholder="Ingrese Segundo Nombre">
                                        </div>
                                      <br>
                                        <div class="input-group">
                                          <label for="primerApellidoMadre">Primer Apellido Madre</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="primerApellidoMadre" placeholder="Ingrese Primer Apellido">
                                        </div>                                      
                                      <br>
                                       <div class="input-group">
                                          <label for="segundoApellidoMadre">Segundo Apellido Madre</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="segundoApellidoMadre" placeholder="Ingrese Segundo Apellido">
                                        </div>                                      
                                      <br>
                                       <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <label>Fecha de Nacimiento:</label>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text"  id="fechaNaceMadre" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                                                                                    
                                <div class="input-group"> 
                                    <label for="tipoDocMadre">Tipo de Documento </label>
                                    <select class="form-control" id="tipoDocMadre">
                                                <?php getTipoIdentificacion(2); ?>                                                   
                                            </select>                                       
                                        </div>
                                
                                
                                <br>
                                        <div class="input-group">
                                            <label for="numIdetificacionMadre">N&uacute;mero de Documento</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="numIdetificacionMadre" placeholder="Ingrese Identificacion">
                                        </div>
                                <br>
                                  <!-- phone mask -->
                                    <div class="form-group">                                        
                                        <div class="input-group">
                                            <label>Telefono</label>
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask id="telefonoMadre"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                      <!-- phone mask -->
                                    <div class="form-group">
                                       
                                        <div class="input-group">
                                            <label>Celular</label>
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask id="celularMadre"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                      <br/>
                                     <div class="input-group">
                                         <label for='correoMadre'>Correo</label>
                                        <span class="input-group-addon">@</span>
                                        <input type="text" class="form-control" placeholder="Username" id="correoMadre">
                                    </div>
                                    <br/>
                                
                                  </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="button" class="btn btn-primary" onclick="Javascript:saveChild();">Guardar</button>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->  
                        
                        
                    </form>
                                                                
                   
                </section><!-- /.content -->
                
                 <!-- jQuery 2.0.2 -->
        
                
        