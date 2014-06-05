<?php
/*
* ClassEstudiante.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Estudiante{
     private $idestudiante;
     private $nombres;
     private $apellido1;
     private $apellido2;
     private $tipoingreso;
     private $estatus;
     private $nui;
     private $idusuario;
     private $idcarrera;
     //Objeto gestionador de base de datos
     private $conexionEstudiante;

     public function __construct()
     {
          $atributos= array( "nombres","apellido1","apellido2","tipoingreso","estatus","nui","idusuario","idcarrera" );
          $this->conexionEstudiante = new MySQL();
          $this->conexionEstudiante->setNombreTabla("estudiante");
          $this->conexionEstudiante->setNombreAtributos($atributos);
          $this->conexionEstudiante->setNombreLlavePrimaria("idestudiante");
     }

     public function setEstudiantePorLlave($llave)
     {
          if($registro=$this->conexionEstudiante->consultarRegistro($llave))
          {
               $this->idestudiante=$llave;
               $this->nombres=$registro[0];
               $this->apellido1=$registro[1];
               $this->apellido2=$registro[2];
               $this->tipoingreso=$registro[3];
               $this->estatus=$registro[4];
               $this->nui=$registro[5];
               $this->idusuario=$registro[6];
               $this->idcarrera=$registro[7];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdestudiante($idestudiante)
     {
          $this->idestudiante=$idestudiante;
     }
     public function setNombres($nombres)
     {
          $this->nombres=$nombres;
     }
     public function setApellido1($apellido1)
     {
          $this->apellido1=$apellido1;
     }
     public function setApellido2($apellido2)
     {
          $this->apellido2=$apellido2;
     }
     public function setTipoingreso($tipoingreso)
     {
          $this->tipoingreso=$tipoingreso;
     }
     public function setEstatus($estatus)
     {
          $this->estatus=$estatus;
     }
     public function setNui($nui)
     {
          $this->nui=$nui;
     }
     public function setIdusuario($idusuario)
     {
          $this->idusuario=$idusuario;
     }
     public function setIdcarrera($idcarrera)
     {
          $this->idcarrera=$idcarrera;
     }

     //metodos Obtener(get)
     public function getIdestudiante()
     {
          return $this->idestudiante;
     }
     public function getNombres()
     {
          return $this->nombres;
     }
     public function getApellido1()
     {
          return $this->apellido1;
     }
     public function getApellido2()
     {
          return $this->apellido2;
     }
     public function getTipoingreso()
     {
          return $this->tipoingreso;
     }
     public function getEstatus()
     {
          return $this->estatus;
     }
     public function getNui()
     {
          return $this->nui;
     }
     public function getIdusuario()
     {
          return $this->idusuario;
     }
     public function getIdcarrera()
     {
          return $this->idcarrera;
     }

     //metodo generador de listado
     public function getListadoEstudiantes()
     {
          return $this->conexionEstudiante->listaLlaves("nombres", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarEstudiante($valor)
     {
          return $this->conexionEstudiante->buscar($valor,"nombres", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertEstudiante()
     {
           $atributos=array( $this->nombres , $this->apellido1 , $this->apellido2 , $this->tipoingreso , $this->estatus , $this->nui , $this->idusuario , $this->idcarrera );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idestudiante , $this->nombres , $this->apellido1 , $this->apellido2 , $this->tipoingreso , $this->estatus , $this->nui , $this->idusuario , $this->idcarrera );

          return $this->conexionEstudiante->insertarRegistro($atributos);
     }
     public function updateEstudiante()
     {
          $atributos=array( $this->nombres , $this->apellido1 , $this->apellido2 , $this->tipoingreso , $this->estatus , $this->nui , $this->idusuario , $this->idcarrera );
          return $this->conexionEstudiante->actualizarRegistro($this->idestudiante,$atributos);
     }
}
?> 