<?php 

// Si la información llega mediante post
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Recogen el nombre de usuario y la clave introducidas
    $nombre_usuario = $_POST['nombre_usuario'];
    $clave = $_POST['clave'];

    require '../vendor/autoload.php';
    // Recoge la clase Usuario
    $usuario = new Jaro\Usuario;
    // Se pasan el nombre de usuario y la contraseña a la función login()
    $resultado = $usuario -> login($nombre_usuario, $clave);
    // Se pasan el nombre de usuario y la contraseña a la función login_cliente()
    $resultado_cliente = $usuario -> login_cliente($nombre_usuario, $clave);

    // Si el usuario administrador existe en la base de datos
    if ($resultado) {
        session_start();
        $_SESSION['usuario_info'] = array(
            'nombre_usuario' => $resultado['nombre_usuario'],
            'estado'=>1,    //1 sesion activa, 0 no
        );
        // Dirige al panel del administrador
        header('Location: control.php');

    // Si el usuario cliente existe en la base de datos
    }elseif($resultado_cliente){
        session_start();
        $_SESSION['usuario_info'] = array(
            'nombre_usuario' => $resultado_usuario['nombre_usuario'],
            'estado'=>1,    //1 sesion activa, 0 no
        );

        header('Location: ../index_usuario.php');
    }else{
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login | Call of Game</title>
                <!-- Bootstrap -->
                <link rel="stylesheet" href="../css/bootstrap.min.css">
                <!-- <link rel="stylesheet" href="css/estilos.css"> -->
                <!-- Iconos -->
                <link rel="stylesheet" href="../css/all.min.css">
                <!--Icono de pestaña-->
                <link rel="icon" href="../iconos/xmark-solid.svg">
            </head>
            <body>
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <!--Botón de menu responsive-->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="../index.php">Call of game <i class="fa-solid fa-gamepad"></i></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <!-- Elementos del nav -->                       
                            <ul class="nav navbar-nav pull-right">
                                <li>
                                <a href="registrar.php" class="btn">REGISTRARSE </a>        
                                </li> 
                            </ul>                      
                        </div>
                    </div>
                </nav>
                <br><br><br>
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">ERROR <i class="fa-solid fa-triangle-exclamation"></i></h4>
                        <p>El usuario o la contraseña introducidos son incorrectos</p>
                        <hr>
                        <p class="mb-0">Vuelve a iniciar sesión o, si lo deseas, puedes registrarte en nuestra página web</p>
                    </div>
                    
                    <!-- Botones -->
                    <div>
                        <a href="../index.php" class="btn btn-primary">Salir</a>
                        <a href="iniciar_sesion.php" class="btn btn-info">Iniciar Sesión</a>                      
                    </div>                  
                </div>
            </body>
            </html>
        
    <?php 
    // Llave del else
    }
// Llave del if
}

?>