<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801121141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport_pointage (id INT AUTO_INCREMENT NOT NULL, id_employe_id INT NOT NULL, nbre_heures_reatard DOUBLE PRECISION NOT NULL, pointage_entree DATETIME NOT NULL, pointage_sortie DATETIME NOT NULL, nbre_heures_travil DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_D399FBA2A43CD245 (id_employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rapport_pointage ADD CONSTRAINT FK_D399FBA2A43CD245 FOREIGN KEY (id_employe_id) REFERENCES employe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rapport_pointage');
    }
}
