<?php
/*Archivo:  enconstruccion.php
Objetivo: "vista temporal" para caso de sesiones
Autor:    BAOZ
*/
/*include_once("modelo/EmpleadoBiblioteca.php");
include_once("modelo/ErroresAplic.php");
session_start(); //Le avisa al servidor que va a utilizar sesiones
$nErr=-1;
$oFirmado=null;
	Verificar que exista el objeto de sesión
	if (isset($_SESSION["usrFirmado"])){
		$oFirmado = $_SESSION["usrFirmado"];
	}
	else
		$nErr = ErroresAplic::SIN_SESION;
	
	if ($nErr != -1){
		header("Location: error.php?nError=".$nErr);
		exit();
	}*/
include_once("cabecera.php");
include_once("menu.php");
include_once("latIzq.html");
?>
<link rel="stylesheet" href="css/Animate.css" type="text/css"/>
	<section>
        <center>
		<h4>EN CONSTRUCCI&Oacute;N</h4>
		<h4>trabajamos en ello</h4>
         <img class="animated flash" src="media/construccion.jpg" border="0"  /><br>
        </center>
    </section>
<?php
include_once("latDcha.html");
include_once("pie.html");
?>