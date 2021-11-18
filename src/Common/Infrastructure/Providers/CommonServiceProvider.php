<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Psr\Container\ContainerInterface;
use Zorachka\Framework\Console\ConsoleConfig;
use Zorachka\Framework\Cors\CorsConfig;
use Zorachka\Framework\Directories\Directories;
use Zorachka\Framework\Directories\DirectoriesConfig;
use Zorachka\Framework\Http\Middleware\MiddlewaresProvider;
use Zorachka\Framework\Http\Router\RoutesProvider;
use Zorachka\Framework\Container\ServiceProvider;
use Zorachka\Framework\Logger\LoggerConfig;

final class CommonServiceProvider implements ServiceProvider
{
    /**
     * @inheritDoc
     */
    public static function getDefinitions(): array
    {
        return [
            RoutesProvider::class => fn() => new HttpRoutes,
            MiddlewaresProvider::class => fn() => new HttpMiddlewares,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getExtensions(): array
    {
        return [
            DirectoriesConfig::class => static function(DirectoriesConfig $config) {
                return $config
                    ->withDirectory(Directories::ROOT, \ROOT)
                    ->withDirectory(Directories::PUBLIC, \PUBLIC);
            },
            LoggerConfig::class => static function (LoggerConfig $config, ContainerInterface $container) {
                return $config
                    ->withName('Super App');
            },
            CorsConfig::class => static function (CorsConfig $config) {
                return $config
                    ->withAllowedOrigins(['http://localhost:3000'])
                    ->withAllowedMethods(['GET', 'POST']);
            },
            ConsoleConfig::class => static function (ConsoleConfig $config) {
                return $config
                    ->withAppName('Super Console App');
            }
        ];
    }
}
