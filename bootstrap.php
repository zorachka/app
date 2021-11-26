<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zorachka\Framework\Container\ContainerFactory;
use Zorachka\Framework\ErrorHandler\ErrorHandler;
use Project\Common\Infrastructure\Providers\ProvidersAggregator;

mb_internal_encoding('UTF-8');
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'stderr');

$rootDirectory = __DIR__;
$publicDirectory = $rootDirectory . '/public';

require_once $rootDirectory . '/vendor/autoload.php';

define('ROOT', $rootDirectory);
define('PUBLIC', $publicDirectory);

return static function(): ContainerInterface {
    $container = (new ContainerFactory())->build(
        ProvidersAggregator::getProviders()
    );

    /** @var ErrorHandler $errorHandler */
    $errorHandler = $container->get(ErrorHandler::class);
    $errorHandler->register();

    return $container;
};
