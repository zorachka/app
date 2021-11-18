<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Zorachka\Framework\Http\Router\Route;
use Zorachka\Framework\Http\Router\RouteGroup;
use Zorachka\Framework\Http\Router\RoutesProvider;
use Project\UI\Http\Action\HomeAction;

final class HttpRoutes implements RoutesProvider
{
    /**
     * @return array
     */
    public static function getRoutesAndGroups(): array
    {
        return [
            Route::get('/', HomeAction::class),
            RouteGroup::with('api', [
                Route::get('/', HomeAction::class),
            ])
        ];
    }
}
