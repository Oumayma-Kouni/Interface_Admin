<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806200418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche ADD date_paie DATE NOT NULL, ADD salaire_base DOUBLE PRECISION NOT NULL, ADD heures_supplémentaires DOUBLE PRECISION NOT NULL, ADD prime DOUBLE PRECISION NOT NULL, ADD indemnitéde_transport DOUBLE PRECISION NOT NULL, ADD cotisations_sociales_salarié DOUBLE PRECISION NOT NULL, ADD impôts DOUBLE PRECISION NOT NULL, ADD total_indemnités_supplémentaires DOUBLE PRECISION NOT NULL, ADD avance DOUBLE PRECISION NOT NULL, ADD total_retenues_sur_salaire DOUBLE PRECISION NOT NULL, ADD salaire_net DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche DROP date_paie, DROP salaire_base, DROP heures_supplémentaires, DROP prime, DROP indemnitéde_transport, DROP cotisations_sociales_salarié, DROP impôts, DROP total_indemnités_supplémentaires, DROP avance, DROP total_retenues_sur_salaire, DROP salaire_net');
    }
}
