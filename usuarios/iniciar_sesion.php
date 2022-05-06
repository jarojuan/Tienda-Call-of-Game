<?php 

session_start();

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
    <link rel="icon" href="../iconos/arrow-right-to-bracket-solid.svg">

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
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="../consolas/ps4.php" class="btn">PS4 </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="../consolas/xone.php" class="btn">XONE </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="../consolas/switch.php" class="btn">SWITCH </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <!--añadir numero con php al carrito-->
                        <a href="../pedidos/carrito.php" class="btn"> <span class="fa-solid fa-cart-shopping"></span> CARRITO <span class="badge">0</span></a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                    <a href="registrar.php" class="btn">REGISTRARSE </a>        
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="active">
                    <a href="iniciar_sesion.php" class="btn">INICIAR SESIÓN</a>          
                    </li> 
                </ul> 
            </div>
        </div>
    </nav>

    <br> <br> <br> <br>
    <div class="container" id="main">
        <div class="w-25 p-30">
            <!-- Formulario. Se envia mediante post -->
            <form action="login.php" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">CALL OF GAME</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                          <label>Usuario</label>
                          <input type="text" class="form-control" name="nombre_usuario" placeholder="Usuario" required>
                        </div> 
                        <div class="form-group">
                          <label>Contraseña</label>
                          <input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" data-target="#exampleModal">LOGIN</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

    

    <!-- Bootstrap js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>