<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Zorachka\Framework\Console\ConsoleServiceProvider;
use Zorachka\Framework\Container\ServiceProvider;
use Zorachka\Framework\Directories\DirectoriesServiceProvider;
use Zorachka\Framework\Environment\EnvironmentServiceProvider;
use Zorachka\Framework\ErrorHandler\ErrorHandlerServiceProvider;
use Zorachka\Framework\Http\Providers\HttpApplicationServiceProvider;
use Zorachka\Framework\Http\Providers\HttpServiceProvider;
use Zorachka\Framework\Http\Router\RouterServiceProvider;
use Zorachka\Framework\Logger\LoggerServiceProvider;

final class ProvidersAggregator
{
    /**
     * Array of providers.
     * @return class-string<ServiceProvider>[]
     */
    public static function getProviders(): array
    {
        return [
            // Framework
            EnvironmentServiceProvider::class,
            ErrorHandlerServiceProvider::class,
            DirectoriesServiceProvider::class,

            // Console Application
            ConsoleServiceProvider::class,

            // Http Application
            RouterServiceProvider::class,
            HttpServiceProvider::class,
            HttpApplicationServiceProvider::class,
            LoggerServiceProvider::class,

            // Application
            HttpMiddlewaresServiceProvider::class,
            ConfigServiceProvider::class,
        ];
    }
}
