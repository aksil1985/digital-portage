<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230624142548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE talent DROP FOREIGN KEY talent_ibfk_1');
        $this->addSql('ALTER TABLE talent DROP FOREIGN KEY FK_16D902F5A76ED395');
        $this->addSql('DROP INDEX UNIQ_16D902F5A76ED395 ON talent');
        $this->addSql('ALTER TABLE talent CHANGE user_id user_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE talent CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE talent ADD CONSTRAINT talent_ibfk_1 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE talent ADD CONSTRAINT FK_16D902F5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_16D902F5A76ED395 ON talent (user_id)');
    }
}
