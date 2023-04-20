<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Project\Common\Infrastructure\Container\ProvidersAggregator;
use Zorachka\Container\ContainerFactory;

const ROOT = __DIR__;

mb_internal_encoding('UTF-8');
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'stderr');

require_once ROOT . '/vendor/autoload.php';

return static function(): ContainerInterface {
    return (new ContainerFactory)->build(
        ProvidersAggregator::getProviders()
    );
};
