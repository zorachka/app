<?php

declare(strict_types=1);

use Project\Common\Infrastructure\Providers\ProvidersAggregator;
use Whoops\Handler\PlainTextHandler;
use Whoops\Run;
use Zorachka\Framework\Console\Application;
use Zorachka\Framework\Container\ContainerFactory;

mb_internal_encoding('UTF-8');
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'stderr');

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {
    require_once dirname(__DIR__) . '/vendor/autoload.php';

    $whoops = new Run;
    $whoops->pushHandler(new PlainTextHandler);
    $whoops->register();

    $container = ContainerFactory::build(ProvidersAggregator::getProviders());

    /** @var Application $application */
    $application = $container->get(Application::class);
    $application->run();
})();
