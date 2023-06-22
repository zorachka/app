<?php

declare(strict_types=1);

namespace Project\Blog\Infrastructure\Container;

use Project\Blog\Infrastructure\Persistence\PostSpecifiesSchema;
use Zorachka\Container\ServiceProvider;
use Zorachka\Database\MigrationsConfig;

final class BlogServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [];
    }

    public static function getExtensions(): array
    {
        return [
            MigrationsConfig::class => static function (MigrationsConfig $config) {
                return $config
                    ->withAggregateClass(PostSpecifiesSchema::class);
            }
        ];
    }
}
