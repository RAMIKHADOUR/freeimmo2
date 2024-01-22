<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119141329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE installations (id INT AUTO_INCREMENT NOT NULL, internet TINYINT(1) DEFAULT NULL, climatisation TINYINT(1) DEFAULT NULL, balcon TINYINT(1) DEFAULT NULL, garage TINYINT(1) DEFAULT NULL, salle_sport TINYINT(1) DEFAULT NULL, parking TINYINT(1) DEFAULT NULL, animaux_accepte TINYINT(1) DEFAULT NULL, piscine TINYINT(1) DEFAULT NULL, bar TINYINT(1) DEFAULT NULL, television TINYINT(1) DEFAULT NULL, heater TINYINT(1) DEFAULT NULL, cuisine TINYINT(1) DEFAULT NULL, security_cam TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE installations');
    }
}
