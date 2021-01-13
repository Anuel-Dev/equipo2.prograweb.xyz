<?php
/*************************************************************/
/* Material.php
 * Objetivo: clase que encapsula el manejo de la entidad Material
 * Autor: Juan
 *************************************************************/
error_reporting(E_ALL);
include_once("AccesoDatos.php");
class Usuario {

    private $nId="";
    private $sPassword="";
    private $nTipoUsuario=-1;
  	CONST A=1;
  	CONST C=2;
    private static $arrTiposUsuario=array(
                              self::A=>"Admin",
                              self::C=>"Cliente"
                      );

    private $sNombre="";
    private $sApellidoPaterno="";
    private $sApellidoMaterno="";
	
  
    function setId($value){
        $this->nId = $value;
    }
    function getId(){
        return $this->nId;
    }
    function setPassword($value){
        $this->sPassword = $value;
    }
    function getPassword(){
        return $this->sPassword;
    }
    function setTipoUsuario($value){
        $this->nTipoUsuario = $value;
    }
	
    function getTipoUsuario(){
      return $this->nTipoUsuario;
    }
    function setNombre($value){
        $this->sNombre = $value;
    }
    function getNombre(){
        return $this->sNombre;
    }
    function setApellidoPaterno($value){
        $this->sApellidoPaterno = $value;
    }
    function getApellidoPaterno(){
        return $this->sApellidoPaterno;
    }
    function setApellidoMaterno($value){
        $this->sApellidoMaterno = $value;
    }
    function getApellidoMaterno(){
        return $this->sApellidoMaterno;
    }
	
	public function getDescripTipo(){
		  $sRet="";
        if ($this->nTipoUsuario>0 && array_key_exists($this->nTipoUsuario."", self::$arrTiposUsuario))
              $sRet = self::$arrTiposUsuario[$this->nTipoUsuario];
        return $sRet;
	}
	
	public function getTipos(){
		return self::$arrTiposUsuario;
	}


    function buscarTodos(){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrUsu = null;
        $arrLinea=null;
        $j=0;
        $oUsu=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT id, correo, password
                  FROM usuario
                  ORDER BY id";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oUsu = new Usuario();
                $oUsu->setId($arrLinea[0]);
                $oUsu->setPassword($arrLinea[1]);
                $oUsu->setNombre($arrLinea[2]);
                $oUsu->setApellidoPaterno($arrLinea[3]);
                $oUsu->setApellidoMaterno($arrLinea[4]);
                      $arrUsu[$j] = $oUsu;
                $j=$j+1;
              }
            }
          }
          return $arrUsu;   
    }
    function verificarUsuario($id,$pass){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrUsu = null;
        $arrLinea=null;
        $j=0;
        $oUsu=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT id, password, tipoUsuario
                  FROM usuario
                  WHERE id=".$id."  
                  AND password='".$pass."'";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oUsu = new Usuario();
                $oUsu->setId($arrLinea[0]);
                $oUsu->setPassword($arrLinea[1]);
                $oUsu->setNombre($arrLinea[2]);
                $oUsu->setApellidoPaterno($arrLinea[3]);
                $oUsu->setApellidoMaterno($arrLinea[4]);
                      $arrUsu[$j] = $oUsu;
                $j=$j+1;
              }
            }
          }
          return $arrUsu;   
    }
	
    function verificarCvePwd(){
        $oAccesoDatos=new AccesoDatos();
          $sQuery="";
          $arrRS=null;
  		$bRet=false;
  		if(empty($this->nId) || empty($this->sPassword))
  			 throw new Exception("Usuario->verificarCvePwd(): faltan datos");
  		 else{
            if ($oAccesoDatos->conectar()){
              $sQuery = "SELECT idUsuario, passwords, tipoUsuario, nombre, apellidoPaterno, apellidoMaterno
                    FROM usuario
                    WHERE idUsuario=".$this->nId." 
                    AND passwords='".$this->sPassword."'";
              $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
  			error_log($sQuery,0);
              $oAccesoDatos->desconectar();
              if ($arrRS){
                  $this->setId($arrRS[0][0]);
                  $this->setPassword($arrRS[0][1]);
                  $this->setTipoUsuario($arrRS[0][2]);
                  $this->setNombre($arrRS[0][3]);
                  $this->setApellidoPaterno($arrRS[0][4]);
                  $this->setApellidoMaterno($arrRS[0][5]);
  				   $bRet=true;
                }
              }
  		 }
        return $bRet;   
    }
}
?>