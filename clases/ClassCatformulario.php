<?php
/*
* ClassCatformulario.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Catformulario{
     private $idcatformulario;
     private $estructura;
     //Objeto gestionador de base de datos
     private $conexionCatformulario;

     public function __construct()
     {
          $atributos= array( "estructura" );
          $this->conexionCatformulario = new MySQL();
          $this->conexionCatformulario->setNombreTabla("catformulario");
          $this->conexionCatformulario->setNombreAtributos($atributos);
          $this->conexionCatformulario->setNombreLlavePrimaria("idcatformulario");
     }

     public function setCatformularioPorLlave($llave)
     {
          if($registro=$this->conexionCatformulario->consultarRegistro($llave))
          {
               $this->idcatformulario=$llave;
               $this->estructura=$registro[0];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdcatformulario($idcatformulario)
     {
          $this->idcatformulario=$idcatformulario;
     }
     public function setEstructura($estructura)
     {
          $this->estructura=$estructura;
     }

     //metodos Obtener(get)
     public function getIdcatformulario()
     {
          return $this->idcatformulario;
     }
     public function getEstructura()
     {
          return $this->estructura;
     }

     //metodo generador de listado
     public function getListadoCatformularios()
     {
          return $this->conexionCatformulario->listaLlaves("estructura", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarCatformulario($valor)
     {
          return $this->conexionCatformulario->buscar($valor,"estructura", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertCatformulario()
     {
           $atributos=array( $this->estructura );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idcatformulario , $this->estructura );

          return $this->conexionCatformulario->insertarRegistro($atributos);
     }
     public function updateCatformulario()
     {
          $atributos=array( $this->estructura );
          return $this->conexionCatformulario->actualizarRegistro($this->idcatformulario,$atributos);
     }
}
?> 