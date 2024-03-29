<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table = 'pacel_nahoru';
    protected $primaryKey = ['prispevek_id', 'uzivatel_id'];
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $allowedFields =  ['prispevek_id', 'uzivatel_id'];
}
