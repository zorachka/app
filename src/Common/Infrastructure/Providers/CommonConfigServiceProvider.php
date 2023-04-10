<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use HomeAction;
use Psr\Container\ContainerInterface;
use Zorachka\Clock\ClockConfig;
use Zorachka\Console\ConsoleConfig;
use Zorachka\Directories\DirectoriesConfig;
use Zorachka\Directories\DirectoryAlias;
use Zorachka\Environment\Environment;
use Zorachka\Container\ServiceProvider;
use Zorachka\ErrorHandler\ErrorHandlerConfig;
use Zorachka\Http\Router\Route;
use Zorachka\Http\Router\RouterConfig;
use Zorachka\Logger\LoggerConfig;

final class CommonConfigServiceProvider implements ServiceProvider
{
    /**
     * @inheritDoc
     */
    public static function getDefinitions(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public static function getExtensions(): array
    {
        return [
            ErrorHandlerConfig::class => static function(ErrorHandlerConfig $config) {
                return $config
                    ->withCatchExceptions(true);
            },
            DirectoriesConfig::class => static function(DirectoriesConfig $config) {
                return $config
                    ->withDirectory(DirectoryAlias::ROOT, \ROOT)
                    ->withDirectory('@public', '@root/public')
                    ->withDirectory('@migrations', '@root/migrations');
            },
            LoggerConfig::class => static function (LoggerConfig $config, ContainerInterface $container) {
                /** @var Environment $environment */
                $environment = $container->get(Environment::class);

                return $config
                    ->withName(
                        $environment->get('APP_NAME')
                    );
            },
            ConsoleConfig::class => static function (ConsoleConfig $config, ContainerInterface $container) {
                /** @var Environment $environment */
                $environment = $container->get(Environment::class);

                return $config
                    ->withAppName(
                        $environment->get('CONSOLE_APP_NAME')
                    );
            },
            RouterConfig::class => static function (RouterConfig $config) {
                return $config->addRoute(
                    Route::get('/', HomeAction::class)
                );
            },
            ClockConfig::class => static fn(ClockConfig $config) =>
                $config->withTimezone('Europe/Minsk')
        ];
    }
}
