//############################################## UTILIDADES ##############################################
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
            alert(cebt.lat() + " * " + cebt.lng());
		} 
		else {
			document.getElementById("tdError").style.visibility = "visible";
			document.getElementById("tdError").innerHTML = "<p class='fuente_error'>No se pudo encontrar la direcci&oacute;n en la base de datos. Intente de nuevo por favor siendo m&aacute;s espec&iacute;fico</p>";
		}
	});
}

//############################################## DASHBOARD ##############################################

function cargarDashBoard(){
    var ajaxurl  = 'view/dashboard.php';
    var data_form = {};
    cargarURL("#contenedor_principal", ajaxurl, data_form);
}

//############################################## MAPAS ##############################################
function cargarMapas(){
    var ajaxurl  = 'view/mapas/maps.php';
    var data_form = {};
    cargarURL("#contenedor_principal", ajaxurl, data_form);
    
}

function addChild(){
    var ajaxurl  = 'view/add_child.php';
    var data_form = {};
    cargarURL("#contenedor_principal", ajaxurl, data_form);
    
}

function saveChild(){
    var ajaxurl  = 'controller/save_child.php';
    var data_form = {
        primerNombre : document.getElementById('primerNombre').value
        , segundoNombre : document.getElementById('segundoNombre').value
        , primerApellido : document.getElementById('primerApellido').value
        , segundoApellido : document.getElementById('segundoApellido').value
        , fechaNace : document.getElementById('fechaNace').value
        , tipoId : document.getElementById('tipoId').value
        , numIdetificacion : document.getElementById('numIdetificacion').value
        , regimen : document.getElementById('regimen').value
        , aseguradora : document.getElementById('aseguradora').value
        , lugar_parto : document.getElementById('lugar_parto').value
        , departNace : document.getElementById('departNace').value
        , ciudadNace : document.getElementById('ciudadNace').value
        , vacunaAldia : document.getElementById('vacunaAldia').value
        , primerNombreMadre : document.getElementById('primerNombreMadre').value
        , segundoNombreMadre : document.getElementById('segundoNombreMadre').value
        , primerApellidoMadre : document.getElementById('primerApellidoMadre').value
        , segundoApellidoMadre : document.getElementById('segundoApellidoMadre').value
        , fechaNaceMadre : document.getElementById('fechaNaceMadre').value
        , tipoDocMadre : document.getElementById('tipoDocMadre').value
        , numIdetificacionMadre : document.getElementById('numIdetificacionMadre').value
        , telefonoMadre : document.getElementById('telefonoMadre').value
        , celularMadre : document.getElementById('celularMadre').value
        , correoMadre : document.getElementById('correoMadre').value
    };
    cargarURL("#contenedor_principal", ajaxurl, data_form);
    
}

function cargarMapaIndividual(codMapa){
	var ajaxurl  = 'view/mapas/cargarMapa.php';
	
	var data_form= {
        codMapa : codMapa
    };
	
    cargarURL("#contenedor_principal", ajaxurl, data_form);
	//include_once("view/cargarMapa.js");
}

function cargarCiudadDepartamento(){
	var ajaxurl  = 'controller/getCiudadDepartamento.php';
        
        var id_departamento = document.getElementById('departNace').value;
        
        //alert(id_departamento);
	
	var data_form= {
        id_departamento : id_departamento
    };
	
    cargarURL("#ciudadNace", ajaxurl, data_form);
	//include_once("view/cargarMapa.js");
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