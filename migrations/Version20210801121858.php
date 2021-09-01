<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801121858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage ADD nbre_heures_retard DOUBLE PRECISION NOT NULL, ADD nbre_heures_travail DOUBLE PRECISION NOT NULL, DROP nbre_heures_reatard, DROP nbre_heures_travil');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage ADD nbre_heures_reatard DOUBLE PRECISION NOT NULL, ADD nbre_heures_travil DOUBLE PRECISION NOT NULL, DROP nbre_heures_retard, DROP nbre_heures_travail');
    }
}
