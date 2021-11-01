<?php
session_start();
require_once ('../../kernel.php');
$errors = [];
if (isPost() && cfsr()){
    $email = isRequired('email',$errors);
    $password = isRequired('password',$errors);
    if (!count($errors)){
        $user = $query->login('users',$email,$password);
        $_SESSION['user'] = serialize($user);
        try {
            $user = $query->login('users',$email,$password);
        }catch (Exception $e){
            $errors[] = $e->getMessage();
        }
        if (!count($errors)){
            $_SESSION['user'] = serialize($user);
            header('Location: /Ejercicio5-1/juego.php');
        }else{
            require_once($route_views."login.view.php");
        }
    }
}
require_once($route_views . 'login.view.php');


