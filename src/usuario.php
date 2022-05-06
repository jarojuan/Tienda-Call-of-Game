<?php 

namespace Jaro;

class Usuario{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    // Iniciar sesión como admin
    public function login($nombre, $clave){
        // Consulta que muestra el nombre del administrador cuando coincida con el nombre y la clave pasadas
        $sql = "SELECT nombre_usuario FROM admin WHERE nombre_usuario = :nombre AND clave = :clave ";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":nombre" =>  $nombre,
            ":clave" =>  $clave
        );

        // Si el usuario existe en la base de datos
        if($resultado->execute($_array)){
            return $resultado->fetch();
        }else{
            return false;
        }
    }

    // Iniciar sesión como cliente
    public function login_cliente($nombre, $clave){
        // Consulta que muestra el nombre del usuario cuando coincida con el nombre y la clave pasadas
        $sql = "SELECT nombre_usuario FROM usuario WHERE nombre_usuario = :nombre AND clave = :clave ";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":nombre" =>  $nombre,
            ":clave" =>  $clave
        );

        // Si el usuario existe en la base de datos
        if($resultado->execute($_array)){
            return $resultado->fetch();
        }else{
            return false;
        }
    }


    // Registrar nueva persona
    public function registrar_persona($_params){
        // Consulta para insertar datos en la tabla persona
        $sql= "INSERT INTO `persona`(`nombre`, `apellidos`, `email`, `telefono`) VALUES (:nombre, :apellidos, :email, :telefono)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":apellidos" => $_params['apellidos'],
            ":email" => $_params['email'],
            ":telefono" => $_params['telefono'],
        );

        if($resultado->execute($_array)){
            // Devuelve el ultimo id que se ha insertado, es decir, el id de la persona actual
            return $this->cn->lastInsertId();
        }else{
            return false;
        }

    }

    // Registrar nuevo usuario
    public function registrar_usuario($_params){
        // Consulta para insertar el nombre de usuario y la contraseña
        $sql= "INSERT INTO `usuario`(`nombre_usuario`, `clave`) VALUES (:nombre_usuario, :clave)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre_usuario" => $_params['nombre_usuario'],
            ":clave" => $_params['clave'],
        );

        if($resultado->execute($_array)){
            // Devuelve el ultimo id que se ha insertado, es decir, el id del cliente actual
            return $this->cn->lastInsertId();
        }else{
            return false;
        }

    }


}

?>