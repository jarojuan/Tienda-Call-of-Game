<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Call of Game</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <!-- Iconos -->
    <link rel="stylesheet" href="css/all.min.css">
    <!--Icono de pestaña-->
    <link rel="icon" href="iconos/icon-gamepad.svg">

</head>
<body>
    <!-- Barra de navegación -->
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
                <a class="navbar-brand" href="index.php">Call of game <i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <!-- Elementos del nav -->
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="ps4.php" class="btn">PS4 </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="xbox.php" class="btn">XONE </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="switch.php" class="btn">SWITCH </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <!--añadir numero con php al carrito-->
                        <a href="carrito.php" class="btn">CARRITO <span class="badge">0</span></a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                    <a href="finalizar_compra.php" class="btn">REGISTRARSE </a>        
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                    <a href="panel/index.php" class="btn">INICIAR SESIÓN</a>          
                    </li> 
                </ul> 
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    
</body>
</html>