<?php 

session_start();

require '../funciones/funciones.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Pedido | Call of Game</title>

     <!-- Bootstrap -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <!-- Iconos -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Icono de pestaña-->
    <link rel="icon" href="../iconos/square-plus-solid.svg">

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
                    <li class="active">
                        <!--añadir numero con php al carrito-->
                        <a href="../pedidos/carrito.php" class="btn"> <span class="fa-solid fa-cart-shopping"></span> CARRITO <span class="badge"></span></a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>

    <br> <br> <br> <br>
    <div class="container" id="main">
        <div class="w-25 p-30">
            <!-- Formulario. Se envia mediante post -->
            <!-- <form action="sign_in.php" method="post"> -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">CALL OF GAME</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <fielset>
                                <br>
                                <legend>Para finalizar la compra, completa los datos:</legend>
                                <!-- Formulario. Mediante post -->
                                <form action="completar_pedido.php" method="post">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre" required>
                                    </div> 
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control" name="apellidos" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" required>
                                    </div>
                                    <!-- Botón -->
                                    <button type="submit" class="btn btn-primary btn-block">Confirmar compra</button>
                                </form>
                            </fielset>
                        </div>
                    </div>                  
                </div>            
            <!-- </form> -->
        </div>
    </div>
    
    <!-- Bootstrap js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>