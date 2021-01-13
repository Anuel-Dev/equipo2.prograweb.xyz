<?php
/*Archivo:  ctrlLogin.php
*/
include_once("../modelo/Usuario.php");
include_once("../modelo/ErroresAplic.php");

session_start(); //Le avisa al servidor que va a utilizar sesiones
$nErr=-1;
$oUsuario=new Usuario();
$sJsonRet = "";

/*Verifica que hayan llegado los datos*/
 if (isset($_REQUEST["txtId"]) && !empty($_REQUEST["txtId"]) &&
		isset($_REQUEST["txtPwd"]) && !empty($_REQUEST["txtPwd"])){
		try{
			//Pasa los datos al objeto
			$oUsuario->setId($_REQUEST["txtId"]);
			$oUsuario->setPassword($_REQUEST["txtPwd"]);
			//Busca en la base de datos
			if ($oUsuario->verificarCvePwd()){
				//Guarda el usuario firmado en una variable de sesión
				$_SESSION["usrFirmado"] = $oUsuario;
			}else
				$nErr = ErroresAplic::USR_DESCONOCIDO;
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$nErr = ErroresAplic::ERROR_EN_BD;
		}
	}
	else
		$nErr = ErroresAplic::FALTAN_DATOS;
	
	if ($nErr==-1){
		$sJsonRet = '{
			"nombre":"'.$oUsuario->getNombre().'",
			"apeP":"'.$oUsuario->getApellidoPaterno().'",
			"apeM":"'.$oUsuario->getApellidoMaterno().'",
			"sTipo":'.$oUsuario->getTipoUsuario().'}';
	}
	else{
		$oErr = new ErroresAplic();
		$oErr->setError($nErr);
		$sJsonRet = '{
			"nombre":"'.$oErr->getTextoError().'",
			"apeP":"'.$oErr->getTextoError().'",
			"apeM":"'.$oErr->getTextoError().'",
			"sTipo":-1}';
	}
	echo $sJsonRet;
?>