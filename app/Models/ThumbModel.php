<?php

namespace App\Models;

use CodeIgniter\Model;

class ThumbModel extends Model
{
    protected $table = 'palec';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields =  ['typ', 'uzivatel_id', 'prispevek_id'];
}
