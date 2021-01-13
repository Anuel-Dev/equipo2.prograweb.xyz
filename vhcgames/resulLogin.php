<?php
/*Archivo:  resulLogin.php
Objetivo: resultado (vista) de login, presenta mensaje de bienvenida
Autor:    BAOZ
*/
include_once("modelo/Usuario.php");
include_once("modelo/ErroresAplic.php");
session_start(); //Le avisa al servidor que va a utilizar sesiones
$nErr=-1;
$oFirmado=null;
	/*Verificar que exista el objeto de sesión*/
	if (isset($_SESSION["usrFirmado"])){
		$oFirmado = $_SESSION["usrFirmado"];
	}
	else
		$nErr = ErroresAplic::SIN_SESION;
	
	if ($nErr != -1){
		header("Location: error.php?nError=".$nErr);
		exit();
	}
include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>
	<section>
	<br/>
		<h4>Bienvenido <?php echo $oFirmado->getNombre();?></h4>
    </section>
<?php
include_once("latDcha.html");
include_once("pie.html");
?>