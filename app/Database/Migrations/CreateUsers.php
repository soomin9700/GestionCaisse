<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom'          => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'email'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'mot_de_passe' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email'); // Garantit l'unicité des adresses email
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}