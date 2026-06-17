<?php

namespace App\Controllers;

use App\Models\ProduitModel;

class ProduitController extends BaseController {
    public function listeProduits() {
        $produitModel = new ProduitModel();
        $produits = $produitModel->findAll();

        return view('produits/liste', ['produits' => $produits]);
    }

}
