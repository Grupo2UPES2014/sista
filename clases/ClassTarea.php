<?php
/*
* ClassTarea.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Tarea{
     private $idtarea;
     private $estado;
     private $observaciones;
     private $fechainicio;
     private $fechafin;
     private $idtramite;
     private $idempleado;
     private $idcattarea;
     //Objeto gestionador de base de datos
     private $conexionTarea;

     public function __construct()
     {
          $atributos= array( "estado","observaciones","fechainicio","fechafin","idtramite","idempleado","idcattarea" );
          $this->conexionTarea = new MySQL();
          $this->conexionTarea->setNombreTabla("tarea");
          $this->conexionTarea->setNombreAtributos($atributos);
          $this->conexionTarea->setNombreLlavePrimaria("idtarea");
     }

     public function setTareaPorLlave($llave)
     {
          if($registro=$this->conexionTarea->consultarRegistro($llave))
          {
               $this->idtarea=$llave;
               $this->estado=$registro[0];
               $this->observaciones=$registro[1];
               $this->fechainicio=$registro[2];
               $this->fechafin=$registro[3];
               $this->idtramite=$registro[4];
               $this->idempleado=$registro[5];
               $this->idcattarea=$registro[6];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdtarea($idtarea)
     {
          $this->idtarea=$idtarea;
     }
     public function setEstado($estado)
     {
          $this->estado=$estado;
     }
     public function setObservaciones($observaciones)
     {
          $this->observaciones=$observaciones;
     }
     public function setFechainicio($fechainicio)
     {
          $this->fechainicio=$fechainicio;
     }
     public function setFechafin($fechafin)
     {
          $this->fechafin=$fechafin;
     }
     public function setIdtramite($idtramite)
     {
          $this->idtramite=$idtramite;
     }
     public function setIdempleado($idempleado)
     {
          $this->idempleado=$idempleado;
     }
     public function setIdcattarea($idcattarea)
     {
          $this->idcattarea=$idcattarea;
     }

     //metodos Obtener(get)
     public function getIdtarea()
     {
          return $this->idtarea;
     }
     public function getEstado()
     {
          return $this->estado;
     }
     public function getObservaciones()
     {
          return $this->observaciones;
     }
     public function getFechainicio()
     {
          return $this->fechainicio;
     }
     public function getFechafin()
     {
          return $this->fechafin;
     }
     public function getIdtramite()
     {
          return $this->idtramite;
     }
     public function getIdempleado()
     {
          return $this->idempleado;
     }
     public function getIdcattarea()
     {
          return $this->idcattarea;
     }

     //metodo generador de listado
     public function getListadoTareas()
     {
          return $this->conexionTarea->listaLlaves("estado", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarTarea($valor)
     {
          return $this->conexionTarea->buscar($valor,"estado", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertTarea()
     {
           $atributos=array( $this->estado , $this->observaciones , $this->fechainicio , $this->fechafin , $this->idtramite , $this->idempleado , $this->idcattarea );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idtarea , $this->estado , $this->observaciones , $this->fechainicio , $this->fechafin , $this->idtramite , $this->idempleado , $this->idcattarea );

          return $this->conexionTarea->insertarRegistro($atributos);
     }
     public function updateTarea()
     {
          $atributos=array( $this->estado , $this->observaciones , $this->fechainicio , $this->fechafin , $this->idtramite , $this->idempleado , $this->idcattarea );
          return $this->conexionTarea->actualizarRegistro($this->idtarea,$atributos);
     }
}
?> 