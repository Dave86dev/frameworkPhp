<?php

$container = require __DIR__ . './bootstrap/container.php';

// __DIR__ es una constante predefinida en PHP con el valor del directorio actual:
$container = require __DIR__ . './bootstrap/container.php';
//utilizaremos la variable $dispacher para leer las rutas que hemos creado:
$dispatcher = require base_path('routes/web.php');

//Utilizamos Kint para mostrar el contenido del objeto en pantalla:
Kint::dump($dispatcher);

//Guardamos en una variable el método Http utilizado en cada request:
$httpMethod= $_SERVER['REQUEST_METHOD'];
//Convertimos la url del request en un array para poder crear las rutas:
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route= $dispatcher->dispatch($httpMethod, $uri);
Kint::dump($route);

switch ($route[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo ('<h2>Ruta no encontrada</h2>');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo ('<h2>Método Http no permitido</h2>');
        break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $params = $route[2];
        $container->call($controller, $params);
        break;
}

?>