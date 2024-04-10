<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\DislikeModel;
class SumaDislikeSeeder extends Seeder
{
    public function run()
    {
        $dislikeModel = new DislikeModel();
        $pocetUzivatelu = 108;
        $pocetPrispevku = 50;
        for ($i = 58; $i <= $pocetUzivatelu; $i++) {
            for ($j = 1; $j <= $pocetPrispevku; $j++) {
                $data = [
                    'prispevek_id' => $j,
                    'uzivatel_id' => $i
                ];
                $dislikeModel->insert($data);
            }
        }
    }
}
