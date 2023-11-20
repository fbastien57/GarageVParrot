<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111095013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE garage_hours (id INT AUTO_INCREMENT NOT NULL, monday_hours VARCHAR(255) NOT NULL, tuesday_hours VARCHAR(255) NOT NULL, wednesday_hours VARCHAR(255) NOT NULL, thursday_hours VARCHAR(255) NOT NULL, friday_hours VARCHAR(255) NOT NULL, saturday_hours VARCHAR(255) NOT NULL, sunday_hours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE published_comments (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, comment VARCHAR(255) NOT NULL, mark INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE garage_hours');
        $this->addSql('DROP TABLE published_comments');
    }
}
