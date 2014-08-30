

           
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
                                          <label for="nombres">Nombre(s)</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="nombres" placeholder="Ingrese Nombre(s)">
                                        </div>
                                      <br>
                                        <div class="input-group">
                                          <label for="apellidos">Apellido(s)</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="apellidos" placeholder="Ingrese Apellido(s)">
                                        </div>
                                      
                                      <br>
                                         <div class="form-group">
                                        
                                        <div class="input-group">
                                            <label>Fecha de Nacimiento:</label>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="datetime" class="form-control" id="fechaNace" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                      
                                      
                                        <div class="input-group">
                                          <label for="edad">Edad </label>
                                          <span class="input-group-addon">A&ntilde;os</span>
                                          <input type="text" class="form-control" id="edad">                                          
                                       </div>
                                   <br> 
   
                                <br>
                                    
                                <div class="input-group"> 
                                    <label for="edad">Tipo de Identificaci&oacute;n </label>
                                             <select class="form-control" id="tipoId">
                                                <option>Certificado de nacido vivo</option>
                                                <option>Registro civil</option>
                                                <option>Tarjeta de identidad</option>                                                
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
                                                <option>Clínica Confamar</option>
                                                <option>Clinica Santa sofia</option>
                                                <option>Hospital luis ablaque</option>                                                
                                            </select>   
                                        </div>
                                
                                
                               <br>        
                                    <div class="input-group">
                                        <label for="departNace">Departamento de Nacimiento</label>
                                          <!--<span class="input-group-addon"><i class="fa fa-check"></i></span>-->
                                          <select class="form-control" id="departNace">
                                                <option>Valle Del Cauca</option>
                                                <option>Cauca</option>
                                                <option>Cundinamarca</option>                                                
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
                                                 Esquema de Vacunaci&oacute;n al d&iacute;a 
                                            </label>
                                            <input type="checkbox" id="vacunaAldia">
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
                                          <label for="nombresMadre">Nombre(s)</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="nombresMadre" placeholder="Ingrese Nombre(s)">
                                        </div>
                                      <br>
                                        <div class="input-group">
                                          <label for="apellidosMadre">Apellido(s)</label>
                                          <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                            <input type="text" class="form-control" id="apellidosMadre" placeholder="Ingrese Apellido(s)">
                                        </div>
                                      
                                      <br>
                                       <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <label>Fecha de Nacimiento:</label>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="datetime" class="form-control" id="fechaNaceMadre" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                      
                                      
                                        <div class="input-group">
                                          <label for="edadMadre">Edad </label>
                                          <span class="input-group-addon">A&ntilde;os</span>
                                          <input type="text" class="form-control" id="edadMadre">                                          
                                       </div>
                                   <br>                                                                          
                                <div class="input-group"> 
                                    <label for="tipoDocMadre">Tipo de Documento </label>
                                    <select class="form-control" id="tipoDocMadre">
                                                <option>Cedula</option>
                                                <option>Cedula Extranjeria</option>
                                                <option>Otros</option>                                                
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
        
                
        