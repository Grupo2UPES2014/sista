<?php
/*
* ClassTramite.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Tramite{
     private $idtramite;
     private $estado;
     private $fechainicio;
     private $fechafin;
     private $idestudiante;
     private $idcattramite;
     //Objeto gestionador de base de datos
     private $conexionTramite;

     public function __construct()
     {
          $atributos= array( "estado","fechainicio","fechafin","idestudiante","idcattramite" );
          $this->conexionTramite = new MySQL();
          $this->conexionTramite->setNombreTabla("tramite");
          $this->conexionTramite->setNombreAtributos($atributos);
          $this->conexionTramite->setNombreLlavePrimaria("idtramite");
     }

     public function setTramitePorLlave($llave)
     {
          if($registro=$this->conexionTramite->consultarRegistro($llave))
          {
               $this->idtramite=$llave;
               $this->estado=$registro[0];
               $this->fechainicio=$registro[1];
               $this->fechafin=$registro[2];
               $this->idestudiante=$registro[3];
               $this->idcattramite=$registro[4];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdtramite($idtramite)
     {
          $this->idtramite=$idtramite;
     }
     public function setEstado($estado)
     {
          $this->estado=$estado;
     }
     public function setFechainicio($fechainicio)
     {
          $this->fechainicio=$fechainicio;
     }
     public function setFechafin($fechafin)
     {
          $this->fechafin=$fechafin;
     }
     public function setIdestudiante($idestudiante)
     {
          $this->idestudiante=$idestudiante;
     }
     public function setIdcattramite($idcattramite)
     {
          $this->idcattramite=$idcattramite;
     }

     //metodos Obtener(get)
     public function getIdtramite()
     {
          return $this->idtramite;
     }
     public function getEstado()
     {
          return $this->estado;
     }
     public function getFechainicio()
     {
          return $this->fechainicio;
     }
     public function getFechafin()
     {
          return $this->fechafin;
     }
     public function getIdestudiante()
     {
          return $this->idestudiante;
     }
     public function getIdcattramite()
     {
          return $this->idcattramite;
     }

     //metodo generador de listado
     public function getListadoTramites()
     {
          return $this->conexionTramite->listaLlaves("estado", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarTramite($valor)
     {
          return $this->conexionTramite->buscar($valor,"estado", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertTramite()
     {
           $atributos=array( $this->estado , $this->fechainicio , $this->fechafin , $this->idestudiante , $this->idcattramite );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idtramite , $this->estado , $this->fechainicio , $this->fechafin , $this->idestudiante , $this->idcattramite );

          return $this->conexionTramite->insertarRegistro($atributos);
     }
     public function updateTramite()
     {
          $atributos=array( $this->estado , $this->fechainicio , $this->fechafin , $this->idestudiante , $this->idcattramite );
          return $this->conexionTramite->actualizarRegistro($this->idtramite,$atributos);
     }
}
?> 