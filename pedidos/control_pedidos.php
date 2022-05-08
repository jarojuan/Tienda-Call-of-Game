<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Pedidos | Call of Game</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Icono de pestaña-->
    <link rel="icon" href="../iconos/icon-settings.svg">

</head>

<body>
    
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!--Enlace en el nombre (icono)-->
                <a class="navbar-brand" href="../usuarios/control.php">Call of Game <i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li  class="active">
                    <a href="control_pedidos.php" class="btn">PEDIDOS</a>
                    </li> 
                    <li>
                    <a href="../juegos/control_juegos.php" class="btn">JUEGOS</a>
                    </li> 
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION['usuario_info']['nombre_usuario']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../usuarios/cerrar_sesion.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <legend>Lista de pedidos</legend>
                    <table class="table table-bordered">
                        <!-- Cabecera -->
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
                        <!-- Cuerpo -->
                        <tbody>
                            <?php                         
                                require '../vendor/autoload.php';
                                // Clase pedido
                                $pedido = new Jaro\Pedido;
                                // Función mostrar() de la clase pedido
                                $info_pedido = $pedido->mostrar();

                                // Nº de pedidos realizados
                                $cantidad = count($info_pedido);

                                // Si hay algún pedido registrado
                                if($cantidad > 0){
                                    // Nº del pedido
                                    $cont=0;

                                    for ($x=0; $x < $cantidad; $x++) { 
                                        $cont++;
                                        // Devuelve los datos de cada pedido
                                        $item = $info_pedido[$x];
                            ?>

                                        <!-- Info de los pedidos -->
                                        <tr>
                                            <!-- Nº pedido -->
                                            <td><?php print $cont ?></td>
                                            <!-- Nombre y apellidos -->
                                            <td><?php print $item['nombre'].' '.$item['apellidos'] ?></td>
                                            <!-- Id del pedido -->
                                            <td><?php print $item['id'] ?></td>
                                            <!--Precio total de la compra-->
                                            <td><?php print $item['total'] ?> €</td>
                                            <!-- Fecha de compra -->
                                            <td><?php print $item['fecha'] ?></td>

                                            <!-- Botón de ver -->
                                            <td class="text-center">
                                                <a href="ver.php?id=<?php print $item['id'] ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        

                            <?php
                                    }
                                        
                                }

                            
                            ?>
                        </tbody>
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