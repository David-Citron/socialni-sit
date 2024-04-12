<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CommentModel;
use Faker\Factory;
use App\Models\PostModel;
use App\Models\UserModel;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker =  Factory::create('cs_CZ');
        $postModel = new PostModel();
        $userModel = new UserModel();
        $commentModel = new CommentModel();
        
        $post =   $postModel->findColumn('id');
        $user = $userModel->findColumn('id');
        for ($i=1; $i < $post; $i++) { 
            for ($j=0; $j < 3; $j++) { 
                $text = $faker->realText(1000);
                $create = $faker->date();
                $userID = $faker->randomElement($user);
                $postID = $i;
                $data = [
                    'text' => $text,
                    'pridano' => $create,
                    'prispevek_id' => $postID,
                    'uzivatel_id' => $userID,
                ];
                $commentModel->insert($data);
            }
        }
    }
}
