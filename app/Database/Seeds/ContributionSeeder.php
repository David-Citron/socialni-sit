<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PostModel;
use App\Models\UserModel;
class ContributionSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('en_US');
        $userModel = new UserModel();
        $postModel = new PostModel();

        $userID = $userModel->findColumn('id');
        for ($i = 0; $i < 50; $i++) {
            $text = 'Text příspěvku je generovaný na základě přidání dat v db.';
            $countLike = 50;
            $countDislike = 50;
            $countComments = 50;
            $createDate = 2024-03-29;
            $IDUser = $faker->randomElement($userID);;
            $data = [
                'text' => $text,
                'pocet_palcu_nahoru' => $countLike,
                'pocet_palcu_dolu' => $countDislike,
                'pocet_komentaru' => $countComments,
                'pridano' => $createDate,
                'uzivatel_id' => $IDUser,
            ];
            $postModel->insert($data);
        }
    }
}
