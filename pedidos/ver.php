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
                    <?php                  
                        require '../vendor/autoload.php';

                        // Id del pedido que se quiere ver
                        $id = $_GET['id'];
                        // Clase pedido
                        $pedido = new Jaro\Pedido;
                        // Función mostrar por id
                        $info_pedido = $pedido -> mostrarPorId($id);
                        // Función mostrar detalle
                        $info_detalle_pedido = $pedido -> mostrarDetallePoridPedido($id);                                 
                    ?>

                    <legend>Información del pedido</legend>
                    <!-- Nombre -->
                    <div class="form-group">
                      <label >Nombre</label>
                      <input value="<?php print $info_pedido['nombre'] ?>"  type="text" class="form-control" readonly>
                    </div>
                    <!-- Apellidos -->
                    <div class="form-group">
                      <label >Apellidos</label>
                      <input value="<?php print $info_pedido['apellidos'] ?>"  type="text" class="form-control" readonly>
                    </div>
                    <!-- Correo -->
                    <div class="form-group">
                      <label >Email</label>
                      <input value="<?php print $info_pedido['email'] ?>"  type="text" class="form-control" readonly>
                    </div>
                    <!-- Fecha -->
                    <div class="form-group">
                      <label >Fecha</label>
                      <input value="<?php print $info_pedido['fecha'] ?>"  type="text" class="form-control" readonly>
                    </div>
                    <hr>
                    <label>Juegos comprados</label>
                    <hr>
                    <table class="table table-bordered">
                        <!-- Cabecera -->
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Foto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <!-- Cuerpo -->
                        <tbody>
                            <?php 
                            
                                // Nº de juegos en el pedido
                                $cantidad = count($info_detalle_pedido);
                                // Si hay algún pedido registrado
                                if($cantidad > 0){
                                    $cont=0;
                                    for($x=0; $x < $cantidad; $x++){
                                        $cont++;
                                        $item = $info_detalle_pedido[$x];
                                        // Coste total de los juegos cuando varios son iguales
                                        $total = $item['precio'] * $item['cantidad'];
                            ?>
                                        <!-- Info del pedido -->
                                        <tr>
                                            <td><?php print $cont ?></td>
                                            <!-- Titulo -->
                                            <td><?php print $item['titulo']?></td>
                                            <!-- Foto -->
                                            <td>
                                                <?php 
                                                $foto ='../img/'.$item['foto'];
                                                //Si existe el archivo
                                                if (file_exists($foto)) {
                                                ?>
                                                    <img src="<?php print $foto ?>" width="35">
                                                <?php 
                                                }else{?>
                                                    SIN FOTO  
                                                <?php  
                                                }
                                                ?>
                                            </td>
                                            <!-- Precio -->
                                            <td>
                                                <?php print $item['precio'] ?> €
                                            </td>
                                            <!-- Cantidad -->
                                            <td>
                                                <?php print $item['cantidad'] ?>
                                            </td>
                                            <!-- Total de un juego cuandi se compran varias unidades -->
                                            <td>
                                                <?php print $total ?> €
                                            </td>
                                        </tr>
                                    
                                    <?php
                                    // Llave del for  
                                    }
                                // Llave del if
                                // Si no hay pedidos registrados
                                }else{
                                    ?>
                                    <td>
                                        <td colspan="6">
                                            NO HAY JUEGOS REGISTRADOS
                                        </td> 
                                    </td>
                            <?php 
                                // Llave del else
                                }                        
                            ?>
                        </tbody>
                    </table>

                    <!-- Total del pedido -->
                    <div class="col-md-3"> 
                        <label >Total compra</label>                      
                        <div class="form-group">            
                            <input value="<?php print $info_pedido  ['total'] ?> €"  type="text" class="form-control" readonly > 
                        </div>                               
                    </div>

                </fieldset>

                <!-- Botones -->
                <div class="pull-left">
                    <!-- hidden-print oculta los botones al imprimir -->
                    <a href="../usuarios/control.php" class="btn btn-default hidden-print">Cancelar</a>
                </div>
                <div class="pull-right">
                    <!-- javascript:; hace que no se dirija a ningún sitio -->
                    <a href="javascript:;" id="btnImprimir" class="btn btn-danger hidden-print">Imprimir</a>
                </div>

            </div>
        </div>
    </div>


    <!-- Bootstrap js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- script que da funcionalidad al boton Imprimir -->
    <script>
      $('#btnImprimir').on('click', function(){
          // Función usada para imprimir la página
          window.print();
          return false;
      })
    </script>

</body>
</html>