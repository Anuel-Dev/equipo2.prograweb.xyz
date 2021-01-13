<?php
/*************************************************************/
/* Material.php
 * Objetivo: clase que encapsula el manejo de la entidad Material
 * Autor: Juan
 *************************************************************/
error_reporting(E_ALL);
include_once("AccesoDatos.php");
class Compra {
  	private $nIdCompra=0; //
  	CONST MIN_COMPRA = 5000.00;
  	private $sDirPedido=""; 
    private $oMensajeria=null;
    private $nCostoTotal="";
    private $dFechaEntrega=null;
    private $nTipoPago=0;
    private $arrTiposPago=array(
                        1=>"Tarjeta",
                        2=>"Deposito");
  	
  	public function setIdCompra($value){
        $this->nIdCompra = $value;
    }
    public function getIdCompra(){
        return $this->nIdCompra;
    }
  	public function setDirPedido($value){
        $this->sDirPedido = $value;
    }
    public function getDirPedido(){
        return $this->sDirPedido;
    }
  	public function setCostoTotal($value){
        $this->nCostoTotal = $value;
    }
    public function getCostoTotal(){
        return $this->nCostoTotal;
    }
    public function setFechaEntrega($value){
        $this->dFechaEntrega = $value;
    }
    public function getFechaEntrega(){
        return $this->dFechaEntrega;
    }
    public function setTipoPago($value){
        $this->nTipoPago = $value;
    }
    public function getTipoPago(){
        $sRet=0;
        if ($this->nTipoPago !=0 && array_key_exists($this->nTipoPago, self::$arrTiposPago))
              $sRet = self::$arrTiposPago[$this->nTipoPago];
        return $sRet;
    }
   
    function buscarTodos(){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrCompra = null;
        $arrLinea=null;
        $j=0;
        $oComp=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idCompra, dirPedido, costoTotal, fechaEntrega, tipoPago
                  FROM compra
                  ORDER BY idCompra";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oComp = new Compra();
                $oComp->setIdCompra($arrLinea[0]);
                $oComp->setDirPedido($arrLinea[1]);
                $oComp->setCostoTotal($arrLinea[2]);
                $oComp->setFechaEntrega(
                    DateTime::createFromFormat('Y-m-d',$arrLinea[3])););
                $oComp->setTipoPago($arrLinea[4]);
                      $arrCompra[$j] = $oComp;
                $j=$j+1;
              }
            }
          }
          return $arrCompra;   
    }
    function buscarPorId($id){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrCompra = null;
        $arrLinea=null;
        $j=0;
        $oCompra=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idCompra, dirPedido, costoTotal, fechaEntrega, tipoPago
                  FROM compra
                  WHERE idCompra = ".$id."
                  ORDER BY idCompra";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oCompra = new Compra();
                $oCompra->setIdCompra($arrLinea[0]);
                $oCompra->setDirPedido($arrLinea[1]);
                $oCompra->setCostoTotal($arrLinea[2]);
                $oCompra->setFechaEntrega(
                    DateTime::createFromFormat('Y-m-d',$arrLinea[3]));
                $oCompra->setTipoPago($arrLinea[4]);
                      $arrCompra[$j] = $oCompra;
                $j=$j+1;
              }
            }
          }
          return $arrCompra;  
    }
}
?>