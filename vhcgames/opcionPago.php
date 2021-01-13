<?php


include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>

	<section>
        <center>
		<h1>Selecciona tu forma de pago</h1><br><br>
		 <input type="submit" value="Deposito en banco" onclick="location='numeroCuenta.php'"/> <br><br>
             <input type="submit" value="cargo a su tarjeta" onclick="location='formuTarjeta.php'"/> 
         
        </center>
    </section>
<?php
include_once("latDcha.html");
include_once("pie.html");
?>