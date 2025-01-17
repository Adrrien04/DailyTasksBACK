<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250110140256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_quests DROP FOREIGN KEY FK_FDCC4609209E9EF4');
        $this->addSql('ALTER TABLE user_quests DROP FOREIGN KEY FK_FDCC4609A76ED395');
        $this->addSql('DROP TABLE user_quests');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_quests (user_id INT NOT NULL, quest_id INT NOT NULL, INDEX IDX_FDCC4609A76ED395 (user_id), INDEX IDX_FDCC4609209E9EF4 (quest_id), PRIMARY KEY(user_id, quest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_quests ADD CONSTRAINT FK_FDCC4609209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_quests ADD CONSTRAINT FK_FDCC4609A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
