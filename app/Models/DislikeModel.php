<?php

namespace App\Models;

use CodeIgniter\Model;

class DislikeModel extends Model
{
    protected $table = 'palec_dolu';
    protected $primaryKey = 'prispevek_id';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $allowedFields =  ['prispevek_id', 'uzivatel_id'];
}
