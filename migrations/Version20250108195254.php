<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108195254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achievement (id INT AUTO_INCREMENT NOT NULL, quete_id INT DEFAULT NULL, date_accomplissement DATETIME NOT NULL, points INT NOT NULL, INDEX IDX_96737FF17A1B721E (quete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE achievement_user (id INT AUTO_INCREMENT NOT NULL, achievement_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_E71294E0B3EC99FE (achievement_id), INDEX IDX_E71294E0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE badge (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, bame VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_FEF0481DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, difficulte INT NOT NULL, reccurente TINYINT(1) NOT NULL, etat VARCHAR(255) NOT NULL, last_realisation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achievement ADD CONSTRAINT FK_96737FF17A1B721E FOREIGN KEY (quete_id) REFERENCES quest (id)');
        $this->addSql('ALTER TABLE achievement_user ADD CONSTRAINT FK_E71294E0B3EC99FE FOREIGN KEY (achievement_id) REFERENCES achievement (id)');
        $this->addSql('ALTER TABLE achievement_user ADD CONSTRAINT FK_E71294E0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achievement DROP FOREIGN KEY FK_96737FF17A1B721E');
        $this->addSql('ALTER TABLE achievement_user DROP FOREIGN KEY FK_E71294E0B3EC99FE');
        $this->addSql('ALTER TABLE achievement_user DROP FOREIGN KEY FK_E71294E0A76ED395');
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481DA76ED395');
        $this->addSql('DROP TABLE achievement');
        $this->addSql('DROP TABLE achievement_user');
        $this->addSql('DROP TABLE badge');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE user');
    }
}
