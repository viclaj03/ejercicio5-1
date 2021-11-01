<?php
require_once("../../kernel.php");
use App\Ofegat;
session_start();

if (!isset($_SESSION['user'])){
    header('location:/Ejercicio5-1/login.php');
    die();
}
if (!isset($_SESSION['ofegat'])){
    $arrayPalabras = ['Nacho','Calamar',"Marihuana",'Crack','Lejia','Judio','conejo','Espanya'];
    $ofegat = new Ofegat($arrayPalabras[rand(0,7)]);
    $_SESSION['ofegat'] = $ofegat;
    $_SESSION['intentos'] = 6;
}


if (isPost() && cfsr()){
    if ($_SESSION['intentos'] <= 1){
        echo "Fin del juego";
        session_destroy();
        die();
    }
    $letter =  $_POST['respuesta'];
    try {
        $acerto = $_SESSION['ofegat']->addLetter($letter);
    }catch (Exception $e){
        echo $e->getMessage();
        $acerto = 1;
    }

    if (substr($_SESSION['ofegat']->render(),-1) == 1){
        echo "<br>YOU WIN";
        session_destroy();
        die();
    }
    if ($acerto === 1) {
        $_SESSION['intentos']--;
    }

}

require_once($route_views . 'juego.view.php');
