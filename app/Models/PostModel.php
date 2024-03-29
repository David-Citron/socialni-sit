<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'prispevek';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['text', 'obrazek', 'pocet_palcu_nahoru', 'pocet_palcu_dolu', 'pocet_komentaru', 'uzivatel_id'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pridano';
    protected $updatedField  = '';
    protected $deletedField  = '';
}