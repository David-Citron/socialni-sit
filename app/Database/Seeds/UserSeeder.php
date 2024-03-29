<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $userModel = new UserModel();
        for ($i = 0; $i < 2; $i++) {
            $username = $faker->UserName;
            $password = $username;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'uzivatelske_jmeno' => $username,
                'heslo' => $hashedPassword,
                'email' => $username . '@example.com',
                'datum_narozeni' => $faker->date,
                'admin' => 0,
                'obrazek' => 'avatar.png',
                'popis' => 'Učty na základě generování',
            ];

            $userModel->insert($data);
        }
    }
}
