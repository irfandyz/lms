<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'=>'Asrul',
                'email'=>'asrul@email.com',
                'role'=>'administrator',
                'password'=>bcrypt('asrul')
            ],
            [
                'name'=>'Bhaja',
                'email'=>'bhaja@email.com',
                'role'=>'mentor',
                'password'=>bcrypt('bhaja')
            ],
            [
                'name'=>'Cysla',
                'email'=>'cysla@email.com',
                'role'=>'member',
                'password'=>bcrypt('cysla')
            ],
            [
                'name'=>'Davi',
                'email'=>'davi@email.com',
                'role'=>'member',
                'password'=>bcrypt('davi')
            ],
        ];
        foreach ($data as $value) {
            $user = User::create($value);
        }     
    }
}
