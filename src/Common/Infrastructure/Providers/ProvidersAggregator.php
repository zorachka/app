<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Zorachka\Clock\ClockServiceProvider;
use Zorachka\Console\ConsoleServiceProvider;
use Zorachka\Container\ServiceProvider;
use Zorachka\Database\Cycle\DBAL\DBALServiceProvider;
use Zorachka\Database\Cycle\Migrations\MigrationsServiceProvider;
use Zorachka\Directories\DirectoriesServiceProvider;
use Zorachka\Environment\EnvironmentServiceProvider;
use Zorachka\ErrorHandler\ErrorHandlerServiceProvider;
use Zorachka\EventDispatcher\EventDispatcherServiceProvider;
use Zorachka\Http\Providers\HttpApplicationServiceProvider;
use Zorachka\Http\Router\RouterServiceProvider;
use Zorachka\Logger\LoggerServiceProvider;
use Zorachka\Uuid\UuidServiceProvider;

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
            ClockServiceProvider::class,
            UuidServiceProvider::class,
            EventDispatcherServiceProvider::class,
            DBALServiceProvider::class,
            MigrationsServiceProvider::class,

            // Console Application
            ConsoleServiceProvider::class,

            // Http Application
            RouterServiceProvider::class,
            HttpApplicationServiceProvider::class,

            // Application config
            CommonConfigServiceProvider::class,
        ];
    }
}
