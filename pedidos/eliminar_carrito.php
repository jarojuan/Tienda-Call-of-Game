<?php 

session_start();



//Si existe la sesión
if (isset($_SESSION['carrito'])) {
    // Guarda el id del juego
    $id = $_GET['id'];
    //Elimina el producto del carrito que tenga el id pasado
    unset($_SESSION['carrito'][$id]);
    //Dirige a carrito.php al eliminar
    header('Location: carrito.php');
}else{
    //Si no existe ese id
    header('Location: ../index.php');
}

?>