<?php

require dirname(__DIR__) . '/vendor/autoload.php';


error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'renderIndex']);
$router->add('students.json', ['controller' => 'Home', 'action' => 'studentsJson']);

$router->add('{controller}/{action}');
$router->dispatch($_SERVER['QUERY_STRING']);
