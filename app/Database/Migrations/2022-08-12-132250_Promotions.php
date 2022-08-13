<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Promotions extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'author_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['publish', 'pending', 'draft'],
                'default'    => 'pending',
            ],
            'amount' => [
                'type'       => 'DECIMAL',
                'constraint' => [3,2],
                'default'    => NULL,
            ],
        ]);
        
        // $this->forge->addField("id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT");
        // $this->forge->addField("author_id BIGINT(20) UNSIGNED NULL DEFAULT NULL");
        // $this->forge->addField("name VARCHAR(255) NULL DEFAULT NULL");
        // $this->forge->addField("type ENUM('Y','N') NULL DEFAULT NULL");
        // $this->forge->addField("amount DECIMAL(3,2) NULL DEFAULT NULL");
        $this->forge->addField("publish_start TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("publish_end TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("booking_start TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("booking_end TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("stay_start TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("stay_end TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("is_all_properties TINYINT(4) NULL DEFAULT NULL");
        $this->forge->addField("created_at TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("updated_at TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("deleted_at TIMESTAMP NULL DEFAULT NULL");

        // Membuat primary key
        $this->forge->addKey('id', TRUE);
        $this->forge->addUniqueKey(['author_id', 'promotions']);

        // Membuat tabel
        $this->forge->createTable('promotions', TRUE);
    }

    public function down()
    {
        // menghapus tabel
        $this->forge->dropTable('promotions');
    }
}
