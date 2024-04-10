<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateThumbTable extends Migration
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
            'typ' => [
                'type' => 'INT',
            ],
            'uzivatel_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'prispevek_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('uzivatel_id', 'uzivatel', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('prispevek_id', 'prispevek', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('palec');
    }

    public function down()
    {
        $this->forge->dropTable('palec');
    }
}
