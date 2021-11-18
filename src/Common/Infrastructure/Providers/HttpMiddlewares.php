<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Zorachka\Framework\Cors\CorsMiddleware;
use Zorachka\Framework\Http\Middleware\MiddlewaresProvider;
use Zorachka\Framework\Http\Middleware\NotFoundHandler;

final class HttpMiddlewares implements MiddlewaresProvider
{
    /**
     * @inheritDoc
     */
    public static function getMiddlewares(): array
    {
        return [
            NotFoundHandler::class,
            CorsMiddleware::class,
        ];
    }
}
