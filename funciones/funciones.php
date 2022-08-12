<?php

// Añade juegos al carrito
function agregarJuego($resultado, $id, $cantidad = 1){
    $_SESSION['carrito'][$id] = array(
        'id' => $resultado['id'],
        'titulo' => $resultado['titulo'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
   );
}

// Actualiza el numero de juegos que contiene el carrito
function actualizarJuego($id,$cantidad = FALSE){
    if($cantidad){
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    }else{
        $_SESSION['carrito'][$id]['cantidad']+=1;
    }
}

// Total de la compra
function calcularTotal(){
    $total = 0;

        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
        return $total;  
}


// Nº total de juegos en el carrito
function cantidadJuegos(){
    $cantidad = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
           $cantidad++;
        }
    }else{
        return $cantidad;
    }
}


?>