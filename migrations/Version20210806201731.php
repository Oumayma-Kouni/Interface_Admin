<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806201731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche ADD heures_supplementaires DOUBLE PRECISION NOT NULL, ADD indemnite_de_transport DOUBLE PRECISION NOT NULL, ADD cotisations_sociales_salarie DOUBLE PRECISION NOT NULL, ADD impots DOUBLE PRECISION NOT NULL, ADD total_indemnites_supplementaires DOUBLE PRECISION NOT NULL, DROP heures_supplémentaires, DROP indemnitéde_transport, DROP cotisations_sociales_salarié, DROP impôts, DROP total_indemnités_supplémentaires');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche ADD heures_supplémentaires DOUBLE PRECISION NOT NULL, ADD indemnitéde_transport DOUBLE PRECISION NOT NULL, ADD cotisations_sociales_salarié DOUBLE PRECISION NOT NULL, ADD impôts DOUBLE PRECISION NOT NULL, ADD total_indemnités_supplémentaires DOUBLE PRECISION NOT NULL, DROP heures_supplementaires, DROP indemnite_de_transport, DROP cotisations_sociales_salarie, DROP impots, DROP total_indemnites_supplementaires');
    }
}
