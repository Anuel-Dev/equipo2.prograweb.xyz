function llamaBuscaJuegos(){
    var request = new XMLHttpRequest();
    var url = "ctrlPhp/ctrlJuego.php";
    var oCmbT = document.getElementById("cmbGenero");
    var oCmbE = document.getElementById("cmbplataforma");
    var sQueryString="";
        if (oCmbT == null || oCmbE == null){
            console.log(oCmbT);
            console.log(oCmbT.selectedIndex);
            alert("No hay datos suficientes para buscar videojuegos");
        }else{
            sQueryString="cmbGenero="+oCmbT.options[oCmbT.selectedIndex].value+"&cmbPlataforma="+oCmbE.options[oCmbE.selectedIndex].value;
            request.onreadystatechange=function() {
                if (request.readyState === 4 && 
                    request.status === 200) {
                    procesaBuscaJuegos(request.responseText);
                }else{
                    if (request.status != 200 &&request.status != 0)
                        alert("Hubo error, status "+ request.status);
                }
            };
            request.open("POST", url, true);
            //Se avisa que se envían parámetros que se van a entender como un formulario
            request.setRequestHeader("Content-type", 
            "application/x-www-form-urlencoded");
            request.send(sQueryString);
        }
    }
    
    //******************************************************************************
    function procesaBuscaJuegos(textoRespuesta){
    var oNodoFrm = document.getElementById("frmBuscaJuegos");
    var oNodoDiv = document.getElementById("resBuscaJuegos");
    var oNodoEdicion = document.getElementById("editaJuegos");
    var oNodoTbl = document.getElementById("tblJuegos"); 
    var oTblBody = document.getElementById("tblBodyJuegos");
    var btnCrearJuegos = document.getElementById("btnCrearJuegos"); 
    var tdOpe=document.getElementById("tdOpe");
    var te=document.getElementById("TE");
    var pr=document.getElementById("PR");
    var oNodoTblBody = document.createElement("tbody");
    var ocelda1,oCelda2, oCelda3, oCelda4, oCelda5, oCelda6,oCelda7, oCelda8, oBtn;
    var oDatos;
    var sError = "";
        
        try{
            oDatos = JSON.parse(textoRespuesta);
            if (oDatos != null){
                if (oNodoFrm == null || oNodoDiv == null || oTblBody == null)
                    sError = "Error en HTML";
                else{
                    if (oDatos.success){
                        for(var i=0; i< oDatos.arrJuegos.length; i++){
                            oLinea = oNodoTblBody.insertRow(-1);
    
                            oCelda1 = oLinea.insertCell(0);
                            oCelda2 = oLinea.insertCell(1);			
                            oCelda3 = oLinea.insertCell(2);
                            oCelda4 = oLinea.insertCell(3);
                            oCelda5 = oLinea.insertCell(4);
                            oCelda6 = oLinea.insertCell(5);
                        
							oCelda7 = oLinea.insertCell(6);
							
                            oCelda1.innerHTML = oDatos.arrJuegos[i].idJuego;
                            oCelda2.innerHTML = oDatos.arrJuegos[i].Plataforma;
                            oCelda3.innerHTML = oDatos.arrJuegos[i].Genero;
							oCelda4.innerHTML = oDatos.arrJuegos[i].tiempoEntrega;
							oCelda5.innerHTML = oDatos.arrJuegos[i].descripcion;
							oCelda6.innerHTML = oDatos.arrJuegos[i].precio;
							
							oCelda7.innerHTML = oDatos.arrJuegos[i].imagen;
                            
                            
                               
                                oCelda8 = oLinea.insertCell(7);
                                
                                oBtn = document.createElement("input");
                                oBtn.type="submit";
                                oBtn.value="Comprar";
                                oBtn.id='c'+oDatos.arrJuegos[i].precio;
                                oBtn.onclick=function(){
                                    llamaCompra(this.id.substring(1),'c'); 
                                };
                                oCelda8.appendChild(oBtn);
                            
                            
                    }
                        
                    
                        
                        //Sustituye el tBody original por el nuevo ya llenado
                        oNodoTblBody.id="tblBodyJuegos";
                        oNodoTbl.replaceChild(oNodoTblBody, oTblBody);
                        
                        //Ocultar formulario y mostrar tabla*/
                        oNodoFrm.style.display = "none";
                        oNodoDiv.style.display = "block";
                        oNodoEdicion.style.display="none";
                      
                        
                      
                        
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
    function llamaCompra($precio, $fun){
        var oNodoDiv = document.getElementById("resBuscaJuegos");
        var oNodoCons = document.getElementById("construccion");
       
    }