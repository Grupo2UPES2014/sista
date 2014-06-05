<?php
/*
* ClassUsuario.php
* version 1.0
* Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
* [Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
*
*/
class Usuario{
     private $idusuario;
     private $contrasena;
     private $correo;
     private $tipo;
     private $estado;
     //Objeto gestionador de base de datos
     private $conexionUsuario;

     public function __construct()
     {
          $atributos= array( "contrasena","correo","tipo","estado" );
          $this->conexionUsuario = new MySQL();
          $this->conexionUsuario->setNombreTabla("usuario");
          $this->conexionUsuario->setNombreAtributos($atributos);
          $this->conexionUsuario->setNombreLlavePrimaria("idusuario");
     }

     public function setUsuarioPorLlave($llave)
     {
          if($registro=$this->conexionUsuario->consultarRegistro($llave))
          {
               $this->idusuario=$llave;
               $this->contrasena=$registro[0];
               $this->correo=$registro[1];
               $this->tipo=$registro[2];
               $this->estado=$registro[3];
               return true;
          }
          else
          {
               return false;
          }
     }

     //metodos Establecer(set)
     public function setIdusuario($idusuario)
     {
          $this->idusuario=$idusuario;
     }
     public function setContrasena($contrasena)
     {
          $this->contrasena=$contrasena;
     }
     public function setCorreo($correo)
     {
          $this->correo=$correo;
     }
     public function setTipo($tipo)
     {
          $this->tipo=$tipo;
     }
     public function setEstado($estado)
     {
          $this->estado=$estado;
     }

     //metodos Obtener(get)
     public function getIdusuario()
     {
          return $this->idusuario;
     }
     public function getContrasena()
     {
          return $this->contrasena;
     }
     public function getCorreo()
     {
          return $this->correo;
     }
     public function getTipo()
     {
          return $this->tipo;
     }
     public function getEstado()
     {
          return $this->estado;
     }

     //metodo generador de listado
     public function getListadoUsuarios()
     {
          return $this->conexionUsuario->listaLlaves("contrasena", "ASC");
     }

     //metodo buscador de coincidencias
     public function buscarUsuario($valor)
     {
          return $this->conexionUsuario->buscar($valor,"contrasena", "ASC");
     }

     //metodos relacionados a la base de datos
     public function insertUsuario()
     {
           $atributos=array( $this->contrasena , $this->correo , $this->tipo , $this->estado );
          //descomentarear la línea siguiente y comentarear la anterior si la llave primaria no es autoincremental
          //$atributos=array( $this->idusuario , $this->contrasena , $this->correo , $this->tipo , $this->estado );

          return $this->conexionUsuario->insertarRegistro($atributos);
     }
     public function updateUsuario()
     {
          $atributos=array( $this->contrasena , $this->correo , $this->tipo , $this->estado );
          return $this->conexionUsuario->actualizarRegistro($this->idusuario,$atributos);
     }
}
?> 