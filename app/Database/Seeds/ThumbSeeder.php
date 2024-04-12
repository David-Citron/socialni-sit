<?php

namespace App\Database\Seeds;

use App\Controllers\Post;
use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\ThumbModel;

class ThumbSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('cs_CZ');
        $postModel = new PostModel();
        $userModel = new UserModel();
        $thumbModel = new ThumbModel();

        $posts = $postModel->findColumn('id');
        $users = $userModel->findColumn('id');

        foreach ($posts as $postId) {
            foreach ($users as $userId) {
                $number = [1, 2];
                $type = $faker->randomElement($number);
                $data = [
                    'typ' => $type,
                    'uzivatel_id' => $userId,
                    'prispevek_id' => $postId,
                ];
                $thumbModel->insert($data);
            }
        }
    }
}
