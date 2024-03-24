<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'uzivatel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['uzivatelske_jmeno', 'heslo', 'email', 'datum_narozeni', 'admin', 'obrazek', 'popis'];
}