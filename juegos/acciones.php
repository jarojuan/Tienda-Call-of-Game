<?php 

require '../vendor/autoload.php';
$juego = new Jaro\Juego;

// Registrar o actualizar juegos
// Si la información llega mediante post
if ($_SERVER['REQUEST_METHOD']==='POST'){

    // Si la información del post llega con un name="accion" y un value="Registrar"???
    // Si se registra un nuevo juego
    if ($_POST['accion']==='Registrar'){
        // Validaciones para comprobar que los campos no están vacios.
        if(empty($_POST['titulo'])){
            exit('Introducir el título');
        }
        if(empty($_POST['descripcion'])){
            exit('Introducir la descripción');
        }
        if(empty($_POST['genero_id'])){
            exit('Seleccionar un género');
        }
        //Si el valor de genero_id no es numerico
        if(!is_numeric($_POST['genero_id'])){
            exit('Seleccionar una categoría válida');
        }

        //En el array se leen y devuelven los datos pasados mediante post
        $_params = array (
            'titulo'=>$_POST['titulo'],
            'descripcion'=>$_POST['descripcion'],
            //Llama a la función subir foto y devuelve el nombre de la foto
            'foto'=>subirFoto(),
            'precio'=>$_POST['precio'],
            'genero_id'=>$_POST['genero_id'],
            //Fecha en formato año, mes, dia
            'fecha'=>date('Y-m-d')
        );

        // Se pasa la información anterior a la función registrar, quue se encarga de regsitrar el juego con esos datos.
        $rpt = $juego->registrar($_params);

        // Si el registro es correcto, nos redirige a la página de control de juegos
        if ($rpt) {
            header('Location: juegos/control_juegos.php');
        }
        else{
            print 'Error al registrar el juego';
        }
    }

    // Si se actualizan los datos de un juego
    if ($_POST['accion']==='Actualizar'){

        // Validaciones
        if(empty($_POST['titulo'])){
            exit('Introducir el título');
        }
        if(empty($_POST['descripcion'])){
            exit('Introducir la descripción');
        }
        if(empty($_POST['genero_id'])){
            exit('Seleccionar un genero');
        }
        if(!is_numeric($_POST['genero_id'])){
            exit('Seleccionar un genero válido');
        }

        // Se leen y devuelven los datos
        $_params = array (
            'titulo'=>$_POST['titulo'],
            'descripcion'=>$_POST['descripcion'],
            'precio'=>$_POST['precio'],
            'genero_id'=>$_POST['genero_id'],
            'fecha'=>date('Y-m-d'),
            'id'=>$_POST['id']
        );

        // Cambiar la foto
        if(!empty($_POST['foto_temp'])){
            //coge el nuevo dato
            $_params['foto'] = $_POST['foto_temp'];
        }
        if(!empty($_FILES['foto']['name'])){
            $_params['foto'] = subirFoto();
        }

        // Se pasa la información a la función actualizar, que se encarga de modificar el juego con esos datos.
        $rpt = $pelicula->actualizar($_params);

        //Si se actualiza correctamente, nos dirige de nuevo a la página de control de juegos
        if ($rpt) {
            header('Location: juegos/control_juegos.php');
        }
        else{
            print 'Error al actualizar la película';
        }
    }

}

// Si se quiere eliminar un juego
// Lega la información mediante post
if ($_SERVER['REQUEST_METHOD']==='GET'){

    // La variable devuelve el id del juego que se quiere eliminar, al pulsar en el botón de borrar.
    $id = $_GET['id'];

    // Llama a la función eliminar y le pasa el id del juego a borrar.
    $rpt = $juego->eliminar($id);

    //Si se elimina nos redirige a la página de control de juegos
    if ($rpt) {
        header('Location: juego/control_juegos.php');
    }
    else{
        print 'Error al eliminar el juego';
    }
}

// Subir o modificar la imagen del juego
function subirFoto(){

    // Ruta donde se encuentran las imágenes
    $carpeta = __DIR__.'/../img/';

    // Guarda el nombre de la imagen
    $archivo = $carpeta.$_FILES['foto']['name'];

    // Si se actualiza, sobreescribe el nombre de la imagen cambiandolo por el nuevo
    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    //Devuelve el nombre de la imagen 
    return $_FILES['foto']['name'];
}


?>