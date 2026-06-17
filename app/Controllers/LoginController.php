<?php 
namespace App\Controllers; 
use App\Models\UserModel;
use CodeIgniter\Config\View;
use App\Models\CaisseModel;
class loginController extends BaseController 
{ 
    public function index() 
    { 
        return view('login'); 
    }
    
    public function authenticate() 
    { 
        $email = $this->request->getPost('email'); 
        $password = $this->request->getPost('password'); 

        if(empty($email) || empty($password)) { 
            return redirect()->back()->with('error', 'Veuillez remplir tous les champs.'); 
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Le format de l\'adresse email est invalide.');
        }

        $userModel = new UserModel();

        $user = $userModel->where('email', $email)->where('mot_de_passe', $password)->first();
        $caisses = (new CaisseModel())->findAll();
        if ($user) { 
            session()->set('user_id', $user['id']); 
            session()->set('user_name', $user['nom']); 
            return view('choisirCaisse',['caisses' => $caisses]); 
        } else { 
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.'); 
        }

        
    }
}