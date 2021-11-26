<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Psr\Container\ContainerInterface;
use Zorachka\Framework\Clock\ClockConfig;
use Zorachka\Framework\Console\ConsoleConfig;
use Zorachka\Framework\Directories\DirectoriesConfig;
use Zorachka\Framework\Directories\DirectoryAlias;
use Zorachka\Framework\Environment\Environment;
use Zorachka\Framework\Container\ServiceProvider;
use Zorachka\Framework\ErrorHandler\ErrorHandlerConfig;
use Zorachka\Framework\Logger\LoggerConfig;

final class ConfigServiceProvider implements ServiceProvider
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
                    ->withDirectory(DirectoryAlias::PUBLIC, \PUBLIC)
                    ->withDirectory('@migrations', \ROOT . '/migrations');
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
            ClockConfig::class => static fn(ClockConfig $config) =>
                $config->withTimezone('Europe/Moscow')
        ];
    }
}
