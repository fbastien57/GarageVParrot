<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231112105020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pictures (id INT AUTO_INCREMENT NOT NULL, cars_id INT NOT NULL, users_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8F7C2FC08702F506 (cars_id), INDEX IDX_8F7C2FC067B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC08702F506 FOREIGN KEY (cars_id) REFERENCES cars (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC067B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE cars DROP picture');
        $this->addSql('ALTER TABLE users DROP picture');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC08702F506');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC067B3B43D');
        $this->addSql('DROP TABLE pictures');
        $this->addSql('ALTER TABLE cars ADD picture LONGBLOB NOT NULL');
        $this->addSql('ALTER TABLE users ADD picture LONGBLOB DEFAULT NULL');
    }
}
