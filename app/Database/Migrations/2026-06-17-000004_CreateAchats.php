<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchats extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idCaisse'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'idUser'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'montant_total' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'null' => false, 'default' => 0.00],
            'dateAchat'     => ['type' => 'DATETIME', 'null' => false] // Géré par défaut via le modèle ou SQL personnalisé
        ]);
        
        $this->forge->addKey('id', true);
        
        // Déclaration des clés étrangères
        $this->forge->addForeignKey('idCaisse', 'caisses', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('idUser', 'users', 'id', 'CASCADE', 'RESTRICT');
        
        $this->forge->createTable('Achats');
    }

    public function down()
    {
        $this->forge->dropTable('Achats');
    }
}