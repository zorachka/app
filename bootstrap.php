<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Project\Common\Infrastructure\Providers\ProvidersAggregator;
use Zorachka\Container\ContainerFactory;

mb_internal_encoding('UTF-8');
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'stderr');

$rootDirectory = __DIR__;
define('ROOT', $rootDirectory);

require_once $rootDirectory . '/vendor/autoload.php';

return static function(): ContainerInterface {
    return (new ContainerFactory())->build(
        ProvidersAggregator::getProviders()
    );
};
