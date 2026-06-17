<?php 
namespace App\Controllers;
use App\Models\CaisseModel;
use App\Models\UserModel;
use App\Models\ProduitModel;

class AchatController extends BaseController{
  public function achat(){
    $caisseId = $this->request->getPost('caisse');
    $caisseModel = new CaisseModel();
    $caisse = $caisseModel->find($caisseId);
    $userId = session()->get('user_id');
    $userModel = new UserModel();
    $user = $userModel->find($userId);  
    $produitModel = new ProduitModel();
    $produits = $produitModel->findAll();

    return view('Achat', ['caisse' => $caisse , 'user' => $user, 'produits' => $produits]);

  }
}