<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <!-- Iconos -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Icono de pestaña-->
    <link rel="icon" href="../iconos/icon-settings.svg">
    <title>Control | Call of Game</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!--Enlace en el nombre (icono)-->
                <a class="navbar-brand" href="control.php">Call of Game <i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <!-- Crear archivo de pedidos -->
                        <a href="../pedidos/control_pedidos.php" class="btn">PEDIDOS</a>
                    </li> 
                    <li>
                    <a href="../juegos/control_juegos.php" class="btn">JUEGOS</a>
                    </li> 
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION['usuario_info']['nombre_usuario']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!-- Crear archivo de cerrar sesión y mostrar nombre de usuario -->
                            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <!-- Información inicial -->
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">PANEL DE ADMINISTRADOR <i class="fa-solid fa-gear"></i></h4>
            <p>Aquí podrás ver los pedidos relizados</p>
            <br>
            <p class="mb-0">Y editar los juegos, si es necesario algún cambio</p>        
        </div>

        <!-- Lista de pedidos -->
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <legend>Listado de los últimos 10 pedidos</legend>
                    <table class="table table-bordered">
                        <!-- Cabecera de la tabla -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Nº de Pedido</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </fieldset>
            </div>
        </div>
                    
                         
    </div>

    <!-- Bootstrap js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>