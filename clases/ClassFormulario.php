<?php
/*
* ClassFormulario.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Formulario{
     private $idformulario;
     private $respuestas;
     private $idtarea;
     private $idcatformulario;
     //Objeto gestionador de base de datos
     private $conexionFormulario;

     public function __construct()
     {
          $atributos= array( "respuestas","idtarea","idcatformulario" );
          $this->conexionFormulario = new MySQL();
          $this->conexionFormulario->setNombreTabla("formulario");
          $this->conexionFormulario->setNombreAtributos($atributos);
          $this->conexionFormulario->setNombreLlavePrimaria("idformulario");
     }

     public function setFormularioPorLlave($llave)
     {
          if($registro=$this->conexionFormulario->consultarRegistro($llave))
          {
               $this->idformulario=$llave;
               $this->respuestas=$registro[0];
               $this->idtarea=$registro[1];
               $this->idcatformulario=$registro[2];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdformulario($idformulario)
     {
          $this->idformulario=$idformulario;
     }
     public function setRespuestas($respuestas)
     {
          $this->respuestas=$respuestas;
     }
     public function setIdtarea($idtarea)
     {
          $this->idtarea=$idtarea;
     }
     public function setIdcatformulario($idcatformulario)
     {
          $this->idcatformulario=$idcatformulario;
     }

     //metodos Obtener(get)
     public function getIdformulario()
     {
          return $this->idformulario;
     }
     public function getRespuestas()
     {
          return $this->respuestas;
     }
     public function getIdtarea()
     {
          return $this->idtarea;
     }
     public function getIdcatformulario()
     {
          return $this->idcatformulario;
     }

     //metodo generador de listado
     public function getListadoFormularios()
     {
          return $this->conexionFormulario->listaLlaves("respuestas", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarFormulario($valor)
     {
          return $this->conexionFormulario->buscar($valor,"respuestas", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertFormulario()
     {
           $atributos=array( $this->respuestas , $this->idtarea , $this->idcatformulario );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idformulario , $this->respuestas , $this->idtarea , $this->idcatformulario );

          return $this->conexionFormulario->insertarRegistro($atributos);
     }
     public function updateFormulario()
     {
          $atributos=array( $this->respuestas , $this->idtarea , $this->idcatformulario );
          return $this->conexionFormulario->actualizarRegistro($this->idformulario,$atributos);
     }
}
?> 