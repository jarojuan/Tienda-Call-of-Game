<?php 

namespace Jaro;

class Pedido {

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    // Registrar pedido
    public function registrar($_params){
        // Consulta para insertar los datos en la tabla pedidos
        $sql= "INSERT INTO `pedidos`(`usuario_id`, `total`, `fecha`) VALUES (:usuario_id, :total, :fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":usuario_id" => $_params['usuario_id'],
            ":total" => $_params['total'],
            ":fecha" => $_params['fecha'],
        );

        if($resultado->execute($_array)){
            // Devuelve el ultimo id que se ha insertado, es decir, el id del cliente actual
            return $this->cn->lastInsertId();
        }else{
            return false;
        }
    }

    // Registrar los detalles del pedido
    public function registrarDetalle($_params){
        // Consulta para insertar los datos en la tabla detalle_pedido
        $sql= "INSERT INTO `detalle_pedido`(`pedido_id`, `juego_id`, `precio`, `cantidad`) 
        VALUES (:pedido_id, :juego_id, :precio, :cantidad)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":pedido_id" => $_params['pedido_id'],
            ":juego_id" => $_params['juego_id'],
            ":precio" => $_params['precio'],
            ":cantidad" => $_params['cantidad'],
        );

        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    // Mostrar pedidos realizados
    public function mostrar(){
        // Muestra la información de los clientes y el precio total de los pedidos que han hecho, ordenados de froma descendente por su id
        $sql= "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p INNER JOIN persona per ON p.usuario_id = per.id ORDER BY p.id DESC";

        $resultado = $this -> cn -> prepare($sql);

        if($resultado->execute()){
            return $resultado->fetchAll();
        }else{
            return false;
        }
    }

    // Mostrar ordenados los ultimos 10 pedidos realizados
    public function mostrarUltimos(){
        $sql= "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p INNER JOIN persona c ON p.usuario_id = c.id ORDER BY p.id DESC LIMIT 10";

        $resultado = $this -> cn -> prepare($sql);

        if($resultado->execute()){
            return $resultado->fetchAll();
        }else{
            return false;
        }
    }

    // Mostrar pedidos por su id
    public function mostrarPorId($id){
        $sql=  "SELECT p.id, nombre, apellidos, email, total, fecha 
                FROM pedidos p 
                INNER JOIN persona c ON p.usuario_id = c.id WHERE p.id= :id";

        $resultado = $this -> cn -> prepare($sql);

        $_array = array(
            // Se pasa el parámetro $id a :id para usarlo en la consulta
            ':id' => $id
        );

        // Se pasa el array como parámetro para que devuelva el id
        if($resultado->execute($_array)){
            // fetch recoge un solo resgistro
            return $resultado->fetch();
        }else{
            return false;
        }
    }

    // Mostrar detalles de un pedido 
    public function mostrarDetallePorIdPedido($id){
        // Consulta que muestra el detalle de un pedido cuando coincide con el id que le pasamos 
        $sql=  "SELECT dp.id, pe.titulo, dp.precio, dp.cantidad, pe.foto
                FROM detalle_pedido dp 
                INNER JOIN juegos pe ON pe.id=dp.juego_id
                WHERE dp.pedido_id = :id";

        $resultado = $this -> cn -> prepare($sql);

        $_array = array(
            ':id' => $id
        );

        if($resultado->execute($_array)){
            return $resultado->fetchAll();
        }else{
            return false;
        }
    }

}

?>