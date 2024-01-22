<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119154440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, annonceid_id INT NOT NULL, categoryid_id INT NOT NULL, typeid_id INT NOT NULL, locationid_id INT NOT NULL, surface DOUBLE PRECISION NOT NULL, status VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, num_rooms INT NOT NULL, num_bathrooms INT NOT NULL, num_parkings INT NOT NULL, num_stage INT NOT NULL, nomero_stage INT NOT NULL, image VARBINARY(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8BF21CDE181432D2 (annonceid_id), INDEX IDX_8BF21CDEA9FA940B (categoryid_id), INDEX IDX_8BF21CDEF56E2B44 (typeid_id), INDEX IDX_8BF21CDEA2655B0C (locationid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_installations (property_id INT NOT NULL, installations_id INT NOT NULL, INDEX IDX_B50C1ADB549213EC (property_id), INDEX IDX_B50C1ADB2B6BB138 (installations_id), PRIMARY KEY(property_id, installations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE181432D2 FOREIGN KEY (annonceid_id) REFERENCES annonces (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA9FA940B FOREIGN KEY (categoryid_id) REFERENCES categorys (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEF56E2B44 FOREIGN KEY (typeid_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA2655B0C FOREIGN KEY (locationid_id) REFERENCES localisation (id)');
        $this->addSql('ALTER TABLE property_installations ADD CONSTRAINT FK_B50C1ADB549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_installations ADD CONSTRAINT FK_B50C1ADB2B6BB138 FOREIGN KEY (installations_id) REFERENCES installations (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE181432D2');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA9FA940B');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEF56E2B44');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA2655B0C');
        $this->addSql('ALTER TABLE property_installations DROP FOREIGN KEY FK_B50C1ADB549213EC');
        $this->addSql('ALTER TABLE property_installations DROP FOREIGN KEY FK_B50C1ADB2B6BB138');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE property_installations');
    }
}
