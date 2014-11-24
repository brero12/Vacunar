//############################################## UTILIDADES ##############################################
var etiqueta_puntos = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","aa","bb","cc","dd","ee","ff","gg","hh","ii","jj","kk","ll","mm","nn","oo","pp","qq","rr","ss","tt","uu","vv","ww","xx","yy"];

function cargarURL(contenedor, ajaxurl, datos) {
    $(contenedor).fadeOut(50, function () {
            // Completa el efecto fadeout, carga el nuevo contenido mientras se oculta
            $(contenedor).html('<img src="img/loader.gif" > cargando... </img>');
            $.ajax ( {
                type: 'post',
                url : ajaxurl,
                data : datos,
                success : function(htm) {
                    $(contenedor).html(htm);
                    $(contenedor).fadeIn();
                }
            });
        });
}

function retornoPrincipal(ajaxurl){
    event.preventDefault();
    cargarURL("#contenedor_principal", ajaxurl, "");
}

function abrirVentana (verb, url, data, target) {
    var form = document.createElement("form");
    form.action = url;
    form.method = verb;
    form.target = target || "_self";
    if (data) {
        for (var key in data) {
            var input = document.createElement("textarea");
            input.name = key;
            input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key]; //Se convierte los datos en formato JSON
            form.appendChild(input);
        }
    }
    
    form.style.display = 'none';
    document.body.appendChild(form);
    form.submit();
};

function marcarCheckBox(id_componente){
    var class_actual = document.getElementById(id_componente+"-check").className;
    
    if(class_actual === "icheckbox_minimal"){
        document.getElementById(id_componente+"-check").className = "icheckbox_minimal checked";
    } else {
        document.getElementById(id_componente+"-check").className = "icheckbox_minimal";
    }
}

function buscarUbicaciones() {
	document.getElementById("tdError").style.visibility = "hidden";
	var address = document.getElementById("addressInput").value + ", Buenaventura - Valle del cauca, Colombia";
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({address: address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			//buscarUbicacionesCercanas(results[0].geometry.location, address);
            var cebt = results[0].geometry.location;
            //alert(cebt.lat() + " * " + cebt.lng());
		} 
		else {
			document.getElementById("tdError").style.visibility = "visible";
			document.getElementById("tdError").innerHTML = "<p class='fuente_error'>No se pudo encontrar la direcci&oacute;n en la base de datos. Intente de nuevo por favor siendo m&aacute;s espec&iacute;fico</p>";
		}
	});
}

function getEtiquetaPunto(posX, posY){
    var posTemp = "", etiqTemp = "";
    
    for(var i=1; i<=50; i++){
        if(posX >= ((i-1)/50) && posX <= (i/50) ){
            posTemp = i;
            break;
        }
    }
    
    //Hay 51 etiquetas, debido que empieza en la letra "a" y termina en "yy"
    for(var j=0; j<=50; j++){
        if(posY >= (j/51) && posY < ((j+1)/51) ){
            etiqTemp = j;
            break;
        }
    }
    
    return (etiqueta_puntos[etiqTemp]+posTemp);
}


function getPuntoEtiqueta(etiquetaPunto){
    var etiqueta = etiquetaPunto.split("");
    
    var letraEtiqueta  = "";
    var numeroEtiqueta = "";
    for(var i=0; i<etiqueta.length; i++){
        if($.isNumeric(etiqueta[i])){
            numeroEtiqueta += etiqueta[i];
        }else if (isLetter(etiqueta[i])){
            letraEtiqueta += etiqueta[i];
        }
    }
    
    var pos_X = (parseInt(numeroEtiqueta)/50);
    var pos_Y = (jQuery.inArray( letraEtiqueta, etiqueta_puntos ))/51;
    
    return new Array(pos_X,pos_Y);
}

function isLetter(s){
    return s.match("^[a-zA-Z\(\)]+$");    
}
//############################################## DASHBOARD ##############################################

function cargarDashBoard(){
    var ajaxurl  = 'view/dashboard.php';
    var data_form = {};
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

//############################################## MAPAS ##############################################
function cargarMapas(cargarMapaRegistro){
    var ajaxurl  = 'view/mapas/maps.php';
    var data_form = {
        cargarMapaRegistro: cargarMapaRegistro
    };
    cargarURL("#contenedor_principal", ajaxurl, data_form);
    
}

function cargarMapaIndividual(codMapa){
    var cargarMapaRegistro = document.getElementById('cargarMapaRegistro').value;
	var ajaxurl  = (cargarMapaRegistro == 0)?"view/mapas/cargarMapa.php":"view/mapas/cargarMapaRegistro.php";
    
	var data_form= {
        codMapa : codMapa
    };
	
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

function cargarInfoSelectedChild(idPersona, etiquetaPunto){
	var ajaxurl  = "view/mapas/cargarMapaInfoChild.php";
    
	var data_form= {
        idPersona     : idPersona,
        etiquetaPunto : etiquetaPunto
    };
	
    cargarURL("#contenedor_aux_1", ajaxurl, data_form);
}

function addChild(){
    var ajaxurl  = 'view/add_child.php';
    var data_form = {};
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

function viewDataChild( data_label){
    var ajaxurl  = 'view/view_data_child.php';
    var data_form = { label : data_label};
    cargarURL("#contenedor_aux_1", ajaxurl, data_form);
    
}

function addChildMap(nombre_mapa, etiqueta_punto){
    var ajaxurl  = 'view/add_child.php';
    var data_form = {
        codMapa : nombre_mapa,
        etiquetaPunto : etiqueta_punto
    };
    
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

function addSchema(){
    var ajaxurl  = 'view/add_schema.php';
    var data_form = {};
    cargarURL("#contenedor_principal", ajaxurl, data_form);
    
}

function viewChild(){
    var ajaxurl  = 'view/view_child.php';
    var data_form = {};
    cargarURL("#contenedor_principal", ajaxurl, data_form);
    
}

function saveChild(){
    var ajaxurl  = 'controller/save_child.php';
    
    
        var primerNombre = document.getElementById('primerNombre');
        var segundoNombre = document.getElementById('segundoNombre');
        var primerApellido = document.getElementById('primerApellido');
        var segundoApellido = document.getElementById('segundoApellido');
        var fechaNace = document.getElementById('fechaNace');
        var tipoId = document.getElementById('tipoId');
        var numIdetificacion = document.getElementById('numIdetificacion');
        var regimen = document.getElementById('regimen');
        var aseguradora = document.getElementById('aseguradora');
        var lugar_parto = document.getElementById('lugar_parto');
        var departNace = document.getElementById('departNace');
        var ciudadNace = document.getElementById('ciudadNace');
        var registraVacunacion = document.getElementById('registraVacunacion');
        var primerNombreMadre = document.getElementById('primerNombreMadre');
        var segundoNombreMadre = document.getElementById('segundoNombreMadre');
        var primerApellidoMadre = document.getElementById('primerApellidoMadre');
        var segundoApellidoMadre = document.getElementById('segundoApellidoMadre');
        var fechaNaceMadre = document.getElementById('fechaNaceMadre');
        var tipoDocMadre = document.getElementById('tipoDocMadre');
        var numIdetificacionMadre = document.getElementById('numIdetificacionMadre');
        var telefonoMadre = document.getElementById('telefonoMadre');
        var celularMadre = document.getElementById('celularMadre');
        var correoMadre = document.getElementById('correoMadre');
        var id_mapa = document.getElementById('id_mapa');
        var etiqueta_punto = document.getElementById('etiqueta_punto');
        
        if(!requerido('primerNombre')){return false;}
        if(!requerido('primerApellido')){return false;}
        if(!requerido('fechaNace')){return false;}
        if(!requerido('tipoId')){return false;}
        if(!requerido('numIdetificacion')){return false;}
        
    
        if(!requerido('primerNombreMadre')){return false;}
        if(!requerido('primerApellidoMadre')){return false;}
        if(!requerido('fechaNaceMadre')){return false;}
        if(!requerido('tipoDocMadre')){return false;}
        if(!requerido('numIdetificacionMadre')){return false;}
        
        
            
    var data_form = {
        primerNombre : primerNombre.value
        , segundoNombre : segundoNombre.value
        , primerApellido : primerApellido.value
        , segundoApellido : segundoApellido.value
        , fechaNace : fechaNace.value
        , tipoId : tipoId.value
        , numIdetificacion : numIdetificacion.value
        , regimen : regimen.value
        , aseguradora : aseguradora.value
        , lugar_parto : lugar_parto.value
        , departNace : departNace.value
        , ciudadNace : ciudadNace.value
        , registraVacunacion : registraVacunacion.value
        , primerNombreMadre : primerNombreMadre.value
        , segundoNombreMadre : segundoNombreMadre.value
        , primerApellidoMadre : primerApellidoMadre.value
        , segundoApellidoMadre : segundoApellidoMadre.value
        , fechaNaceMadre : fechaNaceMadre.value
        , tipoDocMadre : tipoDocMadre.value
        , numIdetificacionMadre : numIdetificacionMadre.value
        , telefonoMadre : telefonoMadre.value
        , celularMadre : celularMadre.value
        , correoMadre : correoMadre.value
        , codMapa : id_mapa.value
        , etiquetaPunto : etiqueta_punto.value
    };
	
	//alert(document.getElementById('registraVacunacion').value);
    cargarURL("#contenedor_principal", ajaxurl, data_form);
    
}

function requerido(campo){    
    
    var validado = document.getElementById(campo).value;
    var respuesta = document.getElementById('v_'+campo);
    
    //alert("campo :"+campo);    
    if(validado == '' || validado == 0)
    {
        //alert("Nombre no debe estar vacio");    
        //document.getElementById(campo).focus();
        respuesta.innerHTML = "Campo no puede estar vacio";
        respuesta.style.background = "red";
        respuesta.style.color = "white";
        return false;
    }else
    {
        respuesta.innerHTML = "";
        respuesta.style.background = "white";
        return true;
    }
}


function editChild(idChild)
{
    var ajaxurl  = 'view/edit_child.php';
    var data_form = {
        idChild : idChild
        , type : 1
    };
    
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

function viewDataToChild(idChild)
{
    var ajaxurl  = 'view/edit_child.php';
    var data_form = {
        idChild : idChild
        , type : 2
    };
    
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

function cargarCiudadDepartamento(){
	var ajaxurl  = 'controller/getCiudadDepartamento.php';
        
        var id_departamento = document.getElementById('departNace').value;
        
	var data_form= {
        id_departamento : id_departamento
    };
	
    cargarURL("#ciudadNace", ajaxurl, data_form);
}


function saveChildSchema(){
    var tbl_esquema = document.getElementById("tbl_esquema");
    var total_filas = tbl_esquema.rows.length;

    var listVaccines = [];
    
    //Se inicia el indice en 1 debido a que la primera fila (0) contiene el encabezado de la tabla y este no tiene informacion necesaria
    for(var i = 1; i< total_filas; i++){
        var x = tbl_esquema.rows[i].cells;
        var selectedVaccine = [x[0].innerHTML, x[1].innerHTML, x[4].innerHTML];
        
        listVaccines.push(selectedVaccine);
    }
    

    var ajaxurl  = 'controller/save_schema.php';
            
    var idChild = document.getElementById("idChild").value;
    
	var data_form= {
        listVaccines : JSON.stringify(listVaccines), //codifica el arreglo en formato JSON para mejor lectura en archivo PHP
        idChild : idChild
    };
	
    cargarURL("#saveSchema", ajaxurl, data_form);
    
}


//############################################## EMPRESAS ##############################################
function verEmpresa(id_empresa, ajaxurl){

    var data_form;
    
    if(id_empresa !== "0"){
        data_form = {
            id_empresa          : id_empresa,
            codigo_base         : document.getElementById('codigo_base'+id_empresa).innerHTML,
            nit_empresa         : document.getElementById('nit_empresa'+id_empresa).innerHTML,
            nombre_empresa      : document.getElementById('nombre_empresa'+id_empresa).innerHTML,
            id_ubicacion        : document.getElementById('id_ubicacion'+id_empresa).innerHTML,
            direccion_ubicacion : document.getElementById('direccion_ubicacion'+id_empresa).innerHTML,
            id_ciudad           : document.getElementById('id_ciudad'+id_empresa).innerHTML,
            nombre_ciudad       : document.getElementById('nombre_ciudad'+id_empresa).innerHTML,
            id_departamento     : document.getElementById('id_departamento'+id_empresa).innerHTML,
            nombre_departamento : document.getElementById('nombre_departamento'+id_empresa).innerHTML
        };
    }
    else{
        data_form = {
            id_empresa          : id_empresa,
            agregar             : 'FALSE'
        };
    }
    
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

//############################################## REPORTES ##############################################
function cargarReporte(nombreReporte){
    event.preventDefault();
    
    var rangoFecha          = (document.getElementById('reservation').value).split(" - ");
    var nit_establecimiento = document.getElementById('id_establecimiento').value;
    var nombre_empresa      = document.getElementById('0nombre_empresa_usuario').value;
    var nit_empresa         = document.getElementById('0nit_empresa_usuario').value;

    if(rangoFecha.length > 0 && rangoFecha != "" && nit_establecimiento != null && nit_establecimiento.length > 0 ) {
        abrirVentana('POST', '../reports/index.php', {nombre_reporte: nombreReporte, formato:"pdf", fecha_reg1:rangoFecha[0], fecha_reg2:rangoFecha[1], nit_establecimiento: nit_establecimiento}, '_blank');
    }
    else{
        alert("Debes completar todos los parámetros solicitados.");
    }

    
}