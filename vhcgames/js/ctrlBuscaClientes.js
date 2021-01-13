function llamaBuscaClientes(){
var request = new XMLHttpRequest();
var url = "ctrlPhp/ctrlBuscaCliente.php";
var sQueryString="";
		request.onreadystatechange=function() {
			if (request.readyState === 4 && 
				request.status === 200) {
				procesaBuscaClientes(request.responseText);
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

//******************************************************************************
function procesaBuscaClientes(textoRespuesta){
var oNodoDiv = document.getElementById("resBuscaClientes");
var oNodoTbl = document.getElementById("tblClientes"); 
var oTblBody = document.getElementById("tblBodyClientes"); 
var oNodoTblBody = document.createElement("tbody");
var oCelda1, oCelda2, oCelda3, oCelda4, oCelda5, oCelda6, oCelda7, oCelda8, oCelda9, oCelda10;
var oDatos;
var sError = "";
	
	try{
		oDatos = JSON.parse(textoRespuesta);
		if (oDatos != null){
			if (oNodoDiv == null ||
				oNodoTbl == null || oTblBody == null)
				sError = "Error en HTML";
			else{
				if (oDatos.success){
					for(var i=0; i< oDatos.arrClientes.length; i++){
						oLinea = oNodoTblBody.insertRow(-1);
						oCelda1 = oLinea.insertCell(0);
						oCelda2 = oLinea.insertCell(1);
						oCelda3 = oLinea.insertCell(2);
						oCelda4 = oLinea.insertCell(3);
						oCelda5 = oLinea.insertCell(4);
						oCelda6 = oLinea.insertCell(5);
						oCelda7 = oLinea.insertCell(6);
						oCelda8 = oLinea.insertCell(7);
						oCelda9 = oLinea.insertCell(8);
						oCelda10 = oLinea.insertCell(9);
						oCelda1.innerHTML = oDatos.arrClientes[i].id;
						oCelda2.innerHTML = oDatos.arrClientes[i].nombreTienda;
						oCelda3.innerHTML = oDatos.arrClientes[i].rfc;
						oCelda4.innerHTML = oDatos.arrClientes[i].nombre;
						oCelda5.innerHTML = oDatos.arrClientes[i].apellidoPaterno;
						oCelda6.innerHTML = oDatos.arrClientes[i].apellidoMateno;
						oCelda7.innerHTML = oDatos.arrClientes[i].dirFiscal;
						oCelda8.innerHTML = oDatos.arrClientes[i].telOficina;
						oCelda9.innerHTML = oDatos.arrClientes[i].telCelular;
						oCelda10.innerHTML = oDatos.arrClientes[i].correo;
					}

					oNodoTblBody.id="tblBodyClientes";
					oNodoTbl.replaceChild(oNodoTblBody, oTblBody);
					
					oNodoFrm.style.display = "none";
					oNodoDiv.style.display = "block";
					
				}else{
					sError = oDatos.situacion;
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