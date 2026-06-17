<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom'          => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'description'  => ['type' => 'TEXT', 'null' => true],
            'prix'         => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => false],
            'stock'        => ['type' => 'INT', 'constraint' => 11, 'null' => false, 'default' => 0]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('nom');
        $this->forge->createTable('produits');
    }

    public function down()
    {
        $this->forge->dropTable('produits');
    }
}