<?php
/*
* ClassCarrera.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Carrera{
     private $idcarrera;
     private $nombre;
     private $nombreabrev;
     private $idfacultad;
     //Objeto gestionador de base de datos
     private $conexionCarrera;

     public function __construct()
     {
          $atributos= array( "nombre","nombreabrev","idfacultad" );
          $this->conexionCarrera = new MySQL();
          $this->conexionCarrera->setNombreTabla("carrera");
          $this->conexionCarrera->setNombreAtributos($atributos);
          $this->conexionCarrera->setNombreLlavePrimaria("idcarrera");
     }

     public function setCarreraPorLlave($llave)
     {
          if($registro=$this->conexionCarrera->consultarRegistro($llave))
          {
               $this->idcarrera=$llave;
               $this->nombre=$registro[0];
               $this->nombreabrev=$registro[1];
               $this->idfacultad=$registro[2];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdcarrera($idcarrera)
     {
          $this->idcarrera=$idcarrera;
     }
     public function setNombre($nombre)
     {
          $this->nombre=$nombre;
     }
     public function setNombreabrev($nombreabrev)
     {
          $this->nombreabrev=$nombreabrev;
     }
     public function setIdfacultad($idfacultad)
     {
          $this->idfacultad=$idfacultad;
     }

     //metodos Obtener(get)
     public function getIdcarrera()
     {
          return $this->idcarrera;
     }
     public function getNombre()
     {
          return $this->nombre;
     }
     public function getNombreabrev()
     {
          return $this->nombreabrev;
     }
     public function getIdfacultad()
     {
          return $this->idfacultad;
     }

     //metodo generador de listado
     public function getListadoCarreras()
     {
          return $this->conexionCarrera->listaLlaves("nombre", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarCarrera($valor)
     {
          return $this->conexionCarrera->buscar($valor,"nombre", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertCarrera()
     {
           $atributos=array( $this->nombre , $this->nombreabrev , $this->idfacultad );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idcarrera , $this->nombre , $this->nombreabrev , $this->idfacultad );

          return $this->conexionCarrera->insertarRegistro($atributos);
     }
     public function updateCarrera()
     {
          $atributos=array( $this->nombre , $this->nombreabrev , $this->idfacultad );
          return $this->conexionCarrera->actualizarRegistro($this->idcarrera,$atributos);
     }
}
?> 