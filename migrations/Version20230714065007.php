<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230714065007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE used_car ADD contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE used_car ADD CONSTRAINT FK_738BE534E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_738BE534E7A1254A ON used_car (contact_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE used_car DROP FOREIGN KEY FK_738BE534E7A1254A');
        $this->addSql('DROP INDEX IDX_738BE534E7A1254A ON used_car');
        $this->addSql('ALTER TABLE used_car DROP contact_id');
    }
}
