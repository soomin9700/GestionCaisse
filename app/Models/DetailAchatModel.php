<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailAchatModel extends Model
{
    protected $table            = 'detailAchats';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'idAchat',
        'idProduit',
        'quantite',
        'montant'
    ];
}