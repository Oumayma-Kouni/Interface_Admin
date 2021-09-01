<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801183952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage ADD heures_par_mois DOUBLE PRECISION NOT NULL, ADD cin VARCHAR(255) NOT NULL, ADD matricule VARCHAR(255) NOT NULL, ADD poste VARCHAR(255) NOT NULL, ADD jours_par_semaine INT NOT NULL, DROP pointage_entree, DROP pointage_sortie, DROP nbre_heures_retard, CHANGE nbre_heures_travail heures_par_jour DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rapport_pointage ADD pointage_entree TIME NOT NULL, ADD pointage_sortie TIME NOT NULL, ADD nbre_heures_retard TIME NOT NULL, ADD nbre_heures_travail DOUBLE PRECISION NOT NULL, DROP heures_par_jour, DROP heures_par_mois, DROP cin, DROP matricule, DROP poste, DROP jours_par_semaine');
    }
}
