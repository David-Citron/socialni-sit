<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ContributionFotoModel;
use App\Models\PostModel;
use Faker\Factory;
class ContributionFotoSeeder extends Seeder
{
    public function run()
    {
        $fotoModel = new ContributionFotoModel();
        $postModel = new PostModel();
        $faker = Factory::create('cs_CZ');
        $post = $postModel->findColumn('id');
        $imgPost = [
          'prispevek01.jpg',
          'prispevek02.jpg',
          'prispevek03.jpg',
          'prispevek04.jpg',
          'prispevek05.jpg',
          'prispevek06.jpg',
          'prispevek07.jpg',
          'prispevek08.jpg',
          'prispevek09.jpg',
          'prispevek10.jpg',
          'prispevek11.jpg',
          'prispevek12.jpg',
          'prispevek13.jpg',
          'prispevek14.jpg',
          'prispevek15.jpg',
          'prispevek16.jpg',
          'prispevek17.jpg',
          'prispevek18.jpg',
          'prispevek19.jpg',
          'prispevek20.jpg',  
        ];
        $altName = 'Obrázek generovaný umělou inteligencí.';
            for ($j=1; $j < $post; $j++) { 
               for ($i=0; $i <3 ; $i++) { 
                $nameImg = $faker->randomElement($imgPost);
                $postID = $j;
                $data = [
                    'nazev' => $nameImg,
                    'alt_popis' => $altName,
                    'prispevek_id' => $postID,
                ];
                $fotoModel->insert($data);
               }
            }
    }
}
