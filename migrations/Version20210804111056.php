<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804111056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche (id INT AUTO_INCREMENT NOT NULL, employe_id INT NOT NULL, salaire_brut DOUBLE PRECISION DEFAULT NULL, nbre_heures_travail DOUBLE PRECISION NOT NULL, date_paiement DATE NOT NULL, INDEX IDX_4C13CC781B65292 (employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC781B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE rapport_pointage DROP FOREIGN KEY FK_D399FBA2A43CD245');
        $this->addSql('DROP INDEX UNIQ_D399FBA2A43CD245 ON rapport_pointage');
        $this->addSql('ALTER TABLE rapport_pointage DROP id_employe_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE fiche');
        $this->addSql('ALTER TABLE rapport_pointage ADD id_employe_id INT NOT NULL');
        $this->addSql('ALTER TABLE rapport_pointage ADD CONSTRAINT FK_D399FBA2A43CD245 FOREIGN KEY (id_employe_id) REFERENCES employe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D399FBA2A43CD245 ON rapport_pointage (id_employe_id)');
    }
}
