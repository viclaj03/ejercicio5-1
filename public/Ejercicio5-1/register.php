<?php
require_once("../../kernel.php");
use App\exceptions\PasswordIsNotSame;
use App\exceptions\CheckFieldException;

$errors = [];
if (isPost() && cfsr()){
    try {
        $name = isRequired('user');
        $email = isRequired('email');
        $password = isRequired('password');
        $password2 = isRequired('password2');
        if ($password != $password2) {
            throw new PasswordIsNotSame($password2);
        }
    } catch ( CheckFieldException $e) {
        $errors[$e->getField()] = $e->getMessage();
    }

    if (!count($errors)){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $query->insert('users',compact('name','email','password'));
        header('Location: /Ejercicio5-1/login.php');
    }
}
require_once($route_views . 'register.view.php');

