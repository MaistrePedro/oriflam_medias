<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201221164733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE images ADD linked_product_id INT DEFAULT NULL, CHANGE linked_order_id linked_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AD240BD1D FOREIGN KEY (linked_product_id) REFERENCES product (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6AD240BD1D ON images (linked_product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AD240BD1D');
        $this->addSql('DROP INDEX UNIQ_E01FBE6AD240BD1D ON images');
        $this->addSql('ALTER TABLE images DROP linked_product_id, CHANGE linked_order_id linked_order_id INT NOT NULL');
    }
}
