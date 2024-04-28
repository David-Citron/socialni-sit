<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table = 'fotka_prispevek';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'object';
    protected $allowedFields =  ['nazev', 'alt_popis', 'prispevek_id'];
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'odstraneno';
}
