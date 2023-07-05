<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230705072955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD used_car_id INT NOT NULL, ADD size INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F1C40D50E FOREIGN KEY (used_car_id) REFERENCES used_car (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F1C40D50E ON image (used_car_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F1C40D50E');
        $this->addSql('DROP INDEX IDX_C53D045F1C40D50E ON image');
        $this->addSql('ALTER TABLE image DROP used_car_id, DROP size');
    }
}
