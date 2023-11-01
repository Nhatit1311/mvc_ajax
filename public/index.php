<?php

require "../Controllers/Controller.php";

$controllerName = ucfirst(strtolower($_GET['controller'] ?? 'Welcome') . 'Controller');
$actionName = strtolower($_GET['action'] ?? 'index');

require "../Controllers/${controllerName}.php";
$controllerObject = new $controllerName;
$controllerObject->$actionName();


