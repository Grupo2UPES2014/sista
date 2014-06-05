<?php
/*
* ClassEmpleado.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Empleado{
     private $idempleado;
     private $nombres;
     private $apellido1;
     private $apellido2;
     private $idusuario;
     private $idcatcargo;
     //Objeto gestionador de base de datos
     private $conexionEmpleado;

     public function __construct()
     {
          $atributos= array( "nombres","apellido1","apellido2","idusuario","idcatcargo" );
          $this->conexionEmpleado = new MySQL();
          $this->conexionEmpleado->setNombreTabla("empleado");
          $this->conexionEmpleado->setNombreAtributos($atributos);
          $this->conexionEmpleado->setNombreLlavePrimaria("idempleado");
     }

     public function setEmpleadoPorLlave($llave)
     {
          if($registro=$this->conexionEmpleado->consultarRegistro($llave))
          {
               $this->idempleado=$llave;
               $this->nombres=$registro[0];
               $this->apellido1=$registro[1];
               $this->apellido2=$registro[2];
               $this->idusuario=$registro[3];
               $this->idcatcargo=$registro[4];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdempleado($idempleado)
     {
          $this->idempleado=$idempleado;
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
     public function setIdusuario($idusuario)
     {
          $this->idusuario=$idusuario;
     }
     public function setIdcatcargo($idcatcargo)
     {
          $this->idcatcargo=$idcatcargo;
     }

     //metodos Obtener(get)
     public function getIdempleado()
     {
          return $this->idempleado;
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
     public function getIdusuario()
     {
          return $this->idusuario;
     }
     public function getIdcatcargo()
     {
          return $this->idcatcargo;
     }

     //metodo generador de listado
     public function getListadoEmpleados()
     {
          return $this->conexionEmpleado->listaLlaves("nombres", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarEmpleado($valor)
     {
          return $this->conexionEmpleado->buscar($valor,"nombres", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertEmpleado()
     {
           $atributos=array( $this->nombres , $this->apellido1 , $this->apellido2 , $this->idusuario , $this->idcatcargo );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idempleado , $this->nombres , $this->apellido1 , $this->apellido2 , $this->idusuario , $this->idcatcargo );

          return $this->conexionEmpleado->insertarRegistro($atributos);
     }
     public function updateEmpleado()
     {
          $atributos=array( $this->nombres , $this->apellido1 , $this->apellido2 , $this->idusuario , $this->idcatcargo );
          return $this->conexionEmpleado->actualizarRegistro($this->idempleado,$atributos);
     }
}
?> 