<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801133842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage CHANGE pointage_entree pointage_entree TIME NOT NULL, CHANGE pointage_sortie pointage_sortie TIME NOT NULL, CHANGE nbre_heures_retard nbre_heures_retard TIME NOT NULL, CHANGE nbre_heures_travail nbre_heures_travail TIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage CHANGE nbre_heures_retard nbre_heures_retard DOUBLE PRECISION NOT NULL, CHANGE pointage_entree pointage_entree DATETIME NOT NULL, CHANGE pointage_sortie pointage_sortie DATETIME NOT NULL, CHANGE nbre_heures_travail nbre_heures_travail DOUBLE PRECISION NOT NULL');
    }
}
