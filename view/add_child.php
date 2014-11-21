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
<section class="content">
    <form role="form">
        <div class="row">
        <!-- left column -->
      <div class="col-md-6">
            <!-- general form elements -->
        <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Datos del ni&ntilde;o  </h3>
                    <input id="cargarMapaRegistro" type="hidden" value="1" />
                    <input id="id_mapa" type="hidden" value="<?php echo getIdMapa($_POST['codMapa']); ?>" />
                    <input id="etiqueta_punto" type="hidden" value="<?php echo $_POST['etiquetaPunto'] ?>" />
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12"> 
                                        <label for="primerNombre" >Primer Nombre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="primerNombre" placeholder="Ingrese Primer Nombre" onblur="requerido('primerNombre')" />
                                        <div id="v_primerNombre" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12"> 
                                        <label for="segundoNombre">Segundo Nombre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoNombre" placeholder="Ingrese Segundo Nombre" />
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="primerApellido">Primer Apellido</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="primerApellido" placeholder="Ingrese Primer Apellido" onblur="requerido('primerApellido')" />
                                        <div id="v_primerApellido" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="segundoApellido">Segundo Apellido</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoApellido" placeholder="Ingrese Segundo Apellido">
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Fecha de Nacimiento: (Formato AAAA-MM-DD)</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" class="form-control" id="fechaNace" onblur="requerido('fechaNace')" />
                                        <div id="v_fechaNace" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="edad">Tipo de Identificaci&oacute;n </label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="tipoId" onchange="requerido('tipoId')">
                                            <?php getTipoIdentificacion(1); ?>                                                  
                                        </select>
                                        
                                        <div id="v_tipoId" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="numIdetificacion">N&uacute;mero de Identificaci&oacute;n</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="numIdetificacion" placeholder="Ingrese Identificacion" onblur="requerido('numIdetificacion')" />
                                        <div id="v_numIdetificacion" style="text-align: center"></div>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="regimen">R&eacute;gimen de aseguramiento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="regimen">
                                            <option>Contributivo</option>
                                            <option>No Contributivo</option>
                                            <option>Otros</option>                                                
                                        </select>   
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="aseguradora">Aseguradora</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="aseguradora">
                                            <option>Comfenalco</option>
                                            <option>Comfandi</option>
                                            <option>Otros</option>                                                
                                        </select> 
                                    </div>
                                </div>
                            </div>
                      </div>   
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="lugar_parto">Lugar de Atención del Parto</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="lugar_parto">
                                            <?php getEntidadesSalud(); ?>                                                 
                                        </select>  
                                    </div>
                                </div>
                            </div>
                      </div> 
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="departNace">Departamento de Nacimiento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="departNace" onchange="cargarCiudadDepartamento()">
                                             <?php getDepartamentos(); ?>                                                        
                                        </select>    
                                    </div>
                                </div>
                            </div>
                      </div>   
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="ciudadNace">Ciudad de Nacimiento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon" ><i class="fa fa-caret-square-o-down"></i></span>
                                        <select class="form-control" id="ciudadNace">
                                            <option>Buenaventura</option>
                                            <option>Cali</option>
                                            <option>Bogota</option>                                                
                                        </select>     
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <div class="input-group">
                                        <label>Registrar esquema de Vacunaci&oacute;n </label>
                                        <input type="checkbox" id="registraVacunacion" />    
                                    </div>
                                </div>
                            </div>
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
                    <div class="form-group">
                      <div class="row">
                            <div class="col-xs-12">    
                                <label for="primerNombreMadre">Primer Nombre Madre</label>
                            </div>
                            <div class="col-xs-12"> 
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input type="text" class="form-control" id="primerNombreMadre" placeholder="Ingrese Primer Nombre" onblur="requerido('primerNombreMadre')" />
                                        <div id="v_primerNombreMadre" style="text-align: center"></div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="segundoNombreMadre">Segundo Nombre Madre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoNombreMadre" placeholder="Ingrese Segundo Nombre">
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="primerApellidoMadre">Primer Apellido Madre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="primerApellidoMadre" placeholder="Ingrese Primer Apellido" onblur="requerido('primerApellidoMadre')" />
                                        <div id="v_primerApellidoMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="segundoApellidoMadre">Segundo Apellido Madre</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="segundoApellidoMadre" placeholder="Ingrese Segundo Apellido">
                                    </div>
                                </div>
                            </div>
                      </div>

                       <!-- Date dd/mm/yyyy -->
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Fecha de Nacimiento:</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" class="form-control"  id="fechaNaceMadre" onblur="requerido('fechaNaceMadre')" />
                                        <div id="v_fechaNaceMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="tipoDocMadre">Tipo de Documento </label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></div>
                                        <select class="form-control" id="tipoDocMadre" onchange="requerido('tipoDocMadre')">
                                            <?php getTipoIdentificacion(2); ?>                                                   
                                        </select> 
                                        <div id="v_tipoDocMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for="numIdetificacionMadre">N&uacute;mero de Documento</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                        <input type="text" class="form-control" id="numIdetificacionMadre" placeholder="Ingrese Identificacion" onblur="requerido('numIdetificacionMadre')" />
                                        <div id="v_numIdetificacionMadre" style="text-align: center"></div>  
                                    </div>
                                </div>
                            </div>
                      </div>

                  <!-- phone mask -->
                    <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Tel&eacute;fono</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask id="telefonoMadre" 
                                    </div>
                                </div>
                            </div>
                      </div>


                    <!-- phone mask -->
                    <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label>Celular</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask id="celularMadre"/>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                                <div class="col-xs-12">    
                                    <label for='correoMadre'>Correo</label>
                                </div>
                                <div class="col-xs-12"> 
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                        <input type="text" class="form-control" placeholder="E-mail" id="correoMadre">
                                    </div>
                                </div>
                            </div>
                      </div>
                  </div><!-- /.box-body -->

                    <div class="box-footer" align="center">
                        <button type="button" class="btn btn-primary" onclick="Javascript:saveChild();">Guardar</button>
                        <button type="button" class="btn btn-danger" onclick="JavaScript:cargarMapaIndividual('<?php echo $_POST['codMapa'] ?>')">Cancelar</button>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->  


    </form>


</section><!-- /.content -->
