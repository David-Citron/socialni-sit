<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePalecDoluTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'prispevek_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'uzivatel_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey(['prispevek_id', 'uzivatel_id']);
        $this->forge->addForeignKey('prispevek_id', 'prispevek', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('uzivatel_id', 'uzivatel', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('palec_dolu');
    }

    public function down()
    {
        $this->forge->dropTable('palec_dolu');
    }
}
