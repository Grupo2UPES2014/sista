<?php
/*
* ClassCattarea.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Cattarea{
     private $idcattarea;
     private $correlativo;
     private $nombre;
     private $descripcion;
     private $estados;
     private $idcatcargo;
     //Objeto gestionador de base de datos
     private $conexionCattarea;

     public function __construct()
     {
          $atributos= array( "correlativo","nombre","descripcion","estados","idcatcargo" );
          $this->conexionCattarea = new MySQL();
          $this->conexionCattarea->setNombreTabla("cattarea");
          $this->conexionCattarea->setNombreAtributos($atributos);
          $this->conexionCattarea->setNombreLlavePrimaria("idcattarea");
     }

     public function setCattareaPorLlave($llave)
     {
          if($registro=$this->conexionCattarea->consultarRegistro($llave))
          {
               $this->idcattarea=$llave;
               $this->correlativo=$registro[0];
               $this->nombre=$registro[1];
               $this->descripcion=$registro[2];
               $this->estados=$registro[3];
               $this->idcatcargo=$registro[4];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdcattarea($idcattarea)
     {
          $this->idcattarea=$idcattarea;
     }
     public function setCorrelativo($correlativo)
     {
          $this->correlativo=$correlativo;
     }
     public function setNombre($nombre)
     {
          $this->nombre=$nombre;
     }
     public function setDescripcion($descripcion)
     {
          $this->descripcion=$descripcion;
     }
     public function setEstados($estados)
     {
          $this->estados=$estados;
     }
     public function setIdcatcargo($idcatcargo)
     {
          $this->idcatcargo=$idcatcargo;
     }

     //metodos Obtener(get)
     public function getIdcattarea()
     {
          return $this->idcattarea;
     }
     public function getCorrelativo()
     {
          return $this->correlativo;
     }
     public function getNombre()
     {
          return $this->nombre;
     }
     public function getDescripcion()
     {
          return $this->descripcion;
     }
     public function getEstados()
     {
          return $this->estados;
     }
     public function getIdcatcargo()
     {
          return $this->idcatcargo;
     }

     //metodo generador de listado
     public function getListadoCattareas()
     {
          return $this->conexionCattarea->listaLlaves("correlativo", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarCattarea($valor)
     {
          return $this->conexionCattarea->buscar($valor,"correlativo", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertCattarea()
     {
           $atributos=array( $this->correlativo , $this->nombre , $this->descripcion , $this->estados , $this->idcatcargo );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idcattarea , $this->correlativo , $this->nombre , $this->descripcion , $this->estados , $this->idcatcargo );

          return $this->conexionCattarea->insertarRegistro($atributos);
     }
     public function updateCattarea()
     {
          $atributos=array( $this->correlativo , $this->nombre , $this->descripcion , $this->estados , $this->idcatcargo );
          return $this->conexionCattarea->actualizarRegistro($this->idcattarea,$atributos);
     }
}
?> 