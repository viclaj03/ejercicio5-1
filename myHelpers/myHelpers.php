<?php

use App\exceptions\RequiredField;
function dd(...$variable){
     foreach ($variable as $var){
         var_dump($var);
         echo "<br/>";
     }
     die();
}

function isPost(){
    return ($_SERVER["REQUEST_METHOD"] === "POST");
}

function loadView($vista,$params){
    extract($params);
    if (isPost()) {
        extract($_POST,EXTR_PREFIX_ALL,'old');
    }
    require_once($_SERVER['DOCUMENT_ROOT'].'/../views/'."$vista.view.php");
}

function isValidClass($nomCamp,$errors){
    if (!isset($errors)) {
        return '';
    }
    if (isset($errors[$nomCamp])) {
        return 'is-invalid';
    }
    return 'is-valid';
}

function showError($nomCamp,$errors){
    if (!isset($errors)) {
        return '';
    }
    if (isset($errors[$nomCamp])) {
        return "<div class='invalid-feedback'>$errors[$nomCamp]</div>";
    }
    return "<div class='valid-feedback'>All correct</div>";
}



function cfsr(){
    if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) die('Anti-CSRF');
    return true;
}

function isRequired($nomCamp){
    if (!empty($_POST[$nomCamp])) {
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }
    throw new RequiredField($nomCamp);
}



function insert($table,$fields) {

    $fieldsValue = implode(" , :",array_keys($fields));
    $fieldsName = implode(",",array_keys($fields));
    $sentence = "insert into %s (%s) values (:%s )";
    return sprintf($sentence,$table,$fieldsName,$fieldsValue);
}

/*function insertObject($table,$fields) {
    $fieldsValue = implode(" , :",key((array)$fields));
    $fieldsName = implode(",",array_keys($fields));
    $sentence = "insert into %s (%s) values (:%s )";
    return sprintf($sentence,$table,$fieldsName,$fieldsValue);
}*/


function update($table,$fields,$primaryKey) {
    $fieldsValue = implode(" , :",array_keys($fields));
    $fieldsName = implode(",",array_keys($fields));
    $sentence = "UPDATE $table SET ";
    foreach ($fields as $key => $value){
        $sentence .= "$key = :$key,";
    }
    $sentence = trim($sentence,',');
    $sentence .= " WHERE $primaryKey = :id";
    return $sentence;
}