<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803175920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport_pointage (id INT AUTO_INCREMENT NOT NULL, id_employe_id INT NOT NULL, heures_par_jour DOUBLE PRECISION NOT NULL, heures_par_mois DOUBLE PRECISION NOT NULL, jours_par_semaine INT NOT NULL, pointage_entree VARCHAR(255) DEFAULT NULL, pointage_sortie VARCHAR(255) DEFAULT NULL, retard VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D399FBA2A43CD245 (id_employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport_pointage ADD CONSTRAINT FK_D399FBA2A43CD245 FOREIGN KEY (id_employe_id) REFERENCES employe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rapport_pointage');
    }
}
