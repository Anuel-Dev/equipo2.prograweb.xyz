<?php
/*************************************************************/
/* Material.php
 * Objetivo: clase que encapsula el manejo de la entidad Material
 * Autor: Juan
 *************************************************************/
error_reporting(E_ALL);
include_once("Usuario.php");
class Administrador extends Usuario{

    protected $sCorreo="";
     
    public function setCorreo($value){
        $this->sCorreo = $value;
    }
    public function getCorreo(){
        return $this->sCorreo;
    }
    /*
    function buscarTodos(){
      $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrUsu = null;
        $arrLinea=null;
        $j=0;
        $oUsu=null;
          if ($oAccesoDatos->conectar()){
            $sQuery = "SELECT u.id, c.nombre, c.apellidoPaterno, c.apellidoMaterno, c.correo
                  FROM usuario u, administardor c
                  WHERE u.id = c.id
                  ORDER BY u.id";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS){
              foreach($arrRS as $arrLinea){
                $oUsu = new Administrador();
                $oUsu->setId($arrLinea[0]);
                $oUsu->setNombre($arrLinea[3]);
                $oUsu->setApellidoPaterno($arrLinea[4]);
                $oUsu->setApellidoMaterno($arrLinea[5]);
                $oUsu->setCorreo($arrLinea[9]);
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
          throw new Exception("Administrador->insertar(): faltan datos");
        else{
          if ($oAccesoDatos->conectar()){
            /*En las bases de datos, por integridad referencial, primero se 
              registra en la tabla independiente (material) y luego en la que tiene
              la dependencia (libro)
            */ /*
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
      }*/


}
?>