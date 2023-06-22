<?php

declare(strict_types=1);

namespace Project\Blog\Infrastructure\Persistence;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Types\Types;
use Zorachka\Database\Doctrine\Migrations\SpecifiesSchema;

final class PostSpecifiesSchema implements SpecifiesSchema
{
    /**
     * @param Schema $schema
     * @return void
     * @throws SchemaException
     */
    public static function specifySchema(Schema $schema): void
    {
        $table = $schema->createTable('posts');
        $table->addColumn('id', Types::GUID);
        $table->addColumn('content', Types::STRING);
        $table->addColumn('createdAt', Types::DATETIME_IMMUTABLE);
        $table->addColumn('updatedAt', Types::DATETIME_IMMUTABLE);
        $table->setPrimaryKey(['id']);
    }
}
