<?php
/*
* ClassMandamiento.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Mandamiento{
     private $idmandamiento;
     private $arancel;
     private $fechaemision;
     private $npe;
     private $codigobarras;
     private $descripcion;
     private $idtramite;
     private $idcuenta;
     //Objeto gestionador de base de datos
     private $conexionMandamiento;

     public function __construct()
     {
          $atributos= array( "arancel","fechaemision","npe","codigobarras","descripcion","idtramite","idcuenta" );
          $this->conexionMandamiento = new MySQL();
          $this->conexionMandamiento->setNombreTabla("mandamiento");
          $this->conexionMandamiento->setNombreAtributos($atributos);
          $this->conexionMandamiento->setNombreLlavePrimaria("idmandamiento");
     }

     public function setMandamientoPorLlave($llave)
     {
          if($registro=$this->conexionMandamiento->consultarRegistro($llave))
          {
               $this->idmandamiento=$llave;
               $this->arancel=$registro[0];
               $this->fechaemision=$registro[1];
               $this->npe=$registro[2];
               $this->codigobarras=$registro[3];
               $this->descripcion=$registro[4];
               $this->idtramite=$registro[5];
               $this->idcuenta=$registro[6];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdmandamiento($idmandamiento)
     {
          $this->idmandamiento=$idmandamiento;
     }
     public function setArancel($arancel)
     {
          $this->arancel=$arancel;
     }
     public function setFechaemision($fechaemision)
     {
          $this->fechaemision=$fechaemision;
     }
     public function setNpe($npe)
     {
          $this->npe=$npe;
     }
     public function setCodigobarras($codigobarras)
     {
          $this->codigobarras=$codigobarras;
     }
     public function setDescripcion($descripcion)
     {
          $this->descripcion=$descripcion;
     }
     public function setIdtramite($idtramite)
     {
          $this->idtramite=$idtramite;
     }
     public function setIdcuenta($idcuenta)
     {
          $this->idcuenta=$idcuenta;
     }

     //metodos Obtener(get)
     public function getIdmandamiento()
     {
          return $this->idmandamiento;
     }
     public function getArancel()
     {
          return $this->arancel;
     }
     public function getFechaemision()
     {
          return $this->fechaemision;
     }
     public function getNpe()
     {
          return $this->npe;
     }
     public function getCodigobarras()
     {
          return $this->codigobarras;
     }
     public function getDescripcion()
     {
          return $this->descripcion;
     }
     public function getIdtramite()
     {
          return $this->idtramite;
     }
     public function getIdcuenta()
     {
          return $this->idcuenta;
     }

     //metodo generador de listado
     public function getListadoMandamientos()
     {
          return $this->conexionMandamiento->listaLlaves("arancel", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarMandamiento($valor)
     {
          return $this->conexionMandamiento->buscar($valor,"arancel", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertMandamiento()
     {
           $atributos=array( $this->arancel , $this->fechaemision , $this->npe , $this->codigobarras , $this->descripcion , $this->idtramite , $this->idcuenta );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idmandamiento , $this->arancel , $this->fechaemision , $this->npe , $this->codigobarras , $this->descripcion , $this->idtramite , $this->idcuenta );

          return $this->conexionMandamiento->insertarRegistro($atributos);
     }
     public function updateMandamiento()
     {
          $atributos=array( $this->arancel , $this->fechaemision , $this->npe , $this->codigobarras , $this->descripcion , $this->idtramite , $this->idcuenta );
          return $this->conexionMandamiento->actualizarRegistro($this->idmandamiento,$atributos);
     }
}
?> 