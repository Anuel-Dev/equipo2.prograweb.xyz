<?php
include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>
	<section>
		<script src="js/ctrlBuscaClientes.js"></script>
		<br/>
     
		<div id="resBuscaClientes" style="display:none">
			<h4>Clientes</h4>
			<form onsubmit="return false;">
				<table border="3" id="tblClientes">
					<thead>
						<tr>
							<td>ID</td>
							<td>Tienda</td>
							<td>RFC</td>
                            <td>Nombre Res.</td>
                            <td>Ap. Paterno</td>
                            <td>Ap. Materno</td>
                            <td>Dir. Fiscal</td>
                            <td>Tel. Oficina</td
							<td>Tel. Celular</td>
							<td>Correo</td>
						</tr>
					</thead>
					<tbody id="tblBodyClientes">
					</tbody>
				</table>	
		
		</div>
        
		<div id="editaMateriales" style="display:none">
            
			<h4><span id="titTipoMat"></span></h4>
			<form id="frmEditaMaterial" onsubmit="return false;">
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
							<label for="txtNombre">Nombre del modelo</label></td>
						<td>
							<input id="txtNombre" maxlength="100"  required/></td>
						<td>
							<label for="txtestilo">estilo</label></td>
						<td>
							<input id="txtestilo" maxlength="100"  required/></td>
					</tr>
					<tr>
						<td>
							<label id="lbTipo" for="txttipo">Tipo</label>
							<label id="lbmed" for="txtmedidas">medidas</label></td>
						<td>
							<input id="txttipo" maxlength="100"  required/>
							<input id="txtmedidas" pattern="\d{4}-\d{4}" required/></td>
						<td>
							<label id="lbPrecio" for="txtPrecio">precio</label>
							<label id="lbEntrega" for="txtEntrega">tiempo de entrega</label></td>
						<td>
							<input id="txtPrecio" pattern="\d{10,13}" required/>
							<input id="txtEntrega" type="date" required/></td>
					</tr>
					<tr>
						<td>
							<label id="lbDesc" for="txtDescrip">Descripci&oacute;n</label></td>
						<td>
							<input id="txtDescrip" maxlength="100" required/></td>
						<td></td>
						<td>
							<input type="submit" id="btnGuardarMat" value="Agrear"
								onclick="guardaMaterial();"/>
							<input type="button" id="btnCancMat" value="Cancelar"
								onclick="cancelaMaterial();"/></td>
					</tr>
				</table>
			</form>
		</div>
    </section>
<?php
include_once("latDcha.html");
include_once("pie.html");
?>