<?php
// load filp/whoops
use App\Ofegat;

    require(dirname(__FILE__) . "/vendor/autoload.php");
    $query = require('bootstrap.php');

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();


    use Whoops\Run;
    use Whoops\Handler\PrettyPageHandler;

    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();

// routes
    $route_views = $_SERVER['DOCUMENT_ROOT'].'/../views/';
    $route_src = $_SERVER['DOCUMENT_ROOT'].'/../src/';

