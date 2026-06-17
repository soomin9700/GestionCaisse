<?php

namespace App\Controllers;
use App\Models\AchatModel;

class AchatController extends BaseController
{
    public function choisirCaisse()
    {
        return view('achat/choisir_caisse');
    }

    public function validerCaisse()
    {
        $caisse = $this->request->getPost('caisse');

        session()->set('caisse', $caisse);

        return redirect()->to('/produits');
    }

    public function effectuerAchat($caisseId, $produits, $dateAchat) {
        $AchatModel = new AchatModel();
        $sessionUser = session()->get('user');
        $caisse = $caisseId;
        $montantTotal = 0;

        foreach ($produits as $p) {
            $montantTotal += $p['prix'] * $p['quantite'];
        }

        $achatData = [
            'utilisateur_id' => $sessionUser['id'],
            'caisse_id' => $caisse,
            'montant_total' => $montantTotal,
            'date_achat' => $dateAchat
        ];

        $achatId = $AchatModel->insert($achatData);

    }
}