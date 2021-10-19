<?php
require __DIR__ . "/vendor/autoload.php";

// Package that handles routing for us
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    // main actions
    $route->addRoute('GET', '/', 'MainController@showHome');
    $route->addRoute('GET', '/print/{id}', 'MainController@print');
    $route->addRoute('GET', '/edit/{id}', 'MainController@showEditForm');
    $route->addRoute('GET', '/new', 'MainController@showNewForm');
    $route->addRoute('GET', '/new/education/{id}', 'MainController@showNewEducationForm');
    $route->addRoute('GET', '/edit/education/{id}', 'MainController@editEducationForm');
    $route->addRoute('GET', '/new/job/{id}', 'MainController@showNewJobForm');
    $route->addRoute('GET', '/edit/job/{id}', 'MainController@editJobForm');
    $route->addRoute('GET', '/new/interests/{id}', 'MainController@showNewInterestsForm');
    $route->addRoute('GET', '/edit/interest/{id}', 'MainController@editInterestsForm');

    // create actions
    $route->addRoute('POST', '/new/create', 'CreateController@cv');
    $route->addRoute('POST', '/new/education', 'CreateController@education');
    $route->addRoute('POST', '/new/job', 'CreateController@job');
    $route->addRoute('POST', '/new/interest', 'CreateController@interest');

    //delete actions
    $route->addRoute('GET', '/delete/cv/{id}', 'DeleteController@cv');
    $route->addRoute('GET', '/delete/education/{id}', 'DeleteController@education');
    $route->addRoute('GET', '/delete/job/{id}', 'DeleteController@job');
    $route->addRoute('GET', '/delete/interest/{id}', 'DeleteController@interest');

    //update actions
    $route->addRoute('POST', '/update/personal', 'UpdateController@personalInfo');
    $route->addRoute('POST', '/update/education', 'UpdateController@education');
    $route->addRoute('POST', '/update/job', 'UpdateController@job');
    $route->addRoute('POST', '/update/interest', 'UpdateController@interest');

    //add
    $route->addRoute('GET', '/add/job/description/{id}', 'AddController@showJobDescription');
    $route->addRoute('POST', '/add/job/description', 'AddController@addJobDescription');



});

// Fetch method and URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];

        // unpack params and call controller method
        [$controller, $method] = explode('@', $handler);
        $controllerPath = '\cv\Controllers\\' . $controller;
        echo (new $controllerPath)->{$method}($params);
        break;
}
