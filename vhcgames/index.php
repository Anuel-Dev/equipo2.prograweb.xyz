<?php
session_start();
include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>
	<link rel="stylesheet" href="css/Animate.css" type="text/css"/>
	

<section class=" animated bounceInLeft">
		<script src="js/ctrlLogin.js"></script>
		<br/>
        <form id="frmLogin" onsubmit="llamaLogin(txtCuenta.value, txtPwd.value); return false;" style="display:block;">
            <center>
            <table>
			<label for="txtCuenta">Hola! CHVideogames te desea un buen d&iacute;a</label>
                <tr>
                    <td>
                        <label for="txtCuenta">Cuenta:</label></td>
                    <td>
                        <input type="text" name="txtCuenta" required size="14"
						           	pattern="[0-9]+"/>
                    </td>
                </tr><br>
                <tr>
                    <td>
                        <label for="txtPwd">Contrase&ntilde;a:</label></td>
                    <td>
                        <input type="password" name="txtPwd" required size="10"
							pattern="[a-zA-Z0-9]*"/>
                    </td>
                </tr><br>
                <td>
                
                </td>
                <tr><br><br>
                    <td colspan="2">
                        <input type="submit" value="Iniciar sesi&oacute;n" name="btnEnviar"/>
                    </td>
                </tr>
            </table>
            </center>
        </form>
		<div id="welcome" style="display:none">
			<h4>Bienvenido <span id="paraNombre"></span></h4>
		</div>
    </section>
	
<?php
include_once("latDcha.html");
include_once("pie.html");
?>
