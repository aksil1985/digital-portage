<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230621100732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE postuler (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, offre_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, votre_demande VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, INDEX IDX_8EC5A68DA76ED395 (user_id), INDEX IDX_8EC5A68D4CC8505A (offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE postuler ADD CONSTRAINT FK_8EC5A68D4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE postuler DROP FOREIGN KEY FK_8EC5A68DA76ED395');
        $this->addSql('ALTER TABLE postuler DROP FOREIGN KEY FK_8EC5A68D4CC8505A');
        $this->addSql('DROP TABLE postuler');
    }
}
