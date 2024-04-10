<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\LikeModel;

class SumaLikeSeeder extends Seeder
{
    public function run()
    {
        $likeModel = new LikeModel();
        $pocetUzivatelu = 57;
        $pocetPrispevku = 50;
        for ($i = 7; $i <= $pocetUzivatelu; $i++) {
            for ($j = 1; $j <= $pocetPrispevku; $j++) {
                $data = [
                    'prispevek_id' => $j,
                    'uzivatel_id' => $i
                ];
                $likeModel->insert($data);
            }
        }
    }
}
