<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106124414 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clients ADD _id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gestionnaires ADD _id VARCHAR(255) NOT NULL, CHANGE numero numero MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE lots ADD _id VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clients DROP _id');
        $this->addSql('ALTER TABLE gestionnaires DROP _id, CHANGE numero numero MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lots DROP _id');
    }
}
