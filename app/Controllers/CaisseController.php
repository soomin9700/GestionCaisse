<?

namespace App\Controllers;


use App\Models\CaisseModel;


class CaisseController extends BaseController
{
    public function caisse(){
        $caisseModel = new CaisseModel();
        $caisses = $caisseModel->findAll();

        return view('caisse', ['caisses' => $caisses]);
    }
}