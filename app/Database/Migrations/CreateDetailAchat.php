<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailAchats extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idAchat'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'idProduit'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'quantite'      => ['type' => 'INT', 'constraint' => 11, 'null' => false],
            'Montant' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => false]
        ]);
        
        $this->forge->addKey('id', true);
        
        $this->forge->addForeignKey('idAchat', 'Achats', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idProduit', 'produits', 'id', 'CASCADE', 'RESTRICT');
        
        $this->forge->createTable('detailAchats');
    }

    public function down()
    {
        $this->forge->dropTable('detailAchats');
    }
}