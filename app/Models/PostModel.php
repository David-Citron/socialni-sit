<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'prispevek';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'object';
    protected $allowedFields = ['nazev', 'text', 'uzivatel_id'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pridano';
    protected $updatedField  = '';
    protected $deletedField  = 'odstraneno';
}