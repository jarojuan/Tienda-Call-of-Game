<?php


function agregarJuego($resultado, $id, $cantidad = 1){
    $_SESSION['carrito'][$id] = array(
        'id' => $resultado['id'],
        'titulo' => $resultado['titulo'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
   );
}


function actualizarJuego($id,$cantidad = FALSE){
    if($cantidad){
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    }else{
        $_SESSION['carrito'][$id]['cantidad']+=1;
    }
}


function calcularTotal(){
    $total = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
    }else{
        return $total;
    }
}


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