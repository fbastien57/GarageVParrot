<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111100010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE body_services (id INT AUTO_INCREMENT NOT NULL, service1 VARCHAR(255) NOT NULL, service2 VARCHAR(255) DEFAULT NULL, service3 VARCHAR(255) DEFAULT NULL, service4 VARCHAR(255) DEFAULT NULL, service5 VARCHAR(255) DEFAULT NULL, service6 VARCHAR(255) DEFAULT NULL, service7 VARCHAR(255) DEFAULT NULL, service8 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mechanics_services (id INT AUTO_INCREMENT NOT NULL, service1 VARCHAR(255) NOT NULL, service2 VARCHAR(255) DEFAULT NULL, service3 VARCHAR(255) DEFAULT NULL, service4 VARCHAR(255) DEFAULT NULL, service5 VARCHAR(255) DEFAULT NULL, service6 VARCHAR(255) DEFAULT NULL, service7 VARCHAR(255) DEFAULT NULL, service8 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE body_services');
        $this->addSql('DROP TABLE mechanics_services');
    }
}
