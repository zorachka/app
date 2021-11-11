<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([

]);
$container = $containerBuilder->build();

echo 'Hello, world!';
