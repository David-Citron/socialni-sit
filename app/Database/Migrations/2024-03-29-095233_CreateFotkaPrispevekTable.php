<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFotkaPrispevekTable extends Migration
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
            'nazev' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alt_popis' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'prispevek_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('prispevek_id', 'prispevek', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('fotka_prispevek');
    }

    public function down()
    {
        $this->forge->dropTable('fotka_prispevek');
    }
}
