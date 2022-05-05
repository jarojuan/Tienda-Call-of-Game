<?php 

namespace Jaro;

class Genero{
    
    private $config;
    private $cn = null;

    // Conexión con la base de datos
    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));     
    }

    //  Consulta para mostrar todos los géneros.
    public function mostrar() {
        $sql = "SELECT * FROM genero";
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