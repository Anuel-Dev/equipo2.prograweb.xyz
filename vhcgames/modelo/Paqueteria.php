<?php
/*************************************************************/
/* Material.php
 * Objetivo: clase que encapsula el manejo de la entidad Material
 * Autor: Juan
 *************************************************************/
error_reporting(E_ALL);
include_once("Compra.php");
class Paqueteria extends Compra{
    private $nIdPaqueteria=0; //
    private $sNombre=""; 
    private $nTipoEnvio=null;
    private $nCostoEnvio="";
    private $arrTiposEnvio=array(
                        1=>"Normal",
                        2=>"Express");
    
    public function setIdPaqueteria($value){
        $this->nIdPaqueteria = $value;
    }
    public function getIdPaqueteria(){
        return $this->nIdPaqueteria;
    }
    public function setNombre($value){
        $this->sNombre = $value;
    }
    public function getNombre(){
        return $this->sNombre;
    }
    public function setCostoEnvio($value){
        $this->nCostoEnvio = $value;
    }
    public function getCostoTotal(){
        return $this->nCostoEnvio;
    }
    public function setTipoEnvio($value){
        $this->nTipoPago = $value;
    }
    public function getTipoEnvio(){
        $sRet=0;
        if ($this->nTipoEnvio !=0 && array_key_exists($this->nTipoEnvio, self::$arrTiposEnvio))
              $sRet = self::$arrTiposEnvio[$this->nTipoEnvio];
        return $sRet;
    }
   
    function buscarTodos(){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrPaqueteria = null;
        $arrLinea=null;
        $j=0;
        $oPaqueteria=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idPaqueteria, nombre, tipoEnvio, costoEnvio
                  FROM paqueteria
                  ORDER BY idPaqueteria";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oPaqueteria = new Paqueteria();
                $oPaqueteria->setIdPaqueteria($arrLinea[0]);
                $oPaqueteria->setNombre($arrLinea[1]);
                $oPaqueteria->setTipoEnvio($arrLinea[2]);
                $oPaqueteria->setCostoEnvio($arrLinea[3]);
                      $arrPaqueteria[$j] = $oPaqueteria;
                $j=$j+1;
              }
            }
          }
          return $arrPaqueteria;   
    }
    function buscarPorId($id){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrPaqueteria = null;
        $arrLinea=null;
        $j=0;
        $oPaqueteria=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idPaqueteria, nombre, tipoEnvio, costoEnvio
                  FROM paqueteria
                  WHERE idPaqueteria = ".$id."
                  ORDER BY idPaqueteria";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oPaqueteria = new Paqueteria();
                $oPaqueteria->setIdPaqueteria($arrLinea[0]);
                $oPaqueteria->setNombre($arrLinea[1]);
                $oPaqueteria->setTipoEnvio($arrLinea[2]);
                $oPaqueteria->setCostoEnvio($arrLinea[3]);
                      $arrPaqueteria[$j] = $oPaqueteria;
                $j=$j+1;
              }
            }
          }
          return $arrPaqueteria;   
    }
}
?>