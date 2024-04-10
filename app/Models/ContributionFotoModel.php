<?php

namespace App\Models;

use CodeIgniter\Model;

class ContributionFotoModel extends Model
{
    protected $table = 'fotka_prispevek';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =  ['nazev', 'alt_popis', 'prispevek_id'];
}
