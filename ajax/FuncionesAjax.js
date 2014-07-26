function nuevoAjax()
{
	
	var xmlHttp;
	
	try {
		
		xmlHttp=new XMLHttpRequest();
		return xmlHttp;
		} catch (e) {
		
		try {
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			return xmlHttp;
			} catch (e) {
			
			try {
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				return xmlHttp;
				} catch (e) {
				alert("Tu navegador no soporta AJAX!");
				return false;
			}}}
}

function Enviar(_pagina,capa,envio) {
    var ajax;
    ajax = nuevoAjax();
    ajax.open("POST", _pagina, true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
    ajax.onreadystatechange = function() {
		if (ajax.readyState==1){
			document.getElementById(capa).innerHTML = " Aguarde por favor...";
		}
		if (ajax.readyState == 4) {
			
			var  respuesta = ajax.responseText;
			document.getElementById(capa).innerHTML= respuesta;
			
			
		}}
		
		ajax.send(""+envio);
} 

function parseScript(strcode) {
	
	var scripts = new Array();         // Array which will store the script's code
	
	var scriptCode = '';
	
	// Strip out tags
	while(strcode.indexOf("<script") > -1 || strcode.indexOf("</script") > -1) {
		var s = strcode.indexOf("<script");
		var s_e = strcode.indexOf(">", s);
		var e = strcode.indexOf("</script", s);
		var e_e = strcode.indexOf(">", e);
		
		
		
		scriptCode = strcode.substring(s_e+1, e)
		// Add to scripts array
		scripts.push(scriptCode);
		//alert(strcode.substring(s_e+1, e))
		// Strip from strcode
		strcode = strcode.substring(0, s) + strcode.substring(e_e+1);
		
		
	}
	
	//alert(scripts[]);
	//alert(scriptCode);
	
	var aqui = location.href;
	
	try {
		//alert(aqui);
		//eval("<script type=\"text/javascript\" src=\\"></script>");
		include("view/calendar.js")
	}
	catch(ex) {
		// do what you want here when a script fails
	}
	
	
	// Loop through every script collected and eval it
	//for(var i=0; i<scripts.length; i++) {
	
//}
}



function include(file_path){
	var j = document.createElement("script");
	j.type = "text/javascript";
	j.src = file_path;
	document.body.appendChild(j);
}

function include_once(file_path){
	var sc = document.getElementsByTagName("script");
	for (var x in sc)
		if (sc[x].src != null && sc[x].src.indexOf(file_path) != -1) return;
	include(file_path);
}

/****************FUNCIONES PARA CARGAR PLANTILLAS. LA FORMA SIEMPRE ES POST*********/

function cargarMapas(form)
{
	var contenedor, forma, direccion, envio, contador;
	
	contenedor = 'contenedor';
	//mimodulo = document.getElementById('modulo').value;
	
	direccion  = 'view/maps.php';
	
	envio='';
	
	Enviar(direccion,contenedor,envio);
	
}


/**
	*Esta funcion me permite cargar la plantilla 
*/

function cargarCalendario(form)
{
	var contenedor, forma, direccion, envio, contador;
	
	contenedor = 'contenedor';
	//mimodulo = document.getElementById('modulo').value;
	
	direccion  = 'view/calendar.php';
	
	envio='';
	
	Enviar(direccion,contenedor,envio);
	include_once("view/calendar.js")
}

function cargarReporte1(form)
{
	var contenedor, forma, direccion, envio, contador;
	
	contenedor = 'contenedor';
	//mimodulo = document.getElementById('modulo').value;
	
	direccion  = 'view/reporte1.php';
	
	envio='';
	
	Enviar(direccion,contenedor,envio);
	include_once("view/reporte1.js")
	
}

function cargarMapaIndividual(codMapa)
{
	var contenedor, forma, direccion, envio, contador;
	
	contenedor = 'contenedor';
	//mimodulo = document.getElementById('modulo').value;
	
	direccion  = 'view/cargarMapa.php';
	
	envio='codMapa='+codMapa;
	
	Enviar(direccion,contenedor,envio);
	
	include_once("view/cargarMapa.js");
	
	
}


