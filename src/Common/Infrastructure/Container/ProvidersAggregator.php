<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Container;

use Project\Blog\Infrastructure\Container\BlogServiceProvider;
use Project\Http\Infrastructure\HttpServiceProvider as ProjectHttpServiceProvider;
use Zorachka\Clock\ClockServiceProvider;
use Zorachka\Console\ConsoleServiceProvider;
use Zorachka\Container\ServiceProvider;
use Zorachka\Database\Cycle\DBAL\DBALServiceProvider;
use Zorachka\Database\Doctrine\Migrations\MigrationsServiceProvider;
use Zorachka\Directories\DirectoriesServiceProvider;
use Zorachka\Environment\EnvironmentServiceProvider;
use Zorachka\EventDispatcher\EventDispatcherServiceProvider;
use Zorachka\Http\Providers\HttpServiceProvider;
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
            HttpServiceProvider::class,

            // Application config
            CommonConfigServiceProvider::class,
            ProjectHttpServiceProvider::class,

            BlogServiceProvider::class,
        ];
    }
}
