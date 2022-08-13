<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertyGroups extends Migration
{
    private $table = 'property_groups';

    public function up()
    {
        // Membuat kolom/field untuk tabel
        $this->forge->addField("id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT");
        $this->forge->addField("manager_id BIGINT(20) UNSIGNED NULL DEFAULT NULL");
        $this->forge->addField("name VARCHAR(255) NULL DEFAULT NULL");
        $this->forge->addField("created_at TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("updated_at TIMESTAMP NULL DEFAULT NULL");
        $this->forge->addField("deleted_at TIMESTAMP NULL DEFAULT NULL");

        // Membuat primary key
        $this->forge->addKey('id', TRUE);
        $this->forge->addUniqueKey(['manager_id', $this->table]);

        // Membuat tabel
        $this->forge->createTable($this->table, TRUE);
    }

    public function down()
    {
        // menghapus tabel
        $this->forge->dropTable($this->table);
    }
}
