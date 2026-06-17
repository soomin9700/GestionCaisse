<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCaisses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom'         => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'description' => ['type' => 'TEXT', 'null' => true],
            'solde'      => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => false]
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('nom'); // Évite d'avoir deux caisses avec le même nom
        $this->forge->createTable('caisses');
    }

    public function down()
    {
        $this->forge->dropTable('caisses');
    }
}