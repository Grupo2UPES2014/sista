<?php
/*
* ClassFacultad.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Facultad{
     private $idfacultad;
     private $nombre;
     //Objeto gestionador de base de datos
     private $conexionFacultad;

     public function __construct()
     {
          $atributos= array( "nombre" );
          $this->conexionFacultad = new MySQL();
          $this->conexionFacultad->setNombreTabla("facultad");
          $this->conexionFacultad->setNombreAtributos($atributos);
          $this->conexionFacultad->setNombreLlavePrimaria("idfacultad");
     }

     public function setFacultadPorLlave($llave)
     {
          if($registro=$this->conexionFacultad->consultarRegistro($llave))
          {
               $this->idfacultad=$llave;
               $this->nombre=$registro[0];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdfacultad($idfacultad)
     {
          $this->idfacultad=$idfacultad;
     }
     public function setNombre($nombre)
     {
          $this->nombre=$nombre;
     }

     //metodos Obtener(get)
     public function getIdfacultad()
     {
          return $this->idfacultad;
     }
     public function getNombre()
     {
          return $this->nombre;
     }

     //metodo generador de listado
     public function getListadoFacultads()
     {
          return $this->conexionFacultad->listaLlaves("nombre", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarFacultad($valor)
     {
          return $this->conexionFacultad->buscar($valor,"nombre", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertFacultad()
     {
           $atributos=array( $this->nombre );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idfacultad , $this->nombre );

          return $this->conexionFacultad->insertarRegistro($atributos);
     }
     public function updateFacultad()
     {
          $atributos=array( $this->nombre );
          return $this->conexionFacultad->actualizarRegistro($this->idfacultad,$atributos);
     }
}
?> 