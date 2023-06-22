<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230619100108 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE posts (id UUID NOT NULL, content VARCHAR(255) NOT NULL, createdAt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updatedAt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN posts.createdAt IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN posts.updatedAt IS \'(DC2Type:datetime_immutable)\'');
    }
}
