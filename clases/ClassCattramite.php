<?php
/*
* ClassCattramite.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Cattramite{
     private $idcattramite;
     private $nombre;
     private $arancel;
     private $porcentajerecargo;
     //Objeto gestionador de base de datos
     private $conexionCattramite;

     public function __construct()
     {
          $atributos= array( "nombre","arancel","porcentajerecargo" );
          $this->conexionCattramite = new MySQL();
          $this->conexionCattramite->setNombreTabla("cattramite");
          $this->conexionCattramite->setNombreAtributos($atributos);
          $this->conexionCattramite->setNombreLlavePrimaria("idcattramite");
     }

     public function setCattramitePorLlave($llave)
     {
          if($registro=$this->conexionCattramite->consultarRegistro($llave))
          {
               $this->idcattramite=$llave;
               $this->nombre=$registro[0];
               $this->arancel=$registro[1];
               $this->porcentajerecargo=$registro[2];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdcattramite($idcattramite)
     {
          $this->idcattramite=$idcattramite;
     }
     public function setNombre($nombre)
     {
          $this->nombre=$nombre;
     }
     public function setArancel($arancel)
     {
          $this->arancel=$arancel;
     }
     public function setPorcentajerecargo($porcentajerecargo)
     {
          $this->porcentajerecargo=$porcentajerecargo;
     }

     //metodos Obtener(get)
     public function getIdcattramite()
     {
          return $this->idcattramite;
     }
     public function getNombre()
     {
          return $this->nombre;
     }
     public function getArancel()
     {
          return $this->arancel;
     }
     public function getPorcentajerecargo()
     {
          return $this->porcentajerecargo;
     }

     //metodo generador de listado
     public function getListadoCattramites()
     {
          return $this->conexionCattramite->listaLlaves("nombre", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarCattramite($valor)
     {
          return $this->conexionCattramite->buscar($valor,"nombre", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertCattramite()
     {
           $atributos=array( $this->nombre , $this->arancel , $this->porcentajerecargo );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idcattramite , $this->nombre , $this->arancel , $this->porcentajerecargo );

          return $this->conexionCattramite->insertarRegistro($atributos);
     }
     public function updateCattramite()
     {
          $atributos=array( $this->nombre , $this->arancel , $this->porcentajerecargo );
          return $this->conexionCattramite->actualizarRegistro($this->idcattramite,$atributos);
     }
}
?> 