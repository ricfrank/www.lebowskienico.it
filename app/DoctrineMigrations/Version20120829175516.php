<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120829175516 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, 
                                          title VARCHAR(255) NOT NULL, 
                                          author VARCHAR(100) NOT NULL, 
                                          blog LONGTEXT NOT NULL, 
                                          image VARCHAR(20) NOT NULL, 
                                          tags LONGTEXT NOT NULL, 
                                          created DATETIME NOT NULL, 
                                          updated DATETIME NOT NULL, 
                        PRIMARY KEY(id)) ENGINE = InnoDB');

    }

    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE blog');
    }
}
