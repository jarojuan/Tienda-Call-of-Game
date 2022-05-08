<?php 

session_start();


// Si la información llega mediante post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require '../funciones/funciones.php';
    require '../vendor/autoload.php';

    $persona = new Jaro\Usuario;
    // Se guarda la clase usuario que está en usuario.php
    
    // Se recogen los datos de la persona
    $_params = array (
        'nombre' => $_POST['nombre'],
        'apellidos' => $_POST['apellidos'],
        'email' => $_POST['email'],
        'telefono' => $_POST['telefono'],
        'nombre_usuario' => $_POST['nombre_usuario'],
        'clave' => $_POST['clave']
    );

    // Se pasan los datos a la función que se encarga de registrar a la persona
    $persona_id = $persona-> registrar_persona($_params);

    // Se pasan los datos a la función que se encarga de registrar al nuevo usuario
    $persona_id = $persona-> registrar_usuario($_params);

    // index en el que se muestra el nombre del usuario
    header('Location: ../index.php');
        

}


?>