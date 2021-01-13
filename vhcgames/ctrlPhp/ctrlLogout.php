<?php
/*Archivo:  ctrlLogout.php
*/
include_once("../modelo/Usuario.php");
include_once("../modelo/ErroresAplic.php");
session_start(); 
	session_destroy();
	header("Location: ../index.php");
?>