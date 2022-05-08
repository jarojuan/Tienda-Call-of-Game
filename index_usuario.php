<?php 
  //Activar sesiones en php
  session_start();
  //Conecta con el archivo funciones.php
  require 'funciones/funciones.php';
?>

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
                <a class="navbar-brand" href="index_usuario.php">Call of game <i class="fa-solid fa-gamepad"></i></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <!-- Elementos del nav -->
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="consolas/ps4.php" class="btn">PS4 </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="consolas/xone.php" class="btn">XONE </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-left">
                    <li>
                    <a href="consolas/switch.php" class="btn">SWITCH </a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">
                    
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <!--añadir numero con php al carrito-->
                        <a href="pedidos/carrito.php" class="btn"> <span class="fa-solid fa-cart-shopping"></span> CARRITO <span class="badge"></span></a>
                   
                    </li> 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION['usuario_info']['nombre_usuario']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="usuarios/cerrar_sesion.php">Cerrar sesión</a></li>
                        </ul>
                    </li>

                </ul>
                
                
            </div>
        </div>
  </nav>
  <br>
  <div  class="p-3 mb-2 bg-info text-white">
    <div class="container" id="main">
      <!-- Texto inicial -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Call of Game <i class="fa-solid fa-gamepad"></i></h1>
          <h2>Bienvenido</h2>
          <p class="lead">Aquí podrás encontrar una amplia selección de los mejores videojuegos.</p>
        </div>
      </div>
            
      <!-- Juegos -->
      <div class="row">
        <?php
          //El archivo vendor contiene la información necesaria para utilizar composer
          require 'vendor/autoload.php';
          //La variable devuelve la clase Juego haciendo uso de composer
          $juego = new Jaro\Juego;
          //La variable devuelve la función mostrar() que se encuentra dentro de la clase Juego
          $info_juegos = $juego->mostrar();
          //Variable que devuelve la cantidad de juegos que hay registrados
          $cantidad = count($info_juegos);
          //Validación. El if solo se cumple si existen juegos registrados
          if ($cantidad > 0) {
            //El bucle da tantas vueltas como juegos haya para mostrar su información  
            for ($i=0; $i <$cantidad ; $i++) {
              //Variable que devuelve la información de cada juego
              $item = $info_juegos[$i];                 
        ?>
            <div class="col-md-3">
              <div class="panel panel-danger">
                <!-- Cabecera del panel -->
                <div class="panel-heading ">
                  <!-- Se muestra el titulo de cada pelicula -->
                  <h3 class="text-center titulo-pelicula"><?php print $item['titulo'] ?></h3>
                </div>
                <!-- Cuerpo del panel -->
                <div class="panel-body">
                  <?php
                    // $foto = 'upload/'.$item['foto'];
                    $foto = 'img/'.$item['foto'];
                    if (file_exists($foto)) {
                  ?>
                    <!-- Esta clase de bootsrap ajusta a diseño responsive -->
                    <img src="<?php print $foto; ?>" class="img-responsive">                   
                  <?php }else{ ?>
                    <!-- Esta imagen sale cuando no hay otra -->
                    <!-- MIRAR BIEN TAMAÑO DE LAS FOTOS -->
                    <img src="assets/imagenes/not-found.jpg" class="img-responsive">  
                  <?php } ?>
                </div>
                <!-- Pie del panel -->
                <div class="panel-footer">
                  <!-- Enlace que nos lleva al carrito de compra -->
                  <!-- Con el codigo php se indica el id de la pelicula que se añade -->
                  <a href="pedidos/carrito.php?id=<?php print $item['id']?>" class="btn btn-info btn-block">
                    <span class="fa-solid fa-cart-plus"></span> 
                     COMPRAR  <?php print $item['precio'] ?> €  
                  </a>
                </div>
              </div>
            </div>
        <?php 
            //Cierre del for
            }
          //Cierre del if
          }else{ 
        ?>
          NO HAY JUEGOS REGISTRADAS
        <!-- Cierre del else -->
        <?php } ?>
      </div>
    </div>
  </div>

  <footer class="container-flex text-center p-3 mb-2 bg-primary text-white">  
    <p>&copy 2022 Call of Game | Todos los derechos reservados</p> 
  </footer>
    
  <!-- Bootstrap js -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>