<?php 

session_start();

require '../funciones/funciones.php';

// Si el id del juego que se pasa se hace mediante método get y es de tipo numerico
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Guarda el id del juego
    $id=$_GET['id'];

    require '../vendor/autoload.php';
    // Clase juego
    $juego = new Jaro\Juego;
    // Función mostrarporid
    $resultado = $juego->mostrarPorId($id);

    //Validación. Si el id pasado no existe
    if (!$resultado) {
        //Dirige a la página principal
        header('Location: ../index.php');
    }

    // Si se ha añadido algo al carrito
    if (isset($_SESSION['carrito'])) {
        // Si el juego existe en el carrito
        if(array_key_exists($id, $_SESSION['carrito'])){
            // Función actualizarJuego de funciones.php
            // Añade otro juego igual
            actualizarJuego($id);
        // Si no existe en el carrito
        }else{
            // Se añade usando la función
            agregarJuego($resultado, $id);
        }
    // Si el carrito no existe
    }else{
        agregarJuego($resultado, $id);
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito | Call of Game</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <!-- Iconos -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Icono de pestaña-->
    <link rel="icon" href="../iconos/cart-shopping-solid.svg">

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
                    <li class="active">
                        <!--añadir numero con php al carrito-->
                        <a href="carrito.php" class="btn"> <span class="fa-solid fa-cart-shopping"></span> CARRITO <span class="badge"></span></a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                    <a href="../usuarios/registrar.php" class="btn">REGISTRARSE </a>        
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                    <a href="../usuarios/iniciar_sesion.php" class="btn">INICIAR SESIÓN</a>          
                    </li> 
                </ul> 
            </div>
        </div>
    </nav>

    <br><br><br><br>
    <div class="container">
        <!-- Tabla -->
        <table class="table table-bordered table-hover">
            <!-- Cabecera -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pelicula</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>           
                    <th></th>
                </tr>
            </thead>
            <!-- Cuerpo -->
            <tbody>
                <?php 
                
                // Se declara la variable que contendrá el valor total del carrito
                $total_pedido = 0;
                    // Si existe la sesion y no esta vacia 
                    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                        $c=0;
                        
                        // Uso foreach porque los índices no son consecutivos
                        foreach ($_SESSION['carrito'] as $indice => $value) {
                            $c++;
                            //El coste total de los juegos
                            $total = $value['precio'] * $value['cantidad'];
                            // Se va sumando el precio de los juegos
                            $total_pedido += $total;
                ?>

                            <tr>
                                <!-- Formulario para actualizar la cantidad de juegos -->
                                <form action="actualizar_carrito.php" method="post">
                                    <!-- Indice -->
                                    <td><?php print $c ?></td>
                                    <!-- Titulo -->
                                    <td><?php print $value['titulo'] ?></td>
                                    <!-- Foto -->
                                    <td>
                                        <?php
                                        $foto = '../img/'.$value['foto'];
                                        //Si el juego tiene foto
                                        if (file_exists($foto)) {
                                        ?>
                                            <img src="<?php print $foto; ?>" width="35">                   
                                        <?php 
                                        }else{ 
                                        ?>
                                            X 
                                        <?php 
                                        } 
                                        ?>
                                    </td>
                                    <!-- Precio -->
                                    <td><?php print $value['precio'] ?> €</td>
                                    <!-- Id (oculto) -->
                                    <td>
                                        <input type="hidden" name="id" class="form-control u-size-100" value="<?php print $value['id'] ?>">
                                        <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                                    </td>
                                    <!-- Coste de los juegos -->
                                    <td>
                                        <?php print $total ?> €
                                    </td>

                                    <!-- Botones -->
                                    <td>
                                        <!-- Actualizar cantidad -->
                                        <button type="submit" class="btn btn-success btn-xs">
                                        <i class="fa-solid fa-arrows-rotate"></i>
                                        </button>
                                        <!-- Eliminar -->
                                        <a href="eliminar_carrito.php?id=<?php print $value['id'] ?>" class="btn btn-danger btn-xs">
                                        <span class="fa-solid fa-trash-can"></span>
                                        </a>
                                    </td>
                                </form>
                            </tr>
                        
                        <?php 
                        // Llave del foreach
                        }
                    // Llave del if
                    }else{
                        ?>
                        <tr>
                            <!-- 7 porque son 7 columnas -->
                            <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>
                        </tr>
                    <?php
                    // Llave del else
                    }            
                    ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Total</td>
                    <!-- Total de la compra-->
                    <td><?php print $total_pedido; ?> €</td>
                    <td></td> 
                </tr>
            </tfoot>
        </table>
        <hr>
        <!-- Botones -->
        <div class="row">
            <div class="pull-left">
              <a href="../index.php" class="btn btn-info">Seguir comprando</a>
            </div>
            <div class="pull-right">
                <a href="finalizar_compra.php" class="btn btn-success">Finalizar compra</a>
            </div>
        </div>
    </div>


    <!-- Bootstrap js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>