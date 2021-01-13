<?php
include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>
<link rel="stylesheet" href="css/Animate.css" type="text/css"/>

<section class=" animated bounceInRight">
	
		<form id="frmRegistro"  action="construccion.php">
		
			<table>
				<tr>
					<td>
						<b><label for="Usuario">Info de usuario </label></b>
						
					</td>
						
			   </tr>
			   <tr>
					<td>
						<label>Nombre de nuevo usuario:</label>
					</td>
					<td>
						 <input type="text" id="nomR"  pattern="[Aa-Zz]{3,}" required />
						
					</td>
				</tr>
				
				 <tr>
					<td>
						<label>Apellido Paterno:</label>
					</td>
					<td>
						 <input type="text" id="apellidoP"  pattern="[Aa-Zz]" required />
						
					</td>
				</tr>
				
				 <tr>
					<td>
						<label>Apellido Materno:</label>
					</td>
					<td>
						 <input type="text" id="apellidoM"  pattern="[Aa-Zz]" required />
						
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Tel&eacute;fono celular: </label>
					</td>
					<td>
						 <input type="text" id="apellidoM"  pattern="[0-9]{10}" />
						
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Password :</label>
					</td>
					<td>
						 <input type="password" id="apellidoM" required />
						
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Correo Electr&oacute;nco :</label>
					</td>
					<td>
						 <input type="email" id="correo" required />
						
					</td>
				</tr>
				
				
						
				<tr>
				  <td colspan="2">
				     <input type="submit" value="Enviar" name="btnEnviar"/>
				  </td>
				</tr>
					</table>
					
				</form>
    </section>
<?php
include_once("latDcha.html");
include_once("pie.html");
?>