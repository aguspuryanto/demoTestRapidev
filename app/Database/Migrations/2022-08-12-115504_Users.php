<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Users extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'unique'         => true,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'role' => [
                'type'           => 'INT',
                'constraint'     => 1,
            ],
            'created_at' => [
                'type'           => 'timestamp',
                'default'        => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'           => 'timestamp',
                'default'        => NULL,
            ],
            'deleted_at' => [
                'type'           => 'timestamp',
                'default'        => NULL,
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        // menghapus tabel
        $this->forge->dropTable('users');
    }
}
