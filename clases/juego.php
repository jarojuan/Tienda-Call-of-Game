<?php 

// El namespace se usa para llamar a las clases usanod composer
namespace Jaro;

class Pelicula {

    private $config;
    private $cn = null;

    // Conexión con la base de datos mediante el archivo config.ini
    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));     
    }

    // Consulta para insertar nuevos juegos
    public function registrar($_params){
        $sql = "INSERT INTO `juegos`(`titulo`, `descripcion`, `foto`, `precio`, `genero_id`, `fecha`) 
        VALUES (:titulo,:descripcion,:foto,:precio,:genero_id,:fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":genero_id" => $_params['genero_id'],
            ":fecha" => $_params['fecha'],
        );

        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    // Consulta para actualizar los juegos registrados.
    public function actualizar($_params){
        $sql = "UPDATE `juegos` SET `titulo`=:titulo,`descripcion`=:descripcion,`foto`=:foto,`precio`=:precio,`genero_id`=:genero_id,`fecha`=:fecha  WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":genero_id" => $_params['genero_id'],
            ":fecha" => $_params['fecha'],
            ":id" =>  $_params['id']
        );

        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    // Consulta para eliminar un juego registrado
    public function eliminar($id){
        $sql = "DELETE FROM `peliculas` WHERE `id`=:id ";

        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    // Consulta para mostrar los datos de los juegos registrados
    public function mostrar(){
        $sql = "SELECT juegos.id, titulo, descripcion, foto, nombre, precio, fecha, estado FROM juegos 
        
        INNER JOIN categorias
        ON juegos.categoria_id = categorias.id ORDER BY juegos.id DESC
        ";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute()){
            return $resultado->fetchAll();
        }else{
            return false;
        }
    }

    // Consulta para mostrar un juego por su id
    public function mostrarPorId($id){    
        $sql = "SELECT * FROM `juegos` WHERE `id`=:id ";      
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array)){
            return $resultado->fetch();
        }else{
            return false;
        }
    }

}


?>