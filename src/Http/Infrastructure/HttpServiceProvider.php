<?php

declare(strict_types=1);

namespace Project\Http\Infrastructure;

use Project\Http\UI\Action\HomeAction;
use Zorachka\Container\ServiceProvider;
use Zorachka\Http\Router\Route;
use Zorachka\Http\Router\RouterConfig;

final class HttpServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [];
    }

    public static function getExtensions(): array
    {
        return [
            RouterConfig::class => static function (RouterConfig $config) {
                return $config->withRoute(
                    Route::get('/', HomeAction::class)->withName('home')
                );
            },
        ];
    }
}
