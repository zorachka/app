<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Providers;

use Zorachka\Framework\Http\Middleware\MiddlewaresServiceProvider;

final class HttpMiddlewaresServiceProvider implements MiddlewaresServiceProvider
{
    /**
     * @inheritDoc
     */
    public static function getMiddlewares(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public static function getDefinitions(): array
    {
        return [
            MiddlewaresServiceProvider::class => static fn() => new HttpMiddlewaresServiceProvider,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getExtensions(): array
    {
        return [];
    }
}
