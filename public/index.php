<?php
$controller = null;
$method = null;

include ( __DIR__ . "/../bootstrap/start.php" );    //autoload, session start, whoops, altorouter
Dotenv::load( __DIR__ . "/../" );                   //cargar el .env
include ( __DIR__ . "/../bootstrap/db.php" );       //conexión con la bd con illuminate
include ( __DIR__ . "/../routes.php" );             //rutas: mapeo de recurso solicitado con clases y métodos

$match = $router->match();

// var_dump($match);
// echo "<br><br>";
// print_r($match);
// die();

//die and dump del var dump de symfony
//dd($match);

if ( is_string($match['target']) ) {
    list ( $controller, $method ) = explode( "@", $match['target'] );
}

if ( ($controller != null) && (is_callable(array($controller, $method))) ) {
    $object = new $controller();
    call_user_func_array(array($object, $method), array($match['params']));
} else if ( $match && is_callable($match['target']) ) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo "Cannot find $controller->$method";
    exit();
}