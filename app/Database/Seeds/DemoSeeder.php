<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        // 1. Insertion des Utilisateurs (users)
        $this->db->table('users')->insertBatch([
            ['nom' => 'Rojo',    'email' => 'rojo@itu.mg',    'mot_de_passe' => password_hash('secret123', PASSWORD_BCRYPT)],
            ['nom' => 'Sitraka', 'email' => 'sitraka@itu.mg', 'mot_de_passe' => password_hash('azerty', PASSWORD_BCRYPT)],
            ['nom' => 'Tiana',   'email' => 'tiana@itu.mg',   'mot_de_passe' => password_hash('password', PASSWORD_BCRYPT)],
        ]);

        // 2. Insertion des Caisses (2 caisses)
        $this->db->table('caisses')->insertBatch([
            [
                'nom'         => 'Caisse Principale',
                'description' => 'Caisse centrale située à l\'accueil.',
                'solde'      => 0.0
            ],
            [
                'nom'         => 'Caisse Secondaire',
                'description' => 'Caisse mobile pour les événements ou affluence.',
                'solde'      => 0.00
            ],
        ]);

        // 3. Insertion des Produits (5 produits)
        $this->db->table('produits')->insertBatch([
            [
                'nom'         => 'Ordinateur Portable HP',
                'description' => 'Core i5, 16 Go RAM, 512 Go SSD.',
                'prix'        => 3500000.00,
                'stock'       => 10
            ],
            [
                'nom'         => 'Souris Sans Fil Logitech',
                'description' => 'Souris ergonomique avec récepteur USB.',
                'prix'        => 120000.00,
                'stock'       => 50
            ],
            [
                'nom'         => 'Écran 24 pouces Dell',
                'description' => 'Dalle IPS, Résolution Full HD 1080p.',
                'prix'        => 850000.00,
                'stock'       => 15
            ],
            [
                'nom'         => 'Clavier Mécanique RGB',
                'description' => 'Switches Red, idéal pour le développement.',
                'prix'        => 250000.00,
                'stock'       => 20
            ],
            [
                'nom'         => 'Casque Audio Réduction de Bruit',
                'description' => 'Casque Bluetooth avec micro intégré.',
                'prix'        => 450000.00,
                'stock'       => 8
            ],
        ]);
    }
}