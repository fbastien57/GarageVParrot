<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231116162302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE body_services DROP service2, DROP service3, DROP service4, DROP service5, DROP service6, DROP service7, DROP service8, CHANGE service1 service VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mechanics_services DROP service2, DROP service3, DROP service4, DROP service5, DROP service6, DROP service7, DROP service8, CHANGE service1 service VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE body_services ADD service2 VARCHAR(255) DEFAULT NULL, ADD service3 VARCHAR(255) DEFAULT NULL, ADD service4 VARCHAR(255) DEFAULT NULL, ADD service5 VARCHAR(255) DEFAULT NULL, ADD service6 VARCHAR(255) DEFAULT NULL, ADD service7 VARCHAR(255) DEFAULT NULL, ADD service8 VARCHAR(255) DEFAULT NULL, CHANGE service service1 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mechanics_services ADD service2 VARCHAR(255) DEFAULT NULL, ADD service3 VARCHAR(255) DEFAULT NULL, ADD service4 VARCHAR(255) DEFAULT NULL, ADD service5 VARCHAR(255) DEFAULT NULL, ADD service6 VARCHAR(255) DEFAULT NULL, ADD service7 VARCHAR(255) DEFAULT NULL, ADD service8 VARCHAR(255) DEFAULT NULL, CHANGE service service1 VARCHAR(255) NOT NULL');
    }
}
