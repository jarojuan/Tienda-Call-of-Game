<?php 

session_start();

// Si la información llega mediante post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../funciones/funciones.php';
    require '../vendor/autoload.php';

    // Si existe la sesion y no está vacia
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        // Clase cliente
        $cliente = new Jaro\Usuario;
        //Se recogen los datos del cliente
        $_params = array (
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono']
        );

        // Se registra al cliente
        $usuario_id = $cliente-> registrar_persona($_params);

        // Clase pedido
        $pedido = new Jaro\Pedido;

        // Se recogen los datos del pedido
        $_params = array (
            'usuario_id' => $usuario_id,
            // El total se saca de la función calcular total que se encuentra en funciones.php
            'total' => calcularTotal(),
            //La fecha se saca de la función date (predeterminada en php) en formato año-mes-dia porque es el usado en sql
            'fecha' => date('Y-m-d')
        );

        // Se registra el pedido
        $pedido_id = $pedido -> registrar($_params);

        foreach($_SESSION['carrito'] as $indice => $value) {
            $_params = array (
                'pedido_id' => $pedido_id,
                'juego_id' => $value['id'],
                'precio' => $value['precio'],
                'cantidad' => $value['cantidad']
            );
            // Se registra el detalle del pedido
            $pedido->registrarDetalle($_params);
        }

        // Se limpia la sesión? llamando a un array vacio
        $_SESSION['carrito'] = array();

        // Dirige al archivo que confirma la compra
        header('Location: gracias.php');


    }


}

?>