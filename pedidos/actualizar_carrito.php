<?php 

    session_start();

    //Si se pasan datos usando el metodo post
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        require '../funciones/funciones.php';
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];

        //Si la cantidad es un numero
        if (is_numeric($cantidad)) {
            //Si existe el juego en el carrito
            if (array_key_exists($id, $_SESSION['carrito'])) {
                //Se actualiza la cantidad mediante la función actualizarJuego()
                actualizarJuego($id, $cantidad);
            }           
        }
        //Nos direcciona a carrito.php cuando clicamos el botón de actualizar
        header ('Location: carrito.php');
    }

?>