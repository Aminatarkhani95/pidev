<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303115901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id_cat INT AUTO_INCREMENT NOT NULL, nom_cat VARCHAR(255) NOT NULL, PRIMARY KEY(id_cat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id_client INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_client)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere (id INT AUTO_INCREMENT NOT NULL, id_ench INT NOT NULL, nom_prod VARCHAR(255) NOT NULL, desc_prod VARCHAR(255) DEFAULT NULL, image_prod VARCHAR(255) NOT NULL, date_ench DATETIME NOT NULL, valid_ench DATETIME NOT NULL, duree_ench TIME NOT NULL, id_ven INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere_encours (id_ench_encours INT AUTO_INCREMENT NOT NULL, id_ench INT NOT NULL, id_clt INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id_ench_encours)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (in_event INT AUTO_INCREMENT NOT NULL, nom_event VARCHAR(255) NOT NULL, desc_event VARCHAR(255) NOT NULL, image_event VARCHAR(255) DEFAULT NULL, PRIMARY KEY(in_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordres (id_ordre INT AUTO_INCREMENT NOT NULL, date_cree DATETIME NOT NULL, date_expedirer INT NOT NULL, status INT NOT NULL, id_clt INT NOT NULL, PRIMARY KEY(id_ordre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id_panier INT AUTO_INCREMENT NOT NULL, id_prod INT NOT NULL, id_clt INT NOT NULL, PRIMARY KEY(id_panier)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id_utilisateur INT AUTO_INCREMENT NOT NULL, id_event INT NOT NULL, PRIMARY KEY(id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id_prod INT AUTO_INCREMENT NOT NULL, nom_prod VARCHAR(255) NOT NULL, desc_prod VARCHAR(255) NOT NULL, prix_prod INT NOT NULL, qte_prod INT NOT NULL, image_prod VARCHAR(255) NOT NULL, valid_prod INT NOT NULL, id_ven INT NOT NULL, id_cat INT NOT NULL, PRIMARY KEY(id_prod)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id_rec INT AUTO_INCREMENT NOT NULL, desc_rec VARCHAR(255) NOT NULL, id_clt INT NOT NULL, id_prod INT NOT NULL, status_rec INT NOT NULL, PRIMARY KEY(id_rec)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id_rev INT AUTO_INCREMENT NOT NULL, id_clt INT NOT NULL, id_prod INT NOT NULL, commentaire VARCHAR(255) NOT NULL, note INT NOT NULL, PRIMARY KEY(id_rev)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id_utilisateur INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, status INT NOT NULL, role INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendeur (id_ven INT AUTO_INCREMENT NOT NULL, desc_ven VARCHAR(255) NOT NULL, image_ven VARCHAR(255) NOT NULL, PRIMARY KEY(id_ven)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('DROP TABLE enchere_encours');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE ordres');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vendeur');
    }
}
