<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Juegos | Call of Game</title>

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
                <a class="navbar-brand" href="../usuarios/control.php">Call of Game <i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
                <li>
                <a href="../pedidos/control_pedidos.php" class="btn">PEDIDOS</a>
                </li> 
                <li class="active">
                <a href="control_juegos.php" class="btn">JUEGOS</a>
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
    <div class="container" id="main">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <!-- Botón de añadir -->
                    <a href="form_registrar.php" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Nuevo juego</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <legend>Lista de juegos</legend>
                    <!-- Tabla de juegos -->
                    <table class="table table-bordered">
                        <!-- Cabecera -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <!-- <th>Género</th> -->
                                <th>Plataforma</th>
                                <th>Precio</th>
                                <th class="text-center">Foto</th>
                                <!-- <th>Foto</th> -->
                                <th></th>
                            </tr>
                        </thead>
                        <!-- Cuerpo -->
                        <tbody>
                            <?php 
                            
                            require '../vendor/autoload.php';
                            // Clase Juego
                            $juego = new Jaro\Juego;
                            // Función mostrar() para ver los juegos registrados
                            $info_juego = $juego->mostrar();
                            // Nº de juegos registrados
                            $cantidad = count($info_juego);

                            // Si hay algún juego registrado
                            if($cantidad > 0){
                                // Nº de juego
                                $cont=0;
                                // Datos del juego
                                for($x=0; $x<$cantidad; $x++){
                                    $cont++;
                                    $item = $info_juego[$x];
                            ?>
                                    <!-- Info de los juegos -->
                                    <tr>
                                        <!--Se muestra el número del contador-->
                                        <td><?php print $cont ?></td>
                                        <!--Se usa la variable contador para mostrar el título de cada pelicula-->
                                        <td><?php print $item['titulo'] ?></td>
                                        <!--Género-->
                                        <!-- <td><?php print $item['nombre'] ?></td> -->
                                        <!--Plataforma-->
                                        <td><?php print $item['nombre'] ?></td>
                                        <!--Precio-->
                                        <td><?php print $item['precio'] ?> €</td>
                                        <!-- Foto -->
                                        <td class="text-center">
                                            <?php 
                                                //Devuelve la foto de la carpeta img
                                                $foto ='../img/'.$item['foto'];
                                                //Si existe el archivo, lo muestra por pantalla
                                                if (file_exists($foto)) {
                                            ?>
                                                <img src="<?php print $foto ?>" width="50">
                                            <?php
                                                // Llave del if 
                                                }else{
                                            ?>
                                                SIN FOTO  
                                            <?php 
                                                // Llave del else 
                                                }
                                            ?>
                                        </td>

                                        <!-- Botones de eliminar y editar -->
                                        <td class="text-center">
                                            <!-- Modificar iconos -->
                                            <!-- Botón de eliminar -->
                                            <a href="acciones.php?id=<?php print $item['id'] ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>

                                            <!-- Botón de editar -->
                                            <a href="form_actualizar.php ?id=<?php print $item['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>

                                    </tr>

                            <?php
                                // Llave del for
                                }
                            // Llave del if
                            }else{                  
                            ?>
                            <td>
                                <td colspan="6">
                                    NO HAY JUEGOS REGISTRADOS
                                </td>
                            </td>
                            <!-- Llave del else -->
                            <?php } ?>
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