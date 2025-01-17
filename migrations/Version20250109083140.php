<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109083140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achievement DROP FOREIGN KEY FK_96737FF17A1B721E');
        $this->addSql('DROP INDEX IDX_96737FF17A1B721E ON achievement');
        $this->addSql('ALTER TABLE achievement DROP quete_id, DROP title, DROP description');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achievement ADD quete_id INT DEFAULT NULL, ADD title VARCHAR(255) DEFAULT NULL, ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE achievement ADD CONSTRAINT FK_96737FF17A1B721E FOREIGN KEY (quete_id) REFERENCES quest (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_96737FF17A1B721E ON achievement (quete_id)');
    }
}
