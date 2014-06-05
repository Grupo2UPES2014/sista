<?php
/*
* ClassCuenta.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Cuenta{
     private $idcuenta;
     private $descripcion;
     //Objeto gestionador de base de datos
     private $conexionCuenta;

     public function __construct()
     {
          $atributos= array( "descripcion" );
          $this->conexionCuenta = new MySQL();
          $this->conexionCuenta->setNombreTabla("cuenta");
          $this->conexionCuenta->setNombreAtributos($atributos);
          $this->conexionCuenta->setNombreLlavePrimaria("idcuenta");
     }

     public function setCuentaPorLlave($llave)
     {
          if($registro=$this->conexionCuenta->consultarRegistro($llave))
          {
               $this->idcuenta=$llave;
               $this->descripcion=$registro[0];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdcuenta($idcuenta)
     {
          $this->idcuenta=$idcuenta;
     }
     public function setDescripcion($descripcion)
     {
          $this->descripcion=$descripcion;
     }

     //metodos Obtener(get)
     public function getIdcuenta()
     {
          return $this->idcuenta;
     }
     public function getDescripcion()
     {
          return $this->descripcion;
     }

     //metodo generador de listado
     public function getListadoCuentas()
     {
          return $this->conexionCuenta->listaLlaves("descripcion", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarCuenta($valor)
     {
          return $this->conexionCuenta->buscar($valor,"descripcion", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertCuenta()
     {
           $atributos=array( $this->descripcion );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idcuenta , $this->descripcion );

          return $this->conexionCuenta->insertarRegistro($atributos);
     }
     public function updateCuenta()
     {
          $atributos=array( $this->descripcion );
          return $this->conexionCuenta->actualizarRegistro($this->idcuenta,$atributos);
     }
}
?> 