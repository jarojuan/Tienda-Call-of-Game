<?php 

session_start();

require '../vendor/autoload.php';

// Validación. Si la variable está definida y contiene un numero
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Id del juego
    $id = $_GET['id'];
    $juego = new Jaro\Juego;
    $resultado = $juego->mostrarPorId($id);
}else{
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Juego | Call of Game</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Icono de pestaña-->
    <link rel="icon" href="../iconos/square-pen-solid.svg">

</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">Call of Game <i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <!-- Crear archivo de pedidos -->
                    <a href="../" class="btn">PEDIDOS</a>
                    </li> 
                    <!--Esta clase de bootstrap indica donde nos encontramos-->
                    <li class="active">
                    <a href="control_juegos.php" class="btn">JUEGOS</a>
                    </li> 
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!-- Crear archivo de cerrar sesión y mostrar nombre de usuario -->
                            <li><a href="../cerrar_sesion.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br><br><br>

    <div class="container" id="main">
        <div class="row col-md-12">
            <fieldset>
                <legend>Modificar datos del juego ID: <?php print $resultado['id'] ?></legend>
            </fieldset>
            <!-- Formulario -->
            <form method="POST" action="acciones.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php print $resultado['id'] ?>"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Título</label>
                            <!-- Se muetsra el título que se haya puesto anteriormente -->
                            <input value="<?php print $resultado['titulo'] ?>" type="text" class="form-control" name="titulo" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion" id="" cols="3" required><?php print $resultado['descripcion'] ?></textarea>
                        </div>
                    </div>
                </div>
                <!-- Lista de géneros -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Género</label>
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
                                    <option value="<?php print $item['id'] ?>"
                                        <?php print $resultado['genero_id']== $item['id'] ? 'selected' : '' ?>
                                        ><?php print $item['nombre'] ?>
                                    </option>
                                <?php
                                // Cierre del for
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Imagen -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="foto">
                            <input type="hidden" name="foto_temp" value="<?php print $resultado['foto'] ?>">
                        </div>
                    </div>
                </div>
                <!-- Precio -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" value= "<?php print $resultado['precio'] ?>" class="form-control" name="precio" placeholder="0.0 €" required>
                        </div>
                    </div>
                </div>

                <input type="submit" name="accion" class="btn btn-primary" value="Actualizar">
                <a href="control_juegos.php" class="btn btn-default">Cancelar</a>

            </form>
        </div>
    </div>



    <!-- Bootstrap js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>