<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210827073656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage ADD employe_id INT NOT NULL, CHANGE pointage_entree pointage_entree TIME NOT NULL, CHANGE pointage_sortie pointage_sortie TIME NOT NULL');
        $this->addSql('ALTER TABLE rapport_pointage ADD CONSTRAINT FK_D399FBA21B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('CREATE INDEX IDX_D399FBA21B65292 ON rapport_pointage (employe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage DROP FOREIGN KEY FK_D399FBA21B65292');
        $this->addSql('DROP INDEX IDX_D399FBA21B65292 ON rapport_pointage');
        $this->addSql('ALTER TABLE rapport_pointage DROP employe_id, CHANGE pointage_entree pointage_entree VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pointage_sortie pointage_sortie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
