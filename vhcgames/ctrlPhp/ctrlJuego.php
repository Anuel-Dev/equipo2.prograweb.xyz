<?php
/*Archivo:  ctrlJuego.php
*/
include_once("../modelo/Juegos.php");
include_once("../modelo/ErroresAplic.php");
$nErr=-1;
$nNumt=0;
$nNume=0;
$oJuego=null;
$arrEncontrados=null;
$sJsonRet = "";
$oErr = null;

/*Verifica que haya llegado el tipo*/
	if (isset($_REQUEST["cmbGenero"]) && isset($_REQUEST["cmbPlataforma"])){
		try{
			$nNume = intval(($_REQUEST["cmbGenero"]),10);
			$nNumt = intval(($_REQUEST["cmbPlataforma"]),10);
			
			if($nNumt==0 && $nNume==0){
				$oJuego = new 	Juegos();
				$arrEncontrados = $oJuego->buscarTodos();
			}
			else if($nNumt==0 && $nNume>0){
				$oJuego = new 	Juegos();
				$arrEncontrados = $oJuego->buscarPorGenero($nNume);
			}
			else if($nNumt>0 && $nNume==0){
				$oJuego = new 	Juegos();
				$arrEncontrados = $oJuego->buscarPorPlataforma($nNumt);
			}
			else if($nNumt>0 && $nNume>0){
				$oJuego = new 	Juegos();
				$arrEncontrados = $oJuego->buscarPorAmbos($nNumt,$nNume);
			}
			else
				$nErr = ErroresAplic::ERROR_TIPO_MAT;	
		}catch(Exception $e){
			//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
			error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$nErr = ErroresAplic::ERROR_EN_BD;
		}
	}
	else
		$nErr = ErroresAplic::FALTAN_DATOS;

	if ($nErr==-1 && $arrEncontrados!=null){
		$sJsonRet = 
		'{
			"success":true,
			"situacion": "ok",
			"arrJuegos": [
		';
		//Recorrer arreglo para llenar objetos
		foreach($arrEncontrados as $oMat){
			$sJsonRet = $sJsonRet.'{
					"idJuego": '.$oMat->getnIdJuego().', 
					"Plataforma":"'.$oMat->getPlataforma().'",
					"Genero":"'.$oMat->getGenero().'",
					"precio":'.$oMat->getPrecio().',
					"tiempoEntrega":"'.$oMat->getTiempoEntrega().'",
					"descripcion":"'.$oMat->getDescripcion().'",
					"imagen":" '.$oMat->getimagen().'"},';
		}

		$sJsonRet = substr($sJsonRet,0, strlen($sJsonRet)-1);
		
		$sJsonRet = $sJsonRet.']}';
		
	}else{
		$nErr = ErroresAplic::ERROR_TIPO_MAT;
		$oErr = new ErroresAplic();
		$oErr->setError($nErr);
		$sJsonRet = 
		'{
			"success":false,
			"situacion": "'.$oErr->getTextoError().'",
			"arrJuego": []
		}';
	}
	echo $sJsonRet;
?>
	