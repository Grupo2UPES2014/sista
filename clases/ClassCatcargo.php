<?php
/*
* ClassCatcargo.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Catcargo{
     private $idcatcargo;
     private $nombre;
     private $descripcion;
     //Objeto gestionador de base de datos
     private $conexionCatcargo;

     public function __construct()
     {
          $atributos= array( "nombre","descripcion" );
          $this->conexionCatcargo = new MySQL();
          $this->conexionCatcargo->setNombreTabla("catcargo");
          $this->conexionCatcargo->setNombreAtributos($atributos);
          $this->conexionCatcargo->setNombreLlavePrimaria("idcatcargo");
     }

     public function setCatcargoPorLlave($llave)
     {
          if($registro=$this->conexionCatcargo->consultarRegistro($llave))
          {
               $this->idcatcargo=$llave;
               $this->nombre=$registro[0];
               $this->descripcion=$registro[1];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdcatcargo($idcatcargo)
     {
          $this->idcatcargo=$idcatcargo;
     }
     public function setNombre($nombre)
     {
          $this->nombre=$nombre;
     }
     public function setDescripcion($descripcion)
     {
          $this->descripcion=$descripcion;
     }

     //metodos Obtener(get)
     public function getIdcatcargo()
     {
          return $this->idcatcargo;
     }
     public function getNombre()
     {
          return $this->nombre;
     }
     public function getDescripcion()
     {
          return $this->descripcion;
     }

     //metodo generador de listado
     public function getListadoCatcargos()
     {
          return $this->conexionCatcargo->listaLlaves("nombre", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarCatcargo($valor)
     {
          return $this->conexionCatcargo->buscar($valor,"nombre", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertCatcargo()
     {
           $atributos=array( $this->nombre , $this->descripcion );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idcatcargo , $this->nombre , $this->descripcion );

          return $this->conexionCatcargo->insertarRegistro($atributos);
     }
     public function updateCatcargo()
     {
          $atributos=array( $this->nombre , $this->descripcion );
          return $this->conexionCatcargo->actualizarRegistro($this->idcatcargo,$atributos);
     }
}
?> 