<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109094136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE badge DROP FOREIGN KEY FK_FEF0481DA76ED395');
        $this->addSql('DROP INDEX IDX_FEF0481DA76ED395 ON badge');
        $this->addSql('ALTER TABLE badge ADD name VARCHAR(255) NOT NULL, ADD icon VARCHAR(255) NOT NULL, DROP user_id, DROP bame, DROP category');
        $this->addSql('ALTER TABLE quest ADD category VARCHAR(255) NOT NULL, ADD created_by VARCHAR(255) DEFAULT NULL, DROP difficulte, DROP reccurente, DROP last_realisation, CHANGE etat difficulty VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD mail VARCHAR(255) NOT NULL, ADD mdp VARCHAR(255) NOT NULL, DROP email, DROP password, DROP roles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE badge ADD user_id INT DEFAULT NULL, ADD bame VARCHAR(255) NOT NULL, ADD category VARCHAR(255) NOT NULL, DROP name, DROP icon');
        $this->addSql('ALTER TABLE badge ADD CONSTRAINT FK_FEF0481DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FEF0481DA76ED395 ON badge (user_id)');
        $this->addSql('ALTER TABLE quest ADD difficulte INT NOT NULL, ADD reccurente TINYINT(1) NOT NULL, ADD etat VARCHAR(255) NOT NULL, ADD last_realisation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP difficulty, DROP category, DROP created_by');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD roles VARCHAR(255) NOT NULL, DROP mail, DROP mdp');
    }
}
