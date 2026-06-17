<?php

namespace App\Controllers;
use App\Models\DetailAchatModel;

class DetailAchatController extends BaseController {
    public function insererProduits($produits, $achat) {
        $DetailAchatModel = new DetailAchatModel();
        foreach ($produits as $p) {
            $detailAchatData = [
                'achat_id' => $achat['id'],
                'produit_id' => $p['id'],
                'quantite' => $achat['quantite'],
                'montant' => $p['prix'] * $achat['quantite']
            ];

            $DetailAchatModel->insert($detailAchatData);
        }
    }

}