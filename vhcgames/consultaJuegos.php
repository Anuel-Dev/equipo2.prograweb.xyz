<?php
include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>
	<section>
		<script src="js/ctrlBuscaJuegos.js"></script>
		<br/>
		<b>Consulta nuestra amplia variedad de videojuegos</b></br>
        <form id="frmBuscaJuegos" onsubmit="llamaBuscaJuegos(); return false;" style="display:block">
            <center>
            <table>
                <tr>
                    <td>
                        <label for="cmbplataforma">Filtrar por plataforma:</label></td>
                    <td>
                        <select id="cmbplataforma">
					     	<option value="0">Elige un estilo</option>
							<option value="1">Nintendo</option>
							<option value="2">Play Station</option>
							<option value="3">Xbox</option>
						</select>
                    </td>
                
                    <td>
                        <label for="cmbGenero">Filtrar por genero:</label></td>
                    <td>
                        <select id="cmbGenero">
							<option value="0">Elige un tipo</option>
							<option value="1">Shooter</option>
							<option value="2">Aventura</option>
							<option value="3">Terror</option>
                            <option value="4">Estrategia</option>
                            <option value="5">RPG</option>
						</select>
                    </td>
                </tr>
                <tr><br><br></tr>
                <tr>
                    
                    <td colspan="2">
                        <input type="submit" value="Enviar" name="btnEnviar"/>
                    </td>
                </tr>
            </table>
                </center>
        </form>
		<div id="resBuscaJuegos" style="display:none">
			<h4>Juegos:</h4>
			<form onsubmit="return false;">
				<table border="3" id="tblJuegos">
					<thead>
						<tr>
							<td>Nombre del juego</td>
							<td>Plataforma</td>
							<td>Genero</td>
                            <td>Descripci�n</td>
                            <td id="TE">Tiempo de entrega</td>
                            <td id="PR">Precio</td>
							
							<td>Imagen</td>
							<td id="tdOpe">Operaci&oacute;n</td>
						</tr>
					</thead>
					<tbody id="tblBodyJuegos">
					</tbody>
				</table>
				<input id="btnCrearJuegos" type="button" value="Agregar juego" onclick="mostrarEdicionJue(-1,'a');"/>
			</form>
		
		</div>
        
		<div id="editaJuegos" style="display:none">
            
			<h4>Edita Juegos</h4>
			<form id="frmEditaMueble" action="construccion.php">
				<table>
					<tr>
						<td>
							<label for="txtClave">Id</label></td>
						<td>
							<input id="txtClave" readonly/></td>
						<td>
							<input type="hidden" id="txtOpe"/></td>
						<td></td>
					</tr>
					<tr>
						<td>
							<label for="txtPlataforma">Plataforma</label></td>
						<td>
							<input id="txtPlataforma" maxlength="100"  required/></td>
					</tr>
					<tr>
						<td>
							<label id="lbGenero" for="txtTipo">Genero</label>
						<td>
							<input id="txtGenero" maxlength="100"  required/>
						<td>
							<label id="lbPrecio" for="txtPrecio">Precio</label>
							<label id="lbEntrega" for="txtEntrega">Tiempo de Entrega</label></td>
						<td>
							<input id="txtPrecio" pattern="[0-9]*.[0-9]+" required/>
							<input id="txtEntrega"maxlength="100" required/></td>
					</tr>
					<tr>
						<td>
							<label id="lbDesc" for="txtDescrip">Descripci&oacute;n</label></td>
						<td>
							<input id="txtDescrip" maxlength="500" required/></td>
						<td></td>
						<td>
							<input type="submit" id="btnGuardarMue" value="Agrear"
								onclick="guardaMaterial();"/>
							<input type="button" id="btnCancMue" value="Cancelar"
								action="consultaJuegos.php"/></td>
					</tr>
				</table>
			</form>
		</div>
		<div id="construccion" style="display: none">
			<h4>EN CONSTRUCCI&Oacute;N...</h4>
			<h4>Estamos trabajando en ello ;)</h4>
		</div>
    </section>
<?php
include_once("latDcha.html");
include_once("pie.html");
?>