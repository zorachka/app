<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Zorachka\Framework\Console\ConsoleServiceProvider;
use Zorachka\Framework\Container\ServiceProvider;
use Zorachka\Framework\Cors\CorsServiceProvider;
use Zorachka\Framework\Directories\DirectoriesServiceProvider;
use Zorachka\Framework\Environment\EnvironmentServiceProvider;
use Zorachka\Framework\Http\HttpApplicationServiceProvider;
use Zorachka\Framework\Http\HttpMiddlewareServiceProvider;
use Zorachka\Framework\Http\HttpServiceProvider;
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
            DirectoriesServiceProvider::class,
            ConsoleServiceProvider::class,
            HttpServiceProvider::class,
            HttpApplicationServiceProvider::class,
            HttpMiddlewareServiceProvider::class,
            LoggerServiceProvider::class,
            CorsServiceProvider::class,

            // Application
            CommonServiceProvider::class,
        ];
    }
}
