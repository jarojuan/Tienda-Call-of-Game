<?php 

namespace Jaro;

class Plataforma{

    private $config;
    private $cn = null;

    // Conexión con la base de datos
    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));     
    }

    // Consulta para mostrar todas las plataformas
    public function mostrar() {
        $sql = "SELECT * FROM plataforma";
        //Resultado de la consulta
        $resultado = $this->cn->prepare($sql);
        //Si se ejecuta 
        if($resultado->execute()){
            //La función fecthAll() trae todos los registros que contenga la tabla
            return $resultado->fetchAll();
        }
        else{
            return false;
        }  
    }

    // Consulta para mostrar los juegos de PS4
    public function mostrarPS4(){
        $sql = "SELECT * FROM `juegos` WHERE plataforma_id = 1";
        //Resultado de la consulta
        $resultado = $this->cn->prepare($sql);
        //Si se ejecuta 
        if($resultado->execute()){
            //La función fecthAll() trae todos los registros que contenga la tabla
            return $resultado->fetchAll();
        }
        else{
            return false;
        }
    }

    // Consulta para mostrar los juegos de XONE
    public function mostrarXONE(){
        $sql = "SELECT * FROM `juegos` WHERE plataforma_id = 2";
        //Resultado de la consulta
        $resultado = $this->cn->prepare($sql);
        //Si se ejecuta 
        if($resultado->execute()){
            //La función fecthAll() trae todos los registros que contenga la tabla
            return $resultado->fetchAll();
        }
        else{
            return false;
        }
    }

    // Consulta para mostrar los juegos de SWITCH
    public function mostrarSWITCH(){
        $sql = "SELECT * FROM `juegos` WHERE plataforma_id = 3";
        //Resultado de la consulta
        $resultado = $this->cn->prepare($sql);
        //Si se ejecuta 
        if($resultado->execute()){
            //La función fecthAll() trae todos los registros que contenga la tabla
            return $resultado->fetchAll();
        }
        else{
            return false;
        }
    }

}

?>