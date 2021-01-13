<?php
/*************************************************************/
/* Material.php
 * Objetivo: clase que encapsula el manejo de la entidad Material
 * Autor: Juan
 *************************************************************/
error_reporting(E_ALL);
include_once("Compra.php");
class Detalles extends Compra{
  	private $nIdDetallesCompra=0; //
  	private $nCantidad=0; 
    private $nTotal=null;
  	
  	public function setIdDetallesCompra($value){
        $this->nIdCompra = $value;
    }
    public function getIdDetallesCompra(){
        return $this->nIdCompra;
    }
  	public function setCantidad($value){
        $this->sDirPedido = $value;
    }
    public function getCantidad(){
        return $this->sDirPedido;
    }
  	public function setTotal($value){
        $this->nTotal = $value;
    }
    public function getTotal(){
        return $this->nTotal;
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
            $sQuery = "SELECT idDetallesCompra, cantidad, total
                  FROM detalles
                  ORDER BY idDetallesCompra";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oComp = new Detalles();
                $oComp->setIdDetallesCompra($arrLinea[0]);
                $oComp->setCantidad($arrLinea[1]);
                $oComp->setTotal($arrLinea[2]);
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
        $oComp=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idDetallesCompra, cantidad, total
                  FROM detalles
                  WHERE idDetallesCompra = ".$id."
                  ORDER BY idDetallesCompra";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oComp = new Detalles();
                $oComp->setIdDetallesCompra($arrLinea[0]);
                $oComp->setCantidad($arrLinea[1]);
                $oComp->setTotal($arrLinea[2]);
                      $arrCompra[$j] = $oComp;
                $j=$j+1;
              }
            }
          }
          return $arrCompra;
    }
}
?>