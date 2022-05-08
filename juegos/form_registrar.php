<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Juego | Call of Game</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Icono de pestaña-->
    <link rel="icon" href="../iconos/square-plus-solid.svg">
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
                            <!-- Crear archivo de cerrar sesión y mostrar nombre de usuario -->
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
                <fieldset>
                    <legend>Datos del juego</legend>
                    <!-- Formulario. -->
                    <!-- Envía la información al archivo acciones mediante post. Al usar enctype="multipart/form-data" se indica que se va a trabajar con archivos  -->
                    <form method="POST" action="acciones.php" enctype="multipart/form-data">
                        <!-- Contenido del formulario -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" class="form-control" name="titulo" required>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="" cols="3" required></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Géneros -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Género</label>
                                    <!-- Lista desplegable -->
                                    <select class="form-control" name="genero_id" required>
                                        <option value=""></option>
                                        <?php 
                                        require '../vendor/autoload.php';
                                        // Lama a la clase Genero
                                        $genero = new Jaro\Genero;
                                        //Lama a la función mostrar
                                        $info_genero = $genero->mostrar();
                                        // Contiene el nombre de todas las categorías 
                                        $cantidad = count($info_genero);
                                        for ($i=0; $i <$cantidad ; $i++) { 
                                            //Guarda el dato que hay en cada posición
                                            $item = $info_genero[$i];
                                        ?>
                                            <!-- En cada opción se muestran los nombres de los géneros -->
                                            <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>
                                        <!-- Cierre del for -->
                                        <?php 
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Plataformas -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Plataforma</label>
                                    <!-- Lista desplegable -->
                                    <select class="form-control" name="plataforma_id" required>
                                        <option value=""></option>
                                        <?php 
                                        require '../vendor/autoload.php';
                                        // Lama a la clase Plataforma
                                        $plataforma = new Jaro\Plataforma;
                                        //Lama a la función mostrar
                                        $info_plataforma = $plataforma->mostrar();
                                        // Contiene el nombre de todas las plataformas 
                                        $cantidad = count($info_plataforma);
                                        for ($i=0; $i <$cantidad ; $i++) { 
                                            //Guarda el dato que hay en cada posición
                                            $item = $info_plataforma[$i];
                                        ?>
                                            <!-- En cada opción se muestran los nombres de las plataformas -->
                                            <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>
                                        <!-- Cierre del for -->
                                        <?php 
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Seleccionar imagen -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" class="form-control" name="foto" required>
                                </div>
                            </div>
                        </div>
                        <!-- Indicar el precio -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" name="precio" placeholder="0.0 €" required>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
                        <a href="control_juegos.php" class="btn btn-default">Cancelar</a>
                    </form>
                </fieldset>  
            </div>
        </div>
    </div>

    


    <!-- Bootstrap js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>