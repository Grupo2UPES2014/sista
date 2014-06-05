<?php
/*
* ClassAsignatura.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Asignatura{
     private $idasignatura;
     private $correlativo;
     private $nombre;
     private $idcarrera;
     //Objeto gestionador de base de datos
     private $conexionAsignatura;

     public function __construct()
     {
          $atributos= array( "correlativo","nombre","idcarrera" );
          $this->conexionAsignatura = new MySQL();
          $this->conexionAsignatura->setNombreTabla("asignatura");
          $this->conexionAsignatura->setNombreAtributos($atributos);
          $this->conexionAsignatura->setNombreLlavePrimaria("idasignatura");
     }

     public function setAsignaturaPorLlave($llave)
     {
          if($registro=$this->conexionAsignatura->consultarRegistro($llave))
          {
               $this->idasignatura=$llave;
               $this->correlativo=$registro[0];
               $this->nombre=$registro[1];
               $this->idcarrera=$registro[2];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdasignatura($idasignatura)
     {
          $this->idasignatura=$idasignatura;
     }
     public function setCorrelativo($correlativo)
     {
          $this->correlativo=$correlativo;
     }
     public function setNombre($nombre)
     {
          $this->nombre=$nombre;
     }
     public function setIdcarrera($idcarrera)
     {
          $this->idcarrera=$idcarrera;
     }

     //metodos Obtener(get)
     public function getIdasignatura()
     {
          return $this->idasignatura;
     }
     public function getCorrelativo()
     {
          return $this->correlativo;
     }
     public function getNombre()
     {
          return $this->nombre;
     }
     public function getIdcarrera()
     {
          return $this->idcarrera;
     }

     //metodo generador de listado
     public function getListadoAsignaturas()
     {
          return $this->conexionAsignatura->listaLlaves("correlativo", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarAsignatura($valor)
     {
          return $this->conexionAsignatura->buscar($valor,"correlativo", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertAsignatura()
     {
           $atributos=array( $this->correlativo , $this->nombre , $this->idcarrera );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idasignatura , $this->correlativo , $this->nombre , $this->idcarrera );

          return $this->conexionAsignatura->insertarRegistro($atributos);
     }
     public function updateAsignatura()
     {
          $atributos=array( $this->correlativo , $this->nombre , $this->idcarrera );
          return $this->conexionAsignatura->actualizarRegistro($this->idasignatura,$atributos);
     }
}
?> 