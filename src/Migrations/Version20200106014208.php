<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106014208 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lots (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, surface INT NOT NULL, INDEX IDX_916087CE19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lots ADD CONSTRAINT FK_916087CE19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('DROP TABLE lot');
        $this->addSql('ALTER TABLE gestionnaires CHANGE numero numero VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, surface INT NOT NULL, INDEX IDX_B81291B19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE lots');
        $this->addSql('ALTER TABLE gestionnaires CHANGE numero numero INT NOT NULL');
    }
}
