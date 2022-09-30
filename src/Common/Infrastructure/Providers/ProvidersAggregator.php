<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Zorachka\Framework\Console\ConsoleServiceProvider;
use Zorachka\Framework\Container\ServiceProvider;
use Zorachka\Framework\Directories\DirectoriesServiceProvider;
use Zorachka\Framework\Environment\EnvironmentServiceProvider;
use Zorachka\Framework\ErrorHandler\ErrorHandlerServiceProvider;
use Zorachka\Framework\Http\Application\HttpApplicationServiceProvider;
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
            LoggerServiceProvider::class,

            // Console Application
            ConsoleServiceProvider::class,

            // Http Application
            HttpApplicationServiceProvider::class,

            // Application
            CommonConfigServiceProvider::class,
        ];
    }
}
