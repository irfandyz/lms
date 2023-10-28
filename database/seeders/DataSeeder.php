<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use Faker;

class DataSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'=>'Asrul',
                'email'=>'asrul@email.com',
                'password'=>bcrypt('asrul')
            ],
            [
                'name'=>'Bhaja',
                'email'=>'bhaja@email.com',
                'password'=>bcrypt('bhaja')
            ],
            [
                'name'=>'Cysla',
                'email'=>'cysla@email.com',
                'password'=>bcrypt('cysla')
            ],
            [
                'name'=>'Davi',
                'email'=>'davi@email.com',
                'password'=>bcrypt('davi')
            ],
        ];
        foreach ($data as $value) {
            $user = User::create($value);
            $faker = Faker\Factory::create();
            $data = [
                [
                    'user_id'=>$user->id,
                    'name'=>$user->name.' task 1',
                    'description'=> $faker->text(1500),
                ],[
                    'user_id'=>$user->id,
                    'name'=>$user->name.' task 2',
                    'description'=> $faker->text(2000),
                ],[
                    'user_id'=>$user->id,
                    'name'=>$user->name.' task 3',
                    'description'=> $faker->text(3000),
                ]
            ];
            foreach ($data as $result) {
                Task::create($result);
            }
        }     
    }
}
