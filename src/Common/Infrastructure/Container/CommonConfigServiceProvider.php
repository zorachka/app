<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Container;

use Psr\Container\ContainerInterface;
use Zorachka\Clock\ClockConfig;
use Zorachka\Console\ConsoleConfig;
use Zorachka\Container\ServiceProvider;
use Zorachka\Directories\DirectoriesConfig;
use Zorachka\Directories\DirectoryAlias;
use Zorachka\Environment\Environment;
use Zorachka\Logger\LoggerConfig;

use const ROOT;

final class CommonConfigServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [];
    }

    public static function getExtensions(): array
    {
        return [
            DirectoriesConfig::class => static function (DirectoriesConfig $config) {
                return $config
                    ->withDirectory(DirectoryAlias::ROOT, ROOT)
                    ->withDirectory('@public', '@root/public')
                    ->withDirectory('@migrations', '@root/migrations');
            },
            LoggerConfig::class => static function (LoggerConfig $config, ContainerInterface $container) {
                /** @var Environment $environment */
                $environment = $container->get(Environment::class);

                return $config
                    ->withName(
                        (string)$environment->get('APP_NAME')
                    );
            },
            ConsoleConfig::class => static function (ConsoleConfig $config, ContainerInterface $container) {
                /** @var Environment $environment */
                $environment = $container->get(Environment::class);

                return $config
                    ->withAppName(
                        (string)$environment->get('CONSOLE_APP_NAME')
                    );
            },
            ClockConfig::class => static fn (ClockConfig $config) =>
                $config->withTimezone('Europe/Minsk'),
        ];
    }
}
