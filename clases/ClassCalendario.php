<?php
/*
* ClassCalendario.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Calendario{
     private $idcalendario;
     private $nombre;
     private $fechainicio;
     private $fechafinal;
     private $arancel;
     private $idcattramite;
     //Objeto gestionador de base de datos
     private $conexionCalendario;

     public function __construct()
     {
          $atributos= array( "nombre","fechainicio","fechafinal","arancel","idcattramite" );
          $this->conexionCalendario = new MySQL();
          $this->conexionCalendario->setNombreTabla("calendario");
          $this->conexionCalendario->setNombreAtributos($atributos);
          $this->conexionCalendario->setNombreLlavePrimaria("idcalendario");
     }

     public function setCalendarioPorLlave($llave)
     {
          if($registro=$this->conexionCalendario->consultarRegistro($llave))
          {
               $this->idcalendario=$llave;
               $this->nombre=$registro[0];
               $this->fechainicio=$registro[1];
               $this->fechafinal=$registro[2];
               $this->arancel=$registro[3];
               $this->idcattramite=$registro[4];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdcalendario($idcalendario)
     {
          $this->idcalendario=$idcalendario;
     }
     public function setNombre($nombre)
     {
          $this->nombre=$nombre;
     }
     public function setFechainicio($fechainicio)
     {
          $this->fechainicio=$fechainicio;
     }
     public function setFechafinal($fechafinal)
     {
          $this->fechafinal=$fechafinal;
     }
     public function setArancel($arancel)
     {
          $this->arancel=$arancel;
     }
     public function setIdcattramite($idcattramite)
     {
          $this->idcattramite=$idcattramite;
     }

     //metodos Obtener(get)
     public function getIdcalendario()
     {
          return $this->idcalendario;
     }
     public function getNombre()
     {
          return $this->nombre;
     }
     public function getFechainicio()
     {
          return $this->fechainicio;
     }
     public function getFechafinal()
     {
          return $this->fechafinal;
     }
     public function getArancel()
     {
          return $this->arancel;
     }
     public function getIdcattramite()
     {
          return $this->idcattramite;
     }

     //metodo generador de listado
     public function getListadoCalendarios()
     {
          return $this->conexionCalendario->listaLlaves("nombre", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarCalendario($valor)
     {
          return $this->conexionCalendario->buscar($valor,"nombre", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertCalendario()
     {
           $atributos=array( $this->nombre , $this->fechainicio , $this->fechafinal , $this->arancel , $this->idcattramite );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idcalendario , $this->nombre , $this->fechainicio , $this->fechafinal , $this->arancel , $this->idcattramite );

          return $this->conexionCalendario->insertarRegistro($atributos);
     }
     public function updateCalendario()
     {
          $atributos=array( $this->nombre , $this->fechainicio , $this->fechafinal , $this->arancel , $this->idcattramite );
          return $this->conexionCalendario->actualizarRegistro($this->idcalendario,$atributos);
     }
}
?> 