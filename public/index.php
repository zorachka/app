<?php

declare(strict_types=1);

use Project\Common\Infrastructure\Providers\ProvidersAggregator;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;
use Zorachka\Framework\Container\ContainerFactory;
use Zorachka\Framework\Environment\Environment;
use Zorachka\Framework\Http\Application;

mb_internal_encoding('UTF-8');
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'stderr');

define('ROOT', dirname(__DIR__));
define('PUBLIC', __DIR__);

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {
    require_once dirname(__DIR__) . '/vendor/autoload.php';

    if (getenv('APP_ENV') !== Environment::PRODUCTION) {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }

    $container = ContainerFactory::build(
        ProvidersAggregator::getProviders()
    );

    $application = $container->get(Application::class);
    $application->run();
})();
