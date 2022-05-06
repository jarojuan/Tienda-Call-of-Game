<?php 

session_start();

// Limpia la sesión al pasarle un array vacio
$_SESSION['usuario_info'] = array();
// Dirige a la página inicial
header('Location: ../index.php');

?>