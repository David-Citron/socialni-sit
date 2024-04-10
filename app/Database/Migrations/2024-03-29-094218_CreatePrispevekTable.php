<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePrispevekTable extends Migration
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
            'text' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pridano' => [
                'type' => 'DATETIME',
            ],
            'uzivatel_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('uzivatel_id', 'uzivatel', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('prispevek');
    }

    public function down()
    {
        $this->forge->dropTable('prispevek');
    }
}
