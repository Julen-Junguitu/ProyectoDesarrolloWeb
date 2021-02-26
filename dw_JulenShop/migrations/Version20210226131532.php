<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210226131532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dispositivo (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, modelo VARCHAR(255) NOT NULL, marca VARCHAR(255) NOT NULL, coste DOUBLE PRECISION NOT NULL, imagen VARCHAR(255) NOT NULL, INDEX IDX_A05F26EE3397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, usuario VARCHAR(255) NOT NULL, contrasena VARCHAR(255) NOT NULL, admin TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_dispositivo (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, dispositivo_id INT NOT NULL, INDEX IDX_9874D460DB38439E (usuario_id), INDEX IDX_9874D460FD37F77B (dispositivo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dispositivo ADD CONSTRAINT FK_A05F26EE3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE usuario_dispositivo ADD CONSTRAINT FK_9874D460DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario_dispositivo ADD CONSTRAINT FK_9874D460FD37F77B FOREIGN KEY (dispositivo_id) REFERENCES dispositivo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dispositivo DROP FOREIGN KEY FK_A05F26EE3397707A');
        $this->addSql('ALTER TABLE usuario_dispositivo DROP FOREIGN KEY FK_9874D460FD37F77B');
        $this->addSql('ALTER TABLE usuario_dispositivo DROP FOREIGN KEY FK_9874D460DB38439E');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE dispositivo');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE usuario_dispositivo');
    }
}
