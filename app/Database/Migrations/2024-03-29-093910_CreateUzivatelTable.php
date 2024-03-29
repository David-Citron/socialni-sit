<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUzivatelTable extends Migration
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
            'uzivatelske_jmeno' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'heslo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'datum_narozeni' => [
                'type' => 'DATE',
            ],
            'admin' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'obrazek' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'popis' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('uzivatel');
    }

    public function down()
    {
        $this->forge->dropTable('uzivatel');
    }
}
