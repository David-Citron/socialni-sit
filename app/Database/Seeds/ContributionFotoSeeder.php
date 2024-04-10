<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ContributionFotoModel;
class ContributionFotoSeeder extends Seeder
{
    public function run()
    {
        $fotoModel = new ContributionFotoModel();
        for ($i=1; $i < 50; $i++) { 
            $data = [
                'nazev' => 'prispevek.png',
                'prispevek_id' => $i,
            ];
            $fotoModel->insert($data);
        }
    }
}
