<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\PostModel;
use App\Models\UserModel;
class ContributionSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('cs_CZ');
        $userModel = new UserModel();
        $postModel = new PostModel();

        $userID = $userModel->findColumn('id');
        for ($i = 0; $i < 50; $i++) {
            $name = $faker->realText(10);
            $text = $faker->realText(1000);
            $createDate = $faker->date('Y-m-d');
            $IDUser = $faker->randomElement($userID);;
            $data = [
                'nazev' => $name,
                'text' => $text,
                'pridano' => $createDate,
                'uzivatel_id' => $IDUser,
            ];
            $postModel->insert($data);
        }
    }
}
