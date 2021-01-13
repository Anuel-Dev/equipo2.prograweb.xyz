<?php
error_reporting(E_ALL);
include_once("Usuario.php");
class Cliente extends Usuario{
    protected $sNombreTienda="";
    protected $sRFC="";
    protected $sDirFiscal="";
    protected $sTelOficina="";
    protected $sTelCelular="";
    protected $sCorreo="";
     
    public function setNombreTienda($value){
        $this->sNombreTienda = $value;
    }
    public function getNombreTienda(){
        return $this->sNombreTienda;
    }
    public function setRFC($value){
        $this->sRFC = $value;
    }
    public function getRFC(){
        return $this->sRFC;
    }
    public function setDirFiscal($value){
        $this->sDirFiscal = $value;
    }
    public function getDirFiscal(){
        return $this->sDirFiscal;
    }
    public function setTelOficina($value){
        $this->sTelOficina = $value;
    }
    public function getTelOficina(){
        return $this->sTelOficina;
    }
    public function setTelCelular($value){
        $this->sTelCelular = $value;
    }
    public function getTelCelular(){
        return $this->sTelCelular;
    }
    public function setCorreo($value){
        $this->sCorreo = $value;
    }
    public function getCorreo(){
        return $this->sCorreo;
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
            $sQuery = "SELECT u.id, ,c.nombreTienda, c.rfc, c.nombre, c.apellidoPaterno, c.apellidoMaterno, c.dirFiscal, c.telOficina, c.telCelular, c.correo
                  FROM usuario u, cliente c
                  WHERE u.id = c.id
                  ORDER BY correo, password, nombre";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oUsu = new Cliente();
                $oUsu->setId($arrLinea[0]);
                $oUsu->setNombreTienda($arrLinea[1]);
                $oUsu->setRFC($arrLinea[2]);
                /*
                $oUsu->setNombre($arrLinea[3]);
                $oUsu->setApellidoPaterno($arrLinea[4]);
                $oUsu->setApellidoMaterno($arrLinea[5]);
                */
                $oUsu->setDirFiscal($arrLinea[3]);
                $oUsu->setTelOficina($arrLinea[4]);
                $oUsu->setTelCelular($arrLinea[5]);
                $oUsu->setCorreo($arrLinea[6]);
                      $arrUsu[$j] = $oUsu;
                $j=$j+1;
              }
            }
          }
          return $arrUsu;   
    }
    function buscarPorId($id){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrUsu = null;
        $arrLinea=null;
        $j=0;
        $oUsu=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT u.id, ,c.nombreTienda, c.rfc, c.nombre, c.apellidoPaterno, c.apellidoMaterno, c.dirFiscal, c.telOficina, c.telCelular, c.correo
                  FROM usuario u, cliente c
                  WHERE u.id = c.id AND c.id = ".$id."
                  ORDER BY correo, password, nombre";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oUsu = new Cliente();
                $oUsu->setId($arrLinea[0]);
                $oUsu->setNombreTienda($arrLinea[1]);
                $oUsu->setRFC($arrLinea[2]);
                /*
                $oUsu->setNombre($arrLinea[3]);
                $oUsu->setApellidoPaterno($arrLinea[4]);
                $oUsu->setApellidoMaterno($arrLinea[5]);
                */
                $oUsu->setDirFiscal($arrLinea[3]);
                $oUsu->setTelOficina($arrLinea[4]);
                $oUsu->setTelCelular($arrLinea[5]);
                $oUsu->setCorreo($arrLinea[6]);
                      $arrUsu[$j] = $oUsu;
                $j=$j+1;
              }
            }
          }
          return $arrUsu;   
    }
    /*
    function insertar(){
      $oAccesoDatos=new AccesoDatos();
      $sQuery="";
      $nAfectados=-1;
        //Se verifican campos obligatorios (el id es autogenerado, no se verifica)
        if (empty($this->sNombreTienda) || empty($this->sRFC) ||
          empty($this->sNombre) || empty($this->sApellidoPaterno) ||
          empty($this->sApellidoMaterno) || empty($this->sDirFiscal) || 
          empty($this->sTelOficina)  || empty($this->sTelCelular) || 
          empty($this->sCorreo))
          throw new Exception("Cliente->insertar(): faltan datos");
        else{
          if ($oAccesoDatos->conectar()){
            /*En las bases de datos, por integridad referencial, primero se 
              registra en la tabla independiente (material) y luego en la que tiene
              la dependencia (libro)
            */
              /*
            $sQuery = parent::getInsertar();
            $sQuery = $sQuery."
              INSERT INTO cliente (nombreTienda, rfc, nombre, apellidoPaterno,apellidoMaterno,dirFiscal,telOficina,telCelular,correo) 
              VALUES (currval(pg_get_serial_sequence('usuario', 'id')), 
              '".$this->sNombreTienda."', '".$this->sRFC."', '".$this->sNombre."', '".$this->sApellidoPaterno."', '".$this->sApellidoMaterno."', '".$this->sDirFiscal."', '".$this->sTelOficina."', '".$this->sTelCelular."', '".$this->sCorreo."',);";
            $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
            $oAccesoDatos->desconectar();   
          }
        }
        return $nAfectados;
      }
      */


}
?>