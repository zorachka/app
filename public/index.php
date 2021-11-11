<?php

declare(strict_types=1);

use FastRoute\RouteCollector;
use Laminas\Diactoros\ServerRequestFactory;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Relay\Relay;
use function FastRoute\simpleDispatcher;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([

]);
$container = $containerBuilder->build();

$routes = simpleDispatcher(function (RouteCollector $r) {
    $r->get('/', function () {
        echo 'Hello, world!';
        exit;
    });
});
$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler();

$requestHandler = new Relay($middlewareQueue);
$requestHandler->handle(ServerRequestFactory::fromGlobals());
