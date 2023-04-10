<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zorachka\Container\ContainerFactory;
use Zorachka\Framework\ErrorHandler\ErrorHandler;
use Project\Core\Infrastructure\Providers\ProvidersAggregator;

mb_internal_encoding('UTF-8');
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'stderr');

$rootDirectory = __DIR__;
define('ROOT', $rootDirectory);

require_once $rootDirectory . '/vendor/autoload.php';

return static function(): ContainerInterface {
    $container = (new ContainerFactory())->build(
        ProvidersAggregator::getProviders()
    );

    /** @var ErrorHandler $errorHandler */
    $errorHandler = $container->get(ErrorHandler::class);
    $errorHandler->register();

    return $container;
};
