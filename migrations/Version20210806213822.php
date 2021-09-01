<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806213822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche CHANGE total_retenues_sur_salaire total_retenues_sur_salaire DOUBLE PRECISION DEFAULT NULL, CHANGE salaire_net salaire_net DOUBLE PRECISION DEFAULT NULL, CHANGE total_indemnites_supplementaires total_indemnites_supplementaires DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche CHANGE total_indemnites_supplementaires total_indemnites_supplementaires DOUBLE PRECISION NOT NULL, CHANGE total_retenues_sur_salaire total_retenues_sur_salaire DOUBLE PRECISION NOT NULL, CHANGE salaire_net salaire_net DOUBLE PRECISION NOT NULL');
    }
}
