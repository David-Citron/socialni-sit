<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKomentarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'text' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pridano' => [
                'type' => 'DATETIME',
            ],
            'prispevek_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'uzivatel_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('prispevek_id', 'prispevek', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('uzivatel_id', 'uzivatel', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('komentar');
    }

    public function down()
    {
        $this->forge->dropTable('komentar');
    }
}
