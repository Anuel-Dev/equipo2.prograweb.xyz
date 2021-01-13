<?php
include_once("../modelo/Administrador.php");
include_once("../modelo/Cliente.php");
include_once("../modelo/ErroresAplic.php");
$nErr=-1;
$nNum=0;
$oCliente=null;
$arrEncontrados=null;
$sJsonRet="";
$oErr=null;

if (isset($_SESSION["usrFirmado"]) && strcmp($_SESSION["usrFirmado"], "Admin") == 0){
		try{
				$oCliente = new Cliente();
				$arrEncontrados = $oCliente->buscarTodos();
			}else
				$nErr = ErroresAplic::ERROR_TIPO_MAT;
		}catch(Exception $e){
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$nErr = ErroresAplic::ERROR_EN_BD;
		}
	}
	else
		$nErr = ErroresAplic::FALTAN_DATOS;

	if ($nErr==-1){
		$sJsonRet = 
		'{
			"success":true,
			"situacion": "ok",
			"arrClientes": [
		';

		foreach($arrEncontrados as $oMat){
			$sJsonRet = $sJsonRet.'{
					"id": '.$oMat->getId().', 
					"nombreTienda":"'.$oMat->getNombreTienda().'",
					"rfc":"'.$oMat->getRFC().'",
					"nombre":"'.$oMat->getNombre().'",
					"apellidoPaterno":"'.$oMat->getApellidoPaterno().'",
					"apellidoMaterno":"'.$oMat->getApellidoMaterno().'",
					"dirFiscal":"'.$oMat->getDirFiscal().'",
					"telOficina":"'.$oMat->getTelOficina().'",
					"telCelular":"'.$oMat->getTelCelular().'",
					"correo":"'.$oMat->getCorreo().'"
					},';
		}
		$sJsonRet = substr($sJsonRet,0, strlen($sJsonRet)-1);
		
		$sJsonRet = $sJsonRet.']}';
	}else{
		$oErr = new ErroresAplic();
		$oErr->setError($nErr);
		$sJsonRet = 
		'{
			"success":false,
			"situacion": "'.$oErr->getTextoError().'",
			"arrClientes": []
		}';
	}
	echo $sJsonRet;
?>