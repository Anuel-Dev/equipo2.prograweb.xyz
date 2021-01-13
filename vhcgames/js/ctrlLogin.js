sessionStorage.setItem("nTipoUsuario","0");
function llamaLogin(sCve, sPwd){
var request = new XMLHttpRequest();
var url = "ctrlPhp/ctrlLogin.php";
var sQueryString="";
	if (sCve=="" || sPwd==""){
		alert("Faltan datos para el ingreso");
	}else{
		sQueryString="txtId="+sCve+"&txtPwd="+sPwd;
		request.onreadystatechange=function() {
			if (request.readyState === 4 && 
				request.status === 200) {
				procesaLogin(request.responseText);
			}else{
				if (request.status != 200 &&request.status != 0)
					alert("Hubo error, status "+ request.status);
			}
		};
		request.open("POST", url, true);
		request.setRequestHeader("Content-type", 
		"application/x-www-form-urlencoded");
		request.send(sQueryString);
	}
}

//********************************************************************************
function procesaLogin(textoRespuesta){
var oNodoFrm = document.getElementById("frmLogin");
var oNodoDiv = document.getElementById("welcome");
var oNodoNombre = document.getElementById("paraNombre");  
var oLigaInicio = document.getElementById("menuInicio"); 
var oLigaMuebles = document.getElementById("menuRegistro"); 
var oLigaSalir = document.getElementById("menuMuebles"); 
var oDatos;
var sError = "";
	
	try{
		oDatos = JSON.parse(textoRespuesta);
		if (oDatos != null){
			if (oNodoFrm == null || oNodoDiv == null ||
				oNodoNombre == null || oLigaInicio == null || oLigaSalir == null ||
				oLigaMuebles == null)
				sError = "Error en HTML";
			else{
				if (oDatos.sTipo == -1){
					sError=oDatos.nombre;
				}else{
					oNodoNombre.innerHTML=oDatos.nombre;
					//Cambio de menú strcmp($cadena1, $cadena2) == 0
					sessionStorage.setItem("nTipoUsuario",oDatos.sTipo);
					oLigaInicio.innerHTML="Inicio";
					oLigaInicio.href = "resulLogin.php";
					if(sessionStorage.getItem("nTipoUsuario")==2){
					oLigaMuebles.innerHTML = "Comprar";
					oLigaMuebles.href = "consultaMuebles.php";}
					else if(sessionStorage.getItem("nTipoUsuario")==1){
				   oLigaMuebles.innerHTML = "Editar";
					oLigaMuebles.href = "consultaMuebles.php";}
					
					oLigaSalir.innerHTML = "Salir";
					oLigaSalir.href = "ctrlPhp/ctrlLogout.php";
					oNodoFrm.style.display = "none";
					oNodoDiv.style.display = "block";
				}
			}
		}else{
			sError = "JSON no convertido"
		}
		console.log("Mensaje a consola");
	}catch(error){
		console.log(error.message);
		sError = "Error de conversiones";
	}
	if (sError != "")
		alert(sError);
}