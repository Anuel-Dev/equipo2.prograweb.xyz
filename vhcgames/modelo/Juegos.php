<?php
/*************************************************************/
/* Material.php
 * Objetivo: clase que encapsula el manejo de la entidad Material
 *************************************************************/
error_reporting(E_ALL);
include_once("AccesoDatos.php");
class Juegos {
  	private $nIdJuego=""; //
  	private $nPlataforma=-1; 
	CONST NIN=1;
	CONST PS=2;
	CONST XBOX=3;
    private static $arrPlataformas=array(
                              1=>"Nintendo",
                              2=>"Play Station",
                              3=>"Xbox",
                      );

    private $nGenero=-1;
	CONST Shooter=1;
	CONST Aventura=2;
	CONST Terror=3;
	CONST Estrategia=4;
	CONST RPG=5;

    private static $arrGeneros=array(
                              1=>"Shooter",
                              2=>"Aventura",
                              3=>"Terror",
                              4=>"Estrategia",
                              5=>"RPG"
                      );

    private $nPrecio=0.0;
    private $sTiempoEntrega="";
    private $sDescripcion="";
    private $simagen="";
  	
  	public function setnIdJuego($value){
        $this->nIdJuego = $value;
    }
    public function getnIdJuego(){
        return $this->nIdJuego;
    }
  	
  	public function setPlataforma($value){
        $this->nPlataforma = $value;
    }
    public function getPlataforma(){
        $sRet=0;
        if ($this->nPlataforma !=0 && array_key_exists($this->nPlataforma, self::$arrPlataformas))
            $sRet = self::$arrPlataformas[$this->nPlataforma];
        return $sRet;
    }
  	
  	public function setGenero($value){
         $this->nGenero = $value;
    }
    public function getGenero(){
        $sRet=0;
        if ($this->nGenero !=0 && array_key_exists($this->nGenero, self::$arrGeneros))
              $sRet = self::$arrGeneros[$this->nGenero];
        return $sRet;
    }

    public function setPrecio($value){
        $this->nPrecio = $value;
    }
    public function getPrecio(){
        return $this->nPrecio;
    }
    public function setTiempoEntrega($value){
        $this->sTiempoEntrega = $value;
    }
    public function getTiempoEntrega(){
        return $this->sTiempoEntrega;
    }
    public function setDescripcion($value){
        $this->sDescripcion = $value;
    }
    public function getDescripcion(){
        return $this->sDescripcion;
    }
    public function setimagen($value){
      $this->simagen = $value;
  }
  public function getimagen(){
      return $this->simagen;
  }
    function buscarTodos(){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrJuegos = null;
        $arrLinea=null;
        $j=0;
        $oJuegos=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idJuego,Plataforma,Genero,precio,tiempoEntrega,descripcion, imagen
                  FROM juegos
				  WHERE estado=0
                  ORDER BY idJuego";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oJuegos = new Juegos();
                $oJuegos->setnIdJuego($arrLinea[0]);
                $oJuegos->setPlataforma($arrLinea[1]);
                $oJuegos->setGenero($arrLinea[2]);
                $oJuegos->setPrecio($arrLinea[3]);
                $oJuegos->setTiempoEntrega($arrLinea[4]);
                $oJuegos->setDescripcion($arrLinea[5]);
                $oJuegos->setimagen($arrLinea[6]);
                      $arrJuegos[$j] = $oJuegos;
                $j=$j+1;
              }
            }
          }
          return $arrJuegos;   
    }
    function buscarPorPlataforma($Plataforma){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrJuegos = null;
        $arrLinea=null;
        $j=0;
        $oJuegos=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idJuego,Plataforma,Genero,precio,tiempoEntrega,descripcion, imagen
                  FROM juegos
				  WHERE Plataforma=".$Plataforma." AND estado=0 ORDER BY idJuego";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oJuegos = new Juegos();
                $oJuegos->setnIdJuego($arrLinea[0]);
                $oJuegos->setPlataforma($arrLinea[1]);
                $oJuegos->setGenero($arrLinea[2]);
                $oJuegos->setPrecio($arrLinea[3]);
                $oJuegos->setTiempoEntrega($arrLinea[4]);
                $oJuegos->setDescripcion($arrLinea[5]);
                $oJuegos->setimagen($arrLinea[6]);
                      $arrJuegos[$j] = $oJuegos;
                $j=$j+1;
              }
            }
          }
          return $arrJuegos;   
    }
    function buscarPorGenero($Genero){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrJuegos = null;
        $arrLinea=null;
        $j=0;
        $oJuegos=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idJuego,Plataforma,Genero,precio,tiempoEntrega,descripcion, imagen
                  FROM juegos
				  WHERE Genero=".$Genero." AND estado=0 ORDER BY idJuego";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oJuegos = new Juegos();
                $oJuegos->setnIdJuego($arrLinea[0]);
                $oJuegos->setPlataforma($arrLinea[1]);
                $oJuegos->setGenero($arrLinea[2]);
                $oJuegos->setPrecio($arrLinea[3]);
                $oJuegos->setTiempoEntrega($arrLinea[4]);
                $oJuegos->setDescripcion($arrLinea[5]);
                $oJuegos->setimagen($arrLinea[6]);
                      $arrJuegos[$j] = $oJuegos;
                $j=$j+1;
              }
            }
          }
          return $arrJuegos; 
    }
	
	function buscarPorAmbos($Genero,$Plataforma){
       $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrJuegos = null;
        $arrLinea=null;
        $j=0;
        $oJuegos=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT idJuego,Plataforma,Genero,precio,tiempoEntrega,descripcion, imagen
                  FROM juegos
				  WHERE Genero=".$Genero." AND Plataforma=".$Plataforma." AND estado=0 ORDER BY idJuego";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oJuegos = new Juegos();
                $oJuegos->setnIdJuego($arrLinea[0]);
                $oJuegos->setPlataforma($arrLinea[1]);
                $oJuegos->setGenero($arrLinea[2]);
                $oJuegos->setPrecio($arrLinea[3]);
                $oJuegos->setTiempoEntrega($arrLinea[4]);
                $oJuegos->setDescripcion($arrLinea[5]);
                $oJuegos->setimagen($arrLinea[6]);
                      $arrJuegos[$j] = $oJuegos;
                $j=$j+1;
              }
            }
          }
          return $arrJuegos;  
    }
}
?>