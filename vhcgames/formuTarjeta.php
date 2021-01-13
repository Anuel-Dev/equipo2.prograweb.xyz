<?php
include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>
<section>
    <br><br><br><br>
    <center><h1> INGRESE SUS DATOS PARA REALIZAR SU COMPRA </h1>
        
        

<table>
					
					<tr>
						<td>
							<label >Nombre del titular</label></td>
						<td>
							<input id="txt" maxlength="100"required/></td>
                        <td>
							
						
					</tr>
    <br>
					<tr>
						<td>
							<label id="lbTipo" for="txttipo">Numero telefonico</label>
							
						<td>
							
							<input id="txt" pattern="\d{4}-\d{4}" required/></td>
    </tr>
    <br>
    <tr>
						<td>
							<label id="lbPrecio" for="txtPrecio">Numero de tarjeta</label>
							
						<td>
							<input id="txt" pattern="\d{10,13}" required/>
							
					</tr>
    <br>
    <tr>
						<td>
							<label >Direccion</label></td>
						<td>
							<input id="txt" maxlength="100"required/></td>
                        <td>
							
						
					</tr>
    
				</table>
        <input type="submit" value="enviar" onclick="location='enconstruccion.php'"/> 
        </center>
                 </section>
<?php
include_once("latDcha.html");
include_once("pie.html");
?>